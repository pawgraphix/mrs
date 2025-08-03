<?php

namespace App\Http\Controllers;

use App\Exports\RpMaintenance;
use App\Models\Department;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $param['is_post_back'] = false;
        $param['status'] = array("Approved", "Rejected", "Submitted", "Resolved");
        $param['departments'] = Department::all();
        return view('report.maintenance.index', $param);
    }

    public function getInfo(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $param['status'] = array("Approved", "Rejected", "Submitted", "Resolved");
        $param['departments'] = Department::all();

        $items = MaintenanceRequest::query();

        if ($data['department_id'] != null) {
            $items = $items->where('department_id', $data['department_id']);
        }

        if ($data['status'] != null) {
            $items = $items->where('status', $data['status']);
        }

        $param['is_post_back'] = true;
        $param['items'] = $items->get();
        session(['items_data' => $param['items']]);
        return view('report.maintenance.index', $param);
    }

    public function downloadExcel()
    {
        return Excel::download(new RpMaintenance(), 'maintenance_report.xlsx');
    }
}
