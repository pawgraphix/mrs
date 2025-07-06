<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;

class MaintenanceRequestController extends Controller
{
    public function index()
    {
        $param['items'] = MaintenanceRequest::all();
        return view('auth::maintenance_requests.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = MaintenanceRequest::isExist($data['name']);
            if (!$isExist) {
                MaintenanceRequest::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Maintenance Request Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = MaintenanceRequest::find($id);
        return view('auth::maintenance_requests.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $trade_point = MaintenanceRequest::find($id);
            $isExist = MaintenanceRequest::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $trade_point->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Maintenance Request Already Exist';
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
            $item = MaintenanceRequest::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Maintenance Request Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
