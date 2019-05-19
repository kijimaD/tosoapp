<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Addressbook;
use App\Prefecture;

class AddressBookController extends Controller
{
    public function index(Request $request)
    {
        $items = Addressbook::get();
        return view('address.index')->with('items', $items);
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
}
