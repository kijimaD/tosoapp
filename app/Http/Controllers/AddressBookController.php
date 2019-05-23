<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Addressbook;
use App\Prefecture;
use App\UserAddress;

class AddressBookController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Addressbook::where('user_id', 'like', $user["id"])->get();
        $param = ['items' => $items, 'user' => $user];
        return view('address.index', $param);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $items = prefecture::get();
        $param = ['items' => $items, 'user' => $user];
        return view('address.add', $param);
    }

    public function create(Request $request)
    {
        $address = new Addressbook;
        $form = $request->all();
        unset($form['_token']);
        $address->fill($form)->save();
        return redirect('/address');
    }

    public function edit(Request $request)
    {
        $address = Addressbook::find($request->id);
        $prefecture = prefecture::get();
        $param = ['form' => $address, 'items' => $prefecture];
        return view('address.edit', $param);
    }

    public function update(Request $request)
    {
        $address = Addressbook::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $address->fill($form)->save();
        return redirect('/address');
    }

    public function delete(Request $request)
    {
        $form = Addressbook::find($request->id);
        $prefecture = prefecture::get();
        $param = ['form' => $form, 'items' => $prefecture];
        return view('/address/del', $param);
    }

    public function remove(Request $request)
    {
        Addressbook::find($request->id)->delete();
        return redirect('/address');
    }

    public function defaultCreate(Request $request)
    {
        Useraddress::where('user_id', $request->user_id)->delete();

        $default_address = new Useraddress;
        $form = $request->all();
        unset($form['_token']);
        $default_address->fill($form)->save();
        return redirect('/address');
    }
}
