<?php
namespace App\Service;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use App\Assessment;
use App\AssessmentDone;
use App\Coupen;
use App\Shippingcost;

class AssessmentService
{

  // 追加に必要な値を返す。
    public function add($request)
    {
        $entry_id = \Crypt::decrypt($request->entry_id);
        $items = Assessment::get();
        $coupens = Coupen::get();
        $param = ['items' => $items,'coupens' => $coupens,'entry_id' => $entry_id];
        return $param;
    }

    // 査定関係に関係するテーブルへ新規レコードを作成する。
    public function create($request)
    {
        $entry_id = session()->pull('entry_id');
        $search_amazon = new \App\lib\Amazonfunctions;
        $shippingcost_id = DB::table('shippingCosts')->insertGetId(
            [
          'shippingcost_type'=>$request->shippingcost_type,
          'cost'=>$request->cost,
          'apply_cost'=>$request->apply_cost,
          'created_at'=>now(),
        ]
      );

        $assessment_id = DB::table('assessments')->insertGetId(
            [
          'entry_id'=>$entry_id,
          'coupen_id'=>$request->coupen_id,
          'shippingcost_id'=>$shippingcost_id,
          'created_at'=>now(),
        ]
      );

        foreach (array_map(null, $request->isbn, $request->title) as [$val_isbn,$val_title]) {
            $goodsinfo_amazon = $search_amazon -> searchIsbn($val_isbn);
            sleep(1);

            $title_id = DB::table('titles')->insertGetId(
                [
          'isbn'=>$val_isbn,
          'title_name'=>$goodsinfo_amazon['titlename'],
          'created_at'=>now(),
          ]
        );

            $market_price = $goodsinfo_amazon['usedprice'];
            $goods_id = DB::table('goods')->insertGetId(
                [
              'title_id'=>$title_id,
              'market_price'=>$market_price,
              'sell_price'=>$market_price,
            ]
          );

            $assessmentdetail_id = DB::table('assessmentDetails')->insertGetId(
                [
                'goods_id'=>$goods_id,
                'assessment_id'=>$assessment_id,
              ]
            );
        }
    }

    // 必要な値を返す。
    public function edit($request)
    {
        $assessment_id = \Crypt::decrypt($request->id);
        $assessment = Assessment::find($assessment_id);
        $param = ['form' => $assessment];
        return $param;
    }

    // 各テーブルを更新する。
    public function update($request)
    {
        $assessment_id = session()->pull('assessment_id');

        $assessment = Assessment::find($assessment_id);
        $assessment->fill(['coupen_id'=>$request->coupen_id])->save();

        $shippingcost = Shippingcost::find($assessment_id);
        $shippingcost->fill([
                    'cost'=>$request->cost,
                    'apply_cost'=>$request->apply_cost,
                    'shippingcost_type'=>$request->shippingcost_type
                  ])->save();

        if (isset($request->isbn) || isset($request->title)) {
            foreach (array_map(null, $request->isbn, $request->title) as [$val_isbn,$val_title]) {
                $title_id = DB::table('titles')->insertGetId(
                    [
          'isbn'=>$val_isbn,
          'title_name'=>$val_title,
          'created_at'=> now(),
          ]
        );

                $goods_id = DB::table('goods')->insertGetId(
                    [
              'title_id'=>$title_id,
            ]
          );

                $assessmentdetail_id = DB::table('assessmentDetails')->insertGetId(
                    [
                'goods_id'=>$goods_id,
                'assessment_id'=>$assessment_id,
              ]
            );
            }
        } //if節
    }

    // 査定完了テーブルへ書き込む
    public function done_create($request)
    {
        $entry_id = session()->pull('entry_id');
        $form = $request->all();
        $form += array('entry_id'=>$entry_id); // $entry_idはall()に入れらないので、後付けする。
        // Memo: メール送信のデバッグ用にDBに格納しない！
        // $assessmentdone = new Assessmentdone;
        // $assessmentdone->fill($form)->save();
        $this->done_send($entry_id);
    }

    // 案件ユーザに査定完了通知を送信する
    public function done_send($entry_id)
    {
        $entry = \App\Entry::find($entry_id);
        $assessment_id = Crypt::encrypt($entry->assessment->id);
        $user = $entry->user;
        $user->SendAssessmentDone($user->name, $assessment_id);
    }
}
