<?php

namespace Modules\Setup\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setup\Entities\TradePoint;

class TradePointController extends Controller
{
    public function index()
    {
        $param['items'] = TradePoint::all();
        return view('setup::trade_point.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = TradePoint::isExist($data['name']);
            if (!$isExist) {
                TradePoint::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Trade Point Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = TradePoint::find($id);
        return view('setup::trade_point.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $trade_point = TradePoint::find($id);
            $isExist = TradePoint::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $trade_point->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Trade Point Name Already Exist';
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
            $item = TradePoint::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Trade Point Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
