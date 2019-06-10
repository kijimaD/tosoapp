<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Assessmentdetail;
use App\Condition;

class ApproveController extends Controller
{
    public function add(Request $request)
    {
        $items = Assessmentdetail::where('assessment_id', $request->id)->get();
        $conditions = Condition::get();
        $sum_get_price = DB::table('assessmentdetails')
        ->where('assessment_id', $request->id)
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->sum('get_price');
        $param = ['items' => $items,
                  'conditions' => $conditions,
                  'sum_get_price' => $sum_get_price,
                  'assessment_id' => $request->id,
      ];
        return view('approve.add', $param);
    }

    public function create(Request $request)
    {
        foreach (array_map(
            null,
            $request->assessmentdetail_id,
            $request->approve
        )
        as
        [$val_assessmentdetail_id,
         $val_approve,
      ]) {
            if ($val_approve == "yes") {
                DB::table('approveGoods')->insert(
                    [
                  'assessmentdetail_id' => $val_assessmentdetail_id,
                  'created_at' => now(),
                ]
              );
            }
            if ($val_approve == "no") {
                DB::table('resendGoods')->insert(
                    [
                  'assessmentdetail_id' => $val_assessmentdetail_id,
                  'created_at' => now(),
                ]
              );
            }
        }
        // approvedonesにinsertする。
        $assessment = Assessment::find($request->assessment_id);
        $entry_id = $assessment->entry->id;
        DB::table('approvedones')->insert(
            [
            'entry_id' => $entry_id,
            'created_at' => now(),
          ]
        );
        return redirect('/entry');
    }
}
