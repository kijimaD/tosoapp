<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Assessmentdetail;
use App\Condition;

class AssessmentdetailController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Assessmentdetail::get();
        $param = ['items' => $items];
        return view('assessmentdetail.admin_index', $param);
    }

    public function edit(Request $request)
    {
        $assessment_id = \Crypt::decrypt($request->id);
        $items = Assessmentdetail::where('assessment_id', $assessment_id)->get();
        $conditions = Condition::get();
        $db_operations = new \App\lib\DbOperations;

        $param = ['items' => $items,
                  'conditions' => $conditions,
                  'sum_get_price' => $db_operations
                  ->sum_assessment_price_column('get_price', $request),
                  'sum_market_price' => $db_operations
                  ->sum_assessment_price_column('market_price', $request),
                  'sum_sell_price' => $db_operations
                  ->sum_assessment_price_column('sell_price', $request),
      ];
        return view('assessmentdetail.edit', $param);
    }

    public function update(Request $request)
    {
        $db_operations = new \App\lib\DbOperations;
        $db_operations->assessmentdetails_update($request);

        return redirect('/assessment/admin_index');
    }

    public function delete(Request $request)
    {
        $assessmentdetail_id = \Crypt::decrypt($request->id);
        $form = Assessmentdetail::find($assessmentdetail_id);
        return view('assessmentdetail/del')->with('item', $form);
    }

    public function remove(Request $request)
    {
        $assessment_id = session()->pull('assessmentdetail_id');
        Assessmentdetail::find($assessment_id)->delete();
        return redirect('/assessmentdetail/admin_index');
    }
}
