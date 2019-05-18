<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addressbook;

class AddressBookController extends Controller
{
    public function index(Request $request)
    {
        $items = addressbook::get();
        return view('address.index')->with('items', $items);
    }

    public function add(Request $request)
    {
        return view('address.add');
    }

    public function create(Request $request)
    {
        $address = new addressbook;
        $form = $request->all();
        unset($form['_token']);
        $address->fill($form)->save();
        return redirect('/address');
    }
}
