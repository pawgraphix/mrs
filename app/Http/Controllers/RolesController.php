<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RolesController extends Controller
{

    public function index()
    {
        $params['items'] = Role::orderBy('name')->get();
        return view('roles.index', $params);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Role::isExist($data['name']);
            if (!$isExist) {
                Role::create($data);
                $success_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Role Already Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function show($id)
    {
        return view('auth::show');
    }

    public function edit($id)
    {
        $params['item'] = Role::find($id);
        return view('roles.edit',$params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $role = Role::find($id);
            $isExist = Role::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $role->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Role Already Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $error_msg = $ex->getMessage();
            return redirect()->back()->with('error', $error_msg);
        }
    }

    public function destroy($id)
    {
        try {
            $item = Role::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Role Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $error_msg = $ex->getMessage();
            return redirect()->back()->with('error', $error_msg);
        }
    }
}
