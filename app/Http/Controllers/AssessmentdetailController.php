<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Assessmentdetail;
use App\Goods;
use App\Title;

class AssessmentdetailController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = assessmentdetail::get();
        $param = ['items' => $items];
        return view('assessmentdetail.admin_index', $param);
    }

    public function edit(Request $request)
    {
        $items = Assessmentdetail::where('assessment_id', $request->id)->get();
        $param = ['items' => $items];
        return view('assessmentdetail.edit', $param);
    }

    public function update(Request $request)
    {
        // $items = assessmentdetail::where('assessment_id', $request->id)->get();
        // $form = $request->all();
        // $items->fill($form)->save();

        foreach (array_map(
            null,
            $request->goods_id,
            $request->title_id,
            $request->isbn,
            $request->title_name,
            $request->description,
            $request->condition_id,
            $request->market_price,
            $request->get_price,
            $request->sell_price
            )
            as
          [$val_goods_id,
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
        }

        $items = assessmentdetail::get();
        $param = ['items' => $items];
        return redirect('/assessment/admin_index');
    }
}