<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessmentdetail;
use App\Condition;

class ApproveController extends Controller
{
    public function index(Request $request)
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
      ];
        return view('approve.index', $param);
    }

    public function approve(Reqeust $request)
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
        }
    }
}
