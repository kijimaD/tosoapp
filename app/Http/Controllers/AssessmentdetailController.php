<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Assessmentdetail;
use App\Goods;
use App\Title;
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
                  ->sum_assessment_price_column('get_price', $assessment_id),
                  'sum_market_price' => $db_operations
                  ->sum_assessment_price_column('market_price', $assessment_id),
                  'sum_sell_price' => $db_operations
                  ->sum_assessment_price_column('sell_price', $assessment_id),
      ];
        return view('assessmentdetail.edit', $param);
    }

    public function update(Request $request)
    {
        $goods_id = session()->pull('goods_id');
        $title_id = session()->pull('title_id');
        $search_amazon = new \App\lib\Amazonfunctions;
        foreach (array_map(
            null,
            $goods_id,
            $title_id,
            $request->isbn,
            $request->title_name,
            $request->description,
            $request->condition_id,
            $request->market_price,
            $request->get_price,
            $request->sell_price
            )
            as
          [
            $val_goods_id,
            $val_title_id,
            $val_isbn,
            $val_title_name,
            $val_description,
            $val_condition_id,
            $val_market_price,
            $val_get_price,
            $val_sell_price
          ]) {
            Goods::find($val_goods_id)->update(
                [
            'description' => $val_description,
            'condition_id' => $val_condition_id,
            'market_price' => $val_market_price,
            'get_price' => $val_get_price,
            'sell_price' => $val_sell_price
          ]
        );
            Title::find($val_title_id)->update(
                [
              'title_name' => $val_title_name,
              'isbn' => $val_isbn,
            ]
          );
            // 査定価格取得にチェックがあったら実行する
            if (isset($request->flag_get_price)) {
                $condition = Condition::where('id', $val_condition_id)->first();
                $condition_percent = $condition->condition_percent;
                $get_price = $val_market_price * $condition_percent;
                Goods::find($val_goods_id)->update(
                    [
                    'get_price' => $get_price,
                    'sell_price' => $val_market_price,
                  ]
                );
            }
            // タイトル取得にチェックがあったら実行する
            if (isset($request->flag_get_title)) {
                $goodsinfo_amazon = $search_amazon -> searchIsbn($val_isbn);
                sleep(1);

                Title::find($val_title_id)->update(
                    [
                  'title_name' => $goodsinfo_amazon['titlename'],
                  'updated_at' => now(),
                ]
              );
            }
        }

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
