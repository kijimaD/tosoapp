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
        $param = ['items' => $items,
                  'info' => $info,
                  'assessment_id' => $assessment_id,
      ];
        return view('approve.add', $param);
    }

    public function create(Request $request)
    {
        $assessment_id = session()->pull('assessment_id');
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
        //  案件フラグであるapprovedonesにinsertする。
        $assessment = Assessment::find($assessment_id);
        $entry_id = $assessment->entry->id;
        DB::table('approvedones')->insert(
            [
            'entry_id' => $entry_id,
            'created_at' => now(),
          ]
        );

        // 入金予定額をassessmentsにinsertする
        //   $form_as = [
        //     'sum_price'=>$request->sum_price,
        //     'goods_count'=>$request->goods_count,
        // ];
        //   $assessment->fill($form_as)->save();

        // 了承商品から額と数量の合計を導出してassessmentsにinsertする。子側にjoinする方法がわからないので、親側を起点にしている。
        $sum_price = DB::table('assessmentdetails')
        ->join('assessments', 'assessments.id', '=', 'assessmentdetails.assessment_id')
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->join('approvegoods', 'assessmentdetails.id', '=', 'approvegoods.assessmentdetail_id')
        ->where('assessment_id', $assessment_id)
        ->sum('get_price');

        $count = DB::table('assessmentdetails')
        ->join('assessments', 'assessments.id', '=', 'assessmentdetails.assessment_id')
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->join('approvegoods', 'assessmentdetails.id', '=', 'approvegoods.assessmentdetail_id')
        ->where('assessment_id', $assessment_id)
        ->count();

        $val = [
          'sum_price' => $sum_price,
          'goods_count' => $count,
          'created_at' => now(),
        ];
        $assessment->fill($val)->save();

        return redirect('/entry');
    }
}
