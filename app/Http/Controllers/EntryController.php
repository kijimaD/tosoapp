<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bank;
use App\Entry;
use App\Addressbook;

class EntryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Entry::where('user_id', 'like', $user['id'])->get();
        $param = ['items' => $items, 'user' => $user];
        return view('entry.index', $param);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $banks = Bank::where('user_id', 'like', $user["id"])->get();
        $addresses = Addressbook::where('user_id', 'like', $user["id"])->get();
        $param = ['user' => $user,'banks' => $banks, 'addresses' => $addresses];
        return view('entry.add', $param);
    }

    public function create(Request $request)
    {
        $entry_id = DB::table('entries')->insertGetId(
            [
      'user_id'=>$request->user_id,
      'paymentWay_id'=>$request->paymentWay_id,
      'shippingWay_id'=>$request->shippingWay_id,
    ]
    );

        $applygoods_id = DB::table('applyGoods')->insertGetId(
            [
          'entry_id'=>$entry_id,
    ]
    );

        $collection_id = DB::table('collections')->insertGetId(
            [
      'collection_day'=>$request->collection_day,
      'collection_time'=>$request->collection_time,
      'box_num'=>$request->box_num,
      'applyGoods_id'=>$applygoods_id,
      'addressBook_id'=>$request->addressBook_id,
    ]
    );

        $paymentBank_id = DB::table('paymentBanks')->insertGetId(
            [
      'entry_id'=>$entry_id,
      'bank_id'=>$request->paymentBank_id,
    ]
    );


        return redirect('/entry');
    }

    public function edit(Request $request)
    {
        $entry = Entry::find($request->id);
        $param = ['form' => $entry];
        return view('entry.edit', $param);
    }

    public function update(Request $request)
    {
        $entry = Entry::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $entry->fill($form)->save();
        return redirect('/entry');
    }

    public function delete(Request $request)
    {
        $form = Entry::find($request->id);
        return view('entry/del')->with('form', $form);
    }

    public function remove(Request $request)
    {
        Entry::find($request->id)->delete();
        return redirect('/entry');
    }
}
