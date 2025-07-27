<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RequestNotificationMail;
use App\Mail\ResolvedNotificationMail;
use App\Models\Asset;
use App\Models\Location;
use App\Models\MaintenanceRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MaintenanceRequestController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $param['items'] = MaintenanceRequest::where('user_id', $userId)->latest()->get();
        $param['assets'] = Asset::all();
        $param['locations'] = Location::all();
        return view('auth::maintenance_requests.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            $data['department_id'] = Asset::find($data['asset_id'])->department_id;
            $data['request_id'] = 'REQ-'.now()->timestamp;
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
        $params['assets'] = Asset::orderBy('name')->get();
        return view('auth::maintenance_requests.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $maintenance_request = MaintenanceRequest::find($id);
            $maintenance_request->update($data);
            $success_msg = 'Successfully Updated';
            return redirect()->back()->with('success', $success_msg);
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

    public function submitRequest($id)
    {
        try {
            $maintenanceRequest = MaintenanceRequest::find($id);
            $maintenanceRequest->status = 'Submitted';
            $maintenanceRequest->submitted_by = auth()->id();
            $maintenanceRequest->submitted_at = now();
            $maintenanceRequest->update();

            $department_id = $maintenanceRequest->asset->department_id;

            $hod = User::where('department_id', $department_id)->first();
            if ($hod) {
                Mail::to($hod->email)->send(new RequestNotificationMail($hod));
                $success_msg = 'Successfully Submitted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = "Hod for this department does not exist";
                return redirect()->back()->with('error', $error_msg);
            }

        } catch (Exception $ex) {
            $error_msg = $ex->getMessage();
            return redirect()->back()->with('error', $error_msg);
        }
    }

    public function hodIndex()
    {
        $departmentId = User::getCurrentUserDepartmentId();
        $param['items'] = MaintenanceRequest::whereNotNull('submitted_at')->whereNull('reviewed_by')
            ->where('department_id', $departmentId)->get();
        return view('auth::maintenance_requests.hod_index', $param);
    }

    public function approveRequest($id)
    {
        try {
            $maintenanceRequest = MaintenanceRequest::find($id);
            $maintenanceRequest->status = 'Approved';
            $maintenanceRequest->reviewed_by = auth()->id();
            $maintenanceRequest->reviewed_at = now();
            $maintenanceRequest->is_approved = true;
            $maintenanceRequest->update();

            $success_msg = 'Successfully Approved';
            return redirect()->back()->with('success', $success_msg);
        } catch (Exception $ex) {
            $error_msg = $ex->getMessage();
            return redirect()->back()->with('error', $error_msg);
        }
    }

    public function approvedRequests()
    {
        $departmentId = User::getCurrentUserDepartmentId();
        $param['items'] = MaintenanceRequest::where('is_approved', true)
            ->where('department_id', $departmentId)->get();
        return view('auth::maintenance_requests.approved', $param);
    }

    public function resolveRequest($id)
    {
        try {
            $maintenanceRequest = MaintenanceRequest::find($id);
            $maintenanceRequest->status = 'Resolved';
            $maintenanceRequest->resolved_at = now();
            $maintenanceRequest->update();

            //Send Email to Student
            $student = User::find($maintenanceRequest->user_id);
            Mail::to($student->email)->send(new ResolvedNotificationMail($student,$maintenanceRequest));

            $success_msg = 'Successfully Resolved';
            return redirect()->back()->with('success', $success_msg);
        } catch (Exception $ex) {
            $error_msg = $ex->getMessage();
            return redirect()->back()->with('error', $error_msg);
        }
    }
}
