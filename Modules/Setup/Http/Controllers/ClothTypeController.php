<?php

namespace Modules\Setup\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setup\Entities\ClothType;
use Modules\Setup\Entities\TradePoint;

class ClothTypeController extends Controller
{

    public function index()
    {
        $param['items'] = ClothType::all();
        return view('setup::cloth_type.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = ClothType::isExist($data['name']);
            if (!$isExist) {
                ClothType::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Cloth Type Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function show($id)
    {
        return view('setup::show');
    }

    public function edit($id)
    {
        $params['item'] = ClothType::find($id);
        return view('setup::cloth_type.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $cloth_type = ClothType::find($id);
            $isExist = ClothType::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $cloth_type->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Cloth Type Name Already Exist';
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
            $item = ClothType::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Cloth Type Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

}
