<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\UserRoles;

class UserRolesController extends Controller
{
    public function index()
    {
       $params['items'] = UserRoles::all();
       return view('auth::UserRoles.index', $params);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        UserRoles::create($data);
        return redirect()->back();
    }

    public function show($id)
    {
        return view('auth::show');
    }

    public function edit($id)
    {
        $param['items'] = UserRoles::find($id);
        return view('auth::UserRoles.edit', $param);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $User = User::find($id);
        $User->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $item = UserRoles::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        }else{
            return false;
        }
    }
}
