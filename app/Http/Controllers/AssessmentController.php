<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Coupen;
use App\Shippingcost;
use App\Title;
use App\Goods;
use App\Assessmentdone;

class AssessmentController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Assessment::get();

        $param = ['items' => $items];
        return view('assessment.admin_index', $param);
    }

    public function add(Request $request)
    {
        $entry_id = \Crypt::decrypt($request->entry_id);
        $items = Assessment::get();
        $coupens = Coupen::get();
        $param = ['items' => $items,'coupens' => $coupens,'entry_id' => $entry_id];
        return view('assessment.add', $param);
    }

    public function create(Request $request)
    {
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
          'entry_id'=>$request->entry_id,
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

        return redirect('/assessment/admin_index');
    }

    public function edit(Request $request)
    {
        $assessment = Assessment::find($request->id);
        $param = ['form' => $assessment];
        return view('assessment.edit', $param);
    }

    public function update(Request $request)
    {
        $items = Assessment::get();

        $assessment = Assessment::find($request->id);
        $form_as = ['coupen_id'=>$request->coupen_id];
        $assessment->fill($form_as)->save();

        $shippingcost = Shippingcost::find($request->id);
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
                'assessment_id'=>$request->id,
              ]
            );
            }
        }

        return redirect('/assessment/admin_index');
    }

    public function delete(Request $request)
    {
        $form = Assessment::find($request->id);
        return view('assessment/del')->with('form', $form);
    }

    public function remove(Request $request)
    {
        Assessment::find($request->id)->delete();
        return redirect('/assessment/admin_index');
    }

    public function assessmentdone_create(Request $request)
    {
        $assessmentdone = new Assessmentdone;
        $form = $request->all();
        $assessmentdone->fill($form)->save();
        return redirect('assessment/admin_index');
    }
}
