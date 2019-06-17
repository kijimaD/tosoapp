<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bank;
use App\Defaultbank;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Bank::where('user_id', 'like', $user["id"])->get();
        $param = ['items' => $items, 'user' => $user];
        return view('bank.index', $param);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $param = ['user' => $user];
        return view('bank.add', $param);
    }

    public function create(Request $request)
    {
        $bank = new Bank;
        $form = $request->all();
        unset($form['_token']);
        $bank->fill($form)->save();
        return redirect('/bank');
    }

    public function edit(Request $request)
    {
        $bank_id = \Crypt::decrypt($request->id);
        $form = Bank::find($bank_id);
        $param = ['form' => $form];
        return view('bank.edit', $param);
    }

    public function update(Request $request)
    {
        $bank = Bank::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $bank->fill($form)->save();
        return redirect('/bank');
    }

    public function delete(Request $request)
    {
        $bank_id = \Crypt::decrypt($request->id);
        $form = Bank::find($bank_id);
        return view('/bank/del')->with('form', $form);
    }

    public function remove(Request $request)
    {
        Bank::find($request->id)->delete();
        return redirect('/bank');
    }

    public function defaultCreate(Request $request)
    {
        $bank_id = session()->pull('bank_id');
        debug($bank_id);
        $user_id = session()->pull('user_id');
        Defaultbank::where('user_id', $user_id)->delete();

        $default_bank = new Defaultbank;
        $form = [
          'bank_id' => $bank_id,
          'user_id' => $user_id,
          'created_at' => now(),
        ];
        $default_bank->fill($form)->save();
        return redirect('/bank');
    }
}
