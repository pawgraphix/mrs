<?php

namespace Modules\OrderMgnt\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OrderMgnt\Entities\Tailor;

class TailorsController extends Controller
{
    public function index()
    {
        $param['items'] = Tailor::all();
        $param['genders'] = array("Male","Female");
        return view('ordermgnt::tailor.index', $param);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $isExist = Tailor::isExist($data['phone_number']);
            if (!$isExist) {
                Tailor::create($data);
                $error_msg = 'Successfully Saved';
                return redirect()->back()->with('success', $error_msg);
            } else {
                $success_msg = "Tailor with Phone Number {$data['phone_number']} Already Exist";
                return redirect()->back()->with('error', $success_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }


    public function edit($id)
    {
        $params['item'] = Tailor::find($id);
        $params['genders'] = array("Male","Female");
        return view('ordermgnt::tailor.edit', $params);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $tailor = Tailor::find($id);
            $isExist = Tailor::isExistOnEdit($data['phone_number'], $id);
            if (!$isExist) {
                $tailor->update($data);
                $success_msg = 'Successfully Updated';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = "Tailor with Phone Number {$data['phone_number']} Already Exist";
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
            $item = Tailor::find($id);
            if ($item) {
                $item->delete();
                $success_msg = 'Successfully Deleted';
                return redirect()->back()->with('success', $success_msg);
            } else {
                $error_msg = "Tailor with name $item->first_name $item->last_name  Does not Exist";
                return redirect()->back()->with('error', $error_msg);
            }
        } catch (Exception $ex) {
            $success_msg = $ex->getMessage();
            return redirect()->back()->with('error', $success_msg);
        }
    }

}
