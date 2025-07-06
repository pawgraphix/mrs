<?php

namespace Modules\Setup\Http\Controllers;

use Illuminate\Http\Request;
use Modules\OrderMgnt\Entities\Order;
use Modules\Setup\Entities\ClothType;
use Modules\Setup\Entities\CompletionStage;
use Modules\Setup\Entities\Customer;
use Modules\Setup\Entities\OrderCompletionStatus;

class OrderCompletionStatusController
{

    public function index($orderId)
    {
        $params['items'] = OrderCompletionStatus::all();
        $params['cloth_types'] = ClothType::orderBy('name')->get();
        $order = Order::find($orderId);
        $params['order'] = $order;
        $params['completion_stages'] = CompletionStage::where('cloth_type_id',$order->cloth_type_id)->orderBy('name')->select('id','name')->get();
        return view('setup::OrderCompletionStatus.index', $params);
    }

    public function create()
    {
        return view('setup::create');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        OrderCompletionStatus::create($data);
        return redirect()->back();
    }

    public function show($id)
    {
        return view('setup::show');
    }

    public function edit($id)
    {
        $params['item'] = Order::find($id);
        $params['customers'] = Customer::orderBy('name')->select('id','name')->get();
        $params['cloth_types'] = ClothType::orderBy('name')->get();
        return view('Setup::OrderCompletionStatus.edit', $params);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $order_completion_status = OrderCompletionStatus::find($id);
        $order_completion_status->update($data);
        return redirect()->back();
    }
    public function destroy($id)
    {
        $item = OrderCompletionStatus::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        }else{
            return false;
        }
    }

}
