<?php
namespace App\lib;

use Illuminate\Support\Facades\DB;

class DbOperations
{
    public function sum_assessment_price_column($column, $assessment_id)
    // assessmentdetailsのカラムの合計額を計算する
    {
        $goal = DB::table('assessmentdetails')
          ->where('assessment_id', $assessment_id)
          ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
          ->sum($column);
        return $goal;
    }
}
