<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Entities\Role;
use Modules\Auth\Entities\UserRoles;

class RolesController extends Controller
{

    public function index()
    {
        $params['items'] = Role::orderBy('name')->get();
        return view('auth::roles.index', $params);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        Role::create($data);
        return redirect()->back();
    }

    public function show($id)
    {
        return view('auth::show');
    }

    public function edit($id)
    {
        $params['item'] = Role::find($id);
        return view('auth::roles.edit',$params);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $role = Role::find($id);
        $role->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $item = Role::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        }else{
            return false;
        }
    }
}
