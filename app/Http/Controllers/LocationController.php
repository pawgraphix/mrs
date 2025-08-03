<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $param['items'] = Location::all();
        return view('locations.index', $param);
    }
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Location::isExist($data['name']);
            if (!$isExist) {
                Location::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = 'Location Name Already Exist';
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

    public function edit($id)
    {
        $params['item'] = Location::find($id);
        return view('locations.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $location = Location::find($id);
            $isExist = Location::isExistOnEdit($data['name'], $id);
            if (!$isExist) {
                $location->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Location Name Already Exist';
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
            $item = Location::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = 'Location Name Does not Exist';
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }
}
