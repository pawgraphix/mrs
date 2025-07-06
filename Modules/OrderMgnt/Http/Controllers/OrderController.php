<?php

namespace Modules\OrderMgnt\Http\Controllers;

use App\Mail\TaskCompleteNotificationMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\OrderMgnt\Entities\Order;
use Modules\OrderMgnt\Entities\Tailor;
use Modules\Setup\Entities\ClothType;
use Modules\Setup\Entities\Customer;
use Modules\Setup\Entities\OrderCompletionStatus;

class OrderController extends Controller
{
    public function index()
    {
        $params['items'] = Order::all();
        $params['customers'] = Customer::orderBy('name')->select('id', 'name')->get();
        $params['cloth_types'] = ClothType::orderBy('name')->get();
        return view('ordermgnt::order.index', $params);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Order::isExist($data['cloth_type_id']);
            if (!$isExist) {
                Order::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Order Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function show($id)
    {
        return view('ordermgnt::show');
    }

    public function edit($id)
    {
        $params['item'] = Order::find($id);
        $params['customers'] = Customer::orderBy('name')->select('id', 'name')->get();
        $params['cloth_types'] = ClothType::orderBy('name')->get();
        return view('ordermgnt::order.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $order = Order::find($id);
            $isExist = Order::isExistOnEdit($data['cloth_type_id'], $id);
            if (!$isExist) {
                $order->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Order Name Already Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function destroy($id)
    {
        try {
            $item = Order::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Order Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function approve($id)
    {
        try {
            //Check if it reaches 100%
            $totalPercent = OrderCompletionStatus::getCompletionPercent($id);
            if ($totalPercent < 100) {
                $error_msg = "Not Approved, Please make sure the work is completed";
                return redirect()->back()->with('error', $error_msg);
            }
            $order = Order::find($id);
            $order->is_verified = true;
            $order->verified_by = auth()->id();
            $order->verified_at = now();
            $order->update();

            $customer = Customer::find($order->customer_id);
            Mail::to($customer->email)->send(new TaskCompleteNotificationMail($customer));

            $success_msg = 'Successfully Approved';
            return redirect()->back()->with('success', $success_msg);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function assignTailorView($id)
    {
        $params['item'] = Order::find($id);
        $params['tailors'] = Tailor::all();
        return view('ordermgnt::order.assign_tailor',$params);
    }

    public function assignTailor(Request $request)
    {
        try {
            $data = $request->all();
            $id = $data['id'];
            $order = Order::find($id);
            $order->tailor_id = $data['tailor_id'];
            $order->assigned_by = auth()->id();
            $order->assigned_at = now();
            $order->update();

            $success_msg = 'Successfully Assigned';
            return redirect()->back()->with('success', $success_msg);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
