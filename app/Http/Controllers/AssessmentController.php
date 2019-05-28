<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Coupen;

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
}
