<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Assessmentdetail;
use App\Receipt;
use Crypt;

class ReceiptService
{
    public function admin_index()
    {
        $items = Receipt::get();
        $param = ['items' => $items];
        return $param;
    }

    public function add($request)
    {
        $assessment_id = get_salted_id($request, 'assessment_id');
        $items = Assessmentdetail::where('assessment_id', $assessment_id)->get();
        $param = ['items' => $items];
        return $param;
    }

    // 改善:assessmentdetailのように一覧edit型にする
    public function create($request)
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
    }

    public function edit($request)
    {
        $receipt_id = get_salted_id($request, 'receipt_id');
        $form = Receipt::find($receipt_id);
        $param = ['form' => $form];
        return $param;
    }
}
