<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\Department;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $param['items'] = Asset::all();
        $param['departments'] = Department::all();
        $param['asset_categories'] = AssetCategory::all();
        $param['locations'] = Location::all();
        return view('room-assets.index', $param);
    }
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Asset::isExist($data['name']);
            if (!$isExist) {
                Asset::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Asset Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = Asset::find($id);
        $params['departments'] = Department::orderBy('name')->get();
        $params['asset_categories'] = AssetCategory::orderBy('name')->get();
        $params['locations'] = Location::orderBy('name')->get();
        return view('room-assets.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $asset = Asset::find($id);
            $isExist = Asset::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $asset->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Asset Name Already Exist';
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
            $item = Asset::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Asset Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
