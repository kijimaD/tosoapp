<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Assessment;
use App\Assessmentdetail;
use App\Condition;
use Crypt;

class ApproveService
{
    // CRUD====================
    public function add($request)
    {
        $assessment_id = get_salted_id($request, 'assessment_id');

        $items = Assessmentdetail::where('assessment_id', $assessment_id)->get();
        $info = Assessment::find($assessment_id);
        $param = ['items' => $items,
                  'info' => $info,
                  'assessment_id' => $assessment_id,
      ];
        return $param;
    }

    // 表示用のjavascriptからは値を一切取得しない！のでやや複雑になっている。
    // まず了承・返送を格納。それを元に各値を計算して計算結果を合計カラムに格納する。
    public function create($request)
    {
        $assessment_id = session()->pull('assessment_id');
        $assessment = Assessment::find($assessment_id);

        // 詳細部分を格納する
        $this->create_detail_part($request);

        // 完了フラグ
        $this->create_approvedone($assessment);

        // 計算結果を格納する
        // 改善:引数の渡し方がヘン？うしろのメソッドに続けるために延々と引数が…。
        $this->create_calc_result($assessment_id, $assessment);

        // 了承通知をユーザに送信する
        $this->done_send($assessment_id);

        // 通知を管理者に通知する
        $this->done_send_admin($assessment_id);
    }

    // Utility====================

    // 承認、返送テーブルへ格納
    public function create_detail_part($request)
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
                DB::table('approvegoods')->insert(
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
    }

    //  案件フラグであるapprovedonesにinsertする。
    public function create_approvedone($assessment)
    {
        $entry_id = $assessment->entry->id;

        DB::table('approvedones')->insert(
            [
            'entry_id' => $entry_id,
            'created_at' => now(),
          ]
        );
    }

    // sumを導出する
    public function calc_sum($assessment_id, $assessment)
    {
        $sum_price = DB::table('assessmentdetails')
        ->join('assessments', 'assessments.id', '=', 'assessmentdetails.assessment_id')
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->join('approvegoods', 'assessmentdetails.id', '=', 'approvegoods.assessmentdetail_id')
        ->where('assessment_id', $assessment_id)
        ->sum('get_price');

        $coupen_value = $assessment->coupen->coupen_value; // クーポンの価格上昇率
        $total_price = floor($coupen_value * $sum_price); // クーポンを加味した合計値

        return $total_price;
    }

    // countを導出する
    public function calc_count($assessment_id, $assessment)
    {
        $count = DB::table('assessmentdetails')
        ->join('assessments', 'assessments.id', '=', 'assessmentdetails.assessment_id')
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->join('approvegoods', 'assessmentdetails.id', '=', 'approvegoods.assessmentdetail_id')
        ->where('assessment_id', $assessment_id)
        ->count();

        return $count;
    }

    // 導出項目をcreateする
    public function create_calc_result($assessment_id, $assessment)
    {
        $val = [
          'sum_price' => $this->calc_sum($assessment_id, $assessment),
          'goods_count' => $this->calc_count($assessment_id, $assessment),
          'created_at' => now(),
        ];
        $assessment->fill($val)->save();
    }

    // 案件ユーザに了承確認通知を送信する
    public function done_send($assessment_id)
    {
        $assessment = \App\Assessment::find($assessment_id);
        // ダミー
        $user = $assessment->entry->user;
        $user->SendApproveDone($user->name);
    }

    // 管理者ユーザに了承完了を通知する
    public function done_send_admin($assessment_id)
    {
        $assessment = \App\Assessment::find($assessment_id);
        $user = $assessment->entry->user;

        // 注意:臨時的にID=1の管理者ユーザーに送信している！！
        $admin = \App\Admin::find('1');
        $admin->SendApproveDone_admin($user->name);
    }
}
