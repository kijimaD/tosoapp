<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Addressbook;
use App\Bank;
use App\Entry;
use Crypt;

class EntryService
{
    // CRUD ==========
    public function index()
    {
        $user = Auth::user();
        $items = Entry::where('user_id', 'like', $user['id'])->get();
        $param = ['items' => $items, 'user' => $user];
        return $param;
    }

    public function admin_index()
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return $param;
    }

    public function add()
    {
        $user = Auth::user();
        $banks = Bank::where('user_id', $user["id"])->get();
        $addresses = Addressbook::where('user_id', $user["id"])->get();
        $param = ['user' => $user,'banks' => $banks, 'addresses' => $addresses];
        return $param;
    }

    public function create($request)
    {
        $user_id = session()->pull('user_id');
        $entry_id = DB::table('entries')->insertGetId(
            [
      'user_id'=>$user_id,
      'paymentWay_id'=>$request->paymentway_id,
      'shippingWay_id'=>$request->shippingway_id,
      'created_at'=>now(),
    ]
    );

        $applygoods_id = DB::table('applyGoods')->insertGetId(
            [
          'entry_id'=>$entry_id,
    ]
    );

        // 受け取り方法が集荷時のときのみ
        if ($request->shippingway_id == '1') {
            $collection_id = DB::table('collections')->insertGetId(
                [
      'collection_day'=>$request->collection_day,
      'collection_time'=>$request->collection_time,
      'box_num'=>$request->box_num,
      'applyGoods_id'=>$applygoods_id,
      'addressBook_id'=>$request->addressBook_id,
    ]
    );
        }

        // 入金方法が銀行振込時のときのみ
        if ($request->paymentway_id == '1') {
            $paymentBank_id = DB::table('paymentBanks')->insertGetId(
                [
      'entry_id'=>$entry_id,
      'bank_id'=>$request->paymentbank_id,
    ]
    );
        }
    }

    // 注意:view側が未実装、未テスト。不必要かもしれない。
    // こちらから修正するケースがなく、キャンセルフラグをつけることはあっても削除することはない。
    public function edit($request)
    {
        $entry_id = get_salted_id($request, 'entry_id');
        $entry = Entry::find($entry_id);
        $param = ['form' => $entry];
        return $param;
    }

    public function update($request)
    {
        $entry_id = session()->pull('entry_id');
        $entry = Entry::find($entry_id);
        $form = $request->all();
        $entry->fill($form)->save();
    }

    public function delete($request)
    {
        $entry_id = get_salted_id($request, 'entry_id');
        $form = Entry::find($entry_id);
        $param = ['form' => $form];
        return $param;
    }

    public function remove($request)
    {
        $entry_id = session()->pull('entry_id');
        Entry::find($entry_id)->delete();
    }

    public function unify()
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return $param;
    }
}
