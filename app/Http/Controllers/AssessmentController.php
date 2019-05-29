<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Coupen;
use App\Shippingcost;

class AssessmentController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Assessment::get();
        $param = ['items' => $items];
        return view('assessment.admin_index', $param);
    }

    public function add(Request $request)
    {
        $items = Assessment::get();
        $coupens = Coupen::get();
        $param = ['items' => $items,'coupens' => $coupens,'entry_id' => $request->entry_id];
        return view('assessment.add', $param);
    }

    public function create(Request $request)
    {
        $assessment_id = DB::table('assessments')->insertGetId(
            [
          'entry_id'=>$request->entry_id,
          'coupen_id'=>$request->coupen_id,
          'created_at'=>now(),
        ]
      );

        $shipping_id = DB::table('shippingCosts')->insertGetId(
            [
          'assessment_id'=>$assessment_id,
          'shippingcost_type'=>$request->shippingcost_type,
          'cost'=>$request->cost,
          'apply_cost'=>$request->apply_cost,
          'created_at'=>now(),
        ]
      );
        return redirect('/assessment/admin_index');
    }

    public function edit(Request $request)
    {
        $assessment = Assessment::find($request->id);
        $param = ['form' => $assessment];
        return view('assessment.edit', $param);
    }

    public function update(Request $request)
    {
        $items = Assessment::get();

        $assessment = Assessment::find($request->id);
        $form_as = ['coupen_id'=>$request->coupen_id];
        $assessment->fill(['coupen_id'=>$request->coupen_id])->save();

        $shippingcost = Shippingcost::find($request->id);
        $shippingcost->fill([
                    'cost'=>$request->cost,
                    'apply_cost'=>$request->apply_cost,
                    'shippingcost_type'=>$request->shippingcost_type
                  ])->save();

        return redirect('/assessment/admin_index');
    }

    public function delete(Request $request)
    {
        $form = Assessment::find($request->id);
        return view('assessment/del')->with('form', $form);
    }

    public function remove(Request $request)
    {
        Assessment::find($request->id)->delete();
        return redirect('/assessment/admin_index');
    }
}
