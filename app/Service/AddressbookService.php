<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Addressbook;
use App\Prefecture;
use App\UserAddress;

class AddressbookService
{
    // CRUD ==========
    public function index()
    {
        $user = Auth::user();
        $items = Addressbook::where('user_id', $user["id"])->get();
        $param = ['items' => $items, 'user' => $user];
        return $param;
    }

    public function add()
    {
        $user = Auth::user();
        $items = prefecture::get();
        $param = ['items' => $items, 'user' => $user];
        return $param;
    }

    public function create($request)
    {
        $user_id = session()->pull('user_id');
        $address = new Addressbook;
        $form = [
          'zip' => $request->zip,
          'prefecture_id' => $request->prefecture_id,
          'city' => $request->city,
          'address' => $request->address,
          'user_id' => $user_id,
        ];
        $address->fill($form)->save();
    }

    public function edit($request)
    {
        $address_id = get_salted_id($request, 'address_id');
        $form = Addressbook::find($address_id);
        $prefectures = prefecture::get();
        $param = ['form' => $form, 'prefectures' => $prefectures];
        return $param;
    }

    public function update($request)
    {
        $addressbook_id = session()->pull('addressbook_id');
        $address = Addressbook::find($addressbook_id);
        $form = $request->all();
        $address->fill($form)->save();
    }

    public function delete($request)
    {
        $address_id = get_salted_id($request, 'address_id');
        $form = Addressbook::find($address_id);
        $prefectures = prefecture::get();
        $param = ['form' => $form, 'prefectures' => $prefectures];
        return $param;
    }

    public function remove()
    {
        $addressbook_id = session()->pull('addressbook_id');
        Addressbook::find($addressbook_id)->delete();
    }

    // 注意!:バグがある
    public function defaultCreate($request)
    {
        $user = Auth::user();
        $addressbook_id = get_salted_id($request, 'addressbook_id');
        Useraddress::where('user_id', $user->id)->delete();

        $default_address = new Useraddress;
        $form = [
          'addressbook_id' => $addressbook_id,
          'user_id' => $user->id,
          'created_at' => now(),
        ];
        $default_address->fill($form)->save();
    }
}
