<?php

namespace Modules\Setup\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OrderMgnt\Entities\Order;
use Modules\Setup\Entities\ClothType;
use Modules\Setup\Entities\CompletionStage;
use Modules\Setup\Entities\Customer;

class CompletionStageController extends Controller
{
    public function index($clothTypeId)
    {
        $params['items'] = CompletionStage::where('cloth_type_id',$clothTypeId)->orderBy('name')->get();
//        $params['cloth_types'] = ClothType::orderBy('name')->get();
        $params['cloth_type'] = ClothType::find($clothTypeId);
        return view('setup::CompletionStage.index', $params);
    }

    public function store(Request $request)
    {
        $data = $request->all();
//       dd($data);
        //check sum if is greater than 100
        $totalPercentAdded = CompletionStage::where('cloth_type_id',$data['cloth_type_id'])->sum('percentage_weight');
        $newPercent = $data['percentage_weight'];
        $totalNewPercent = $totalPercentAdded + $newPercent;
        if ($totalNewPercent <= 100){
            CompletionStage::create($data);
            return redirect()->back();
        }else{
            return redirect()->back()->with("Error Occurred");
        }
    }

    public function show($id)
    {
        return view('Setup::show');
    }

    public function edit($id)
    {
        $params['item'] = CompletionStage::find($id);
        $params['cloth_types'] = ClothType::orderBy('name')->get();
        return view('setup::CompletionStage.edit', $params);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $completion_stage = CompletionStage::find($id);
        $completion_stage->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $item = CompletionStage::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        } else {
            return false;
        }
    }
}
