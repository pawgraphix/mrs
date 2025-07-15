<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Setup\Entities\TradePoint;

class UserController extends Controller
{

    public function index()
    {
        $param['items'] = User::all();
        $param['departments'] = Department::all();
        $param['genders'] = ['Male', 'Female'];
        $param['roles'] = Role::all();
        return view('auth::users.index', $param);
    }

    public function store(Request $request)
    {
        try {
            // Validate inputs (recommended)
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'string|min:6|confirmed',
                // Add other fields you need here
            ]);

            // Prepare data
            $data = $request->all();
            $data['password'] = Hash::make(123456);

            // Check if user with email exists
            $existingUser = User::isExist($data['email']);

            if (!$existingUser) {
                User::create($data);
                return redirect()->back()->with('success', 'Successfully Saved');
            } else {
                return redirect()->back()->with('error', 'Email already exists');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function edit($id)
    {
        $params['item'] = User::find($id);
        $params['departments'] = Department::orderBy('name')->get();
        $params['roles'] = Role::orderBy('name')->get();
        $params['genders'] = ['Male', 'Female'];
        return view('auth::users.edit',$params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $user = User::find($id);
            $isExist = User::isExistOnEdit($data['email'], $id);
            if (!$isExist) {
                $user->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Email Already Exist';
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
            $item = User::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'User Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $error_msg = $ex->getMessage();
            return redirect()->back()->with('error', $error_msg);
        }
    }
}
