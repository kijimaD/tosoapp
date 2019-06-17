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
        $assessment_id = \Crypt::decrypt($request->id);

        $items = Assessmentdetail::where('assessment_id', $assessment_id)->get();
        $info = Assessment::find($assessment_id)->first();
        $sum_get_price = DB::table('assessmentdetails')
        ->where('assessment_id', $request->id)
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->sum('get_price');
        $param = ['items' => $items,
                  'info' => $info,
                  'sum_get_price' => $sum_get_price,
                  'assessment_id' => $assessment_id,
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
        // 商品個別フラグであるapprovedonesにinsertする。
        $assessment = Assessment::find($request->assessment_id);
        $entry_id = $assessment->entry->id;
        DB::table('approvedones')->insert(
            [
            'entry_id' => $entry_id,
            'created_at' => now(),
          ]
        );

        // 入金予定額をassessmentsにinsertする
        $form_as = ['sum_price'=>$request->sum_price,
                    'goods_count'=>$request->goods_count,
      ];
        $assessment->fill($form_as)->save();


        return redirect('/entry');
    }
}
