<?php
namespace App\lib;

use Illuminate\Support\Facades\DB;
use App\Goods;
use App\Title;
use App\Condition;

class DbOperations
{
    // assessmentdetailsのカラムの合計額を計算する
    public function sum_assessment_price_column($column, $request)
    {
        $assessment_id = \Crypt::decrypt($request->id);
        $sum = DB::table('assessmentdetails')
          ->where('assessment_id', $assessment_id)
          ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
          ->sum($column);
        return $sum;
    }

    // assessmentdetailsの各データをupdateする
    public function assessmentdetails_update($request)
    {
        $goods_id = session()->pull('goods_id');
        $title_id = session()->pull('title_id');

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
            $request->sell_price,
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
          ]
        ) {
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
                $this->calc_get_price($val_condition_id, $val_market_price, $val_goods_id);
            }
            // タイトル取得にチェックがあったら実行する
            if (isset($request->flag_get_title)) {
                $this->obtain_info_by_amazon($val_isbn, $val_title_id, $val_goods_id);
            }
        }
    }

    // 査定価格を計算・保存する
    public function calc_get_price($val_condition_id, $val_market_price, $val_goods_id) // メソッド内の変数を再利用したいが、やり方がわからない。
    {
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

    // タイトルを取得・保存する
    public function obtain_info_by_amazon($val_isbn, $val_title_id, $val_goods_id)
    {
        $search_amazon = new \App\lib\Amazonfunctions;
        $goodsinfo_amazon = $search_amazon -> searchIsbn($val_isbn);
        sleep(1);

        Title::find($val_title_id)->update(
            [
                  'title_name' => $goodsinfo_amazon['titlename'],
                  'updated_at' => now(),
                ]
              );
        Goods::find($val_goods_id)->update(
            [
            'market_price' => $goodsinfo_amazon['usedprice'],
            'updated_at' => now(),
          ]
        );
    }
}
