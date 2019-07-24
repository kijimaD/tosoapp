<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use App\Entry;
use App\Applydone;

class CollectionService
{
    public function admin_index()
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return $param;
    }

    public function applydone_create($request)
    {
        $entry_id = get_salted_id($request, 'entry_id');
        $applydone = new Applydone;
        $applydone->fill([
          'entry_id' => $entry_id
          ])
        ->save();
    }

    public function cancel_for_apply($request)
    {
        $entry_id = get_salted_id($request, 'entry_id');
        $cancel = new \App\Cancel;
        $cancel->fill([
        'entry_id' => $entry_id,
        'reason' => '集荷依頼に失敗しました。お手数ですが再度申し込んでください',
      ])->save();
    }

    public function cancel_for_no_arrival($request)
    {
        $entry_id = get_salted_id($request, 'entry_id');
        $cancel = new \App\Cancel;
        $cancel->fill([
        'entry_id' => $entry_id,
        'reason' => '商品の到着が確認できませんでした。',
      ])->save();
    }
}
