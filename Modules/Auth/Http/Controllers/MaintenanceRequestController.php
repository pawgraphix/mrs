<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Location;
use App\Models\MaintenanceRequest;
use Exception;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    public function index()
    {
        $param['items'] = MaintenanceRequest::all();
        $param['assets'] = Asset::all();
        $param['locations'] = Location::all();
        return view('auth::maintenance_requests.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            MaintenanceRequest::create($data);
            $error_msg = 'Successfully Saved';
            return redirect()->back()->with('success', $error_msg);
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = MaintenanceRequest::find($id);
        $params['locations'] = Location::orderBy('name')->get();
        return view('auth::maintenance_requests.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $maintenance_request = MaintenanceRequest::find($id);
            $isExist = MaintenanceRequest::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $maintenance_request->update($data);
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
