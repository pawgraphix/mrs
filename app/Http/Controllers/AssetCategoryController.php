<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use Exception;
use Illuminate\Http\Request;

class AssetCategoryController extends Controller
{
    public function index()
    {
        $param['items'] = AssetCategory::all();
        return view('asset_categories.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = AssetCategory::isExist($data['name']);
            if (!$isExist) {
                AssetCategory::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Asset Category Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = AssetCategory::find($id);
        return view('asset_categories.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $trade_point = AssetCategory::find($id);
            $isExist = AssetCategory::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $trade_point->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Asset Category Name Already Exist';
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
            $item = AssetCategory::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Asset Category Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
