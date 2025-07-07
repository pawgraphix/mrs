<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    public function index()
    {
        $param['items'] = Department::all();
        return view('auth::departments.index', $param);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Department::isExist($data['name']);
            if (!$isExist) {
               Department::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Department Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = Department::find($id);
        return view('auth::departments.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $trade_point = Department::find($id);
            $isExist = Department::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $trade_point->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Department Name Already Exist';
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
            $item = Department::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Department Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
