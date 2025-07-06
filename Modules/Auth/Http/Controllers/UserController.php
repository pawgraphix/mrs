<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Setup\Entities\TradePoint;

class UserController extends Controller
{

    public function index()
    {
        $params['items'] = User::orderBy('first_name')->get();
        $params['trade_points'] = TradePoint::orderBy('name')->get();
        $params['genders'] = array("Male","Female");
        return view('auth::users.index', $params);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make(12345);
        User::create($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $params['item'] = User::find($id);
        $params['trade_points'] = TradePoint::orderBy('name')->get();
        $params['genders'] = array("Male","Female");
        return view('auth::users.edit',$params);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user= User::find($id);
        $user->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $item = User::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        }else{
            return false;
        }
    }
}
