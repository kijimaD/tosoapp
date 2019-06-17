<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Receipt;
use App\Assessmentdetail;
use App\Entry;

class ReceiptController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Receipt::get();
        $param = ['items' => $items];
        return view('receipt.admin_index', $param);
    }

    public function add(Request $request)
    {
        $assessment_id = \Crypt::decrypt($request->id);
        $items = Assessmentdetail::where('assessment_id', $assessment_id)->get();
        $param = ['items' => $items];
        return view('receipt.add', $param);
    }

    // あったら新規追加型のcreate
    public function create(Request $request)
    {
        foreach (array_map(
            null,
            $request->approvegoods_id,
            $request->goods_id,
            $request->warehouse_id,
            $request->rack_id,
            $request->stage_id,
            )
      as
      [$val_approvegoods_id,
       $val_goods_id,
       $val_warehouse_id,
       $val_rack_id,
       $val_stage_id,
     ]) {
            $storagestructure_id = DB::table('storageStructures')->insertGetId(
                [
              'warehouse_id' => $val_warehouse_id,
              'rack_id' => $val_rack_id,
              'stage_id' => $val_stage_id,
              ]
            );

            $receipt_id = DB::table('receipts')->insertGetId(
                [
             'storagestructure_id' => $storagestructure_id,
             'approvegoods_id' => $val_approvegoods_id,
             'goods_id' => $val_goods_id,
         ]
       );
        }
        return redirect('receipt/admin_index');
    }
}
