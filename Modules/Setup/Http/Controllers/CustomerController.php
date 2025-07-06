<?php

namespace Modules\Setup\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\Role;
use Modules\Setup\Entities\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $params['items'] = Customer::orderBy('name')->get();
        return view('setup::customer.index', $params);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Customer::isExist($data['name']);
            if (!$isExist) {
                Customer::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Customer Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = Customer::find($id);
        return view('setup::customer.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $customer = Customer::find($id);
            $isExist = Customer::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $customer->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Customer Name Already Exist';
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
            $item = Customer::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Customer Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
