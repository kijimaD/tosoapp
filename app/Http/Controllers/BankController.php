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
        $bank = Bank::find($request->id);
        $param = ['form' => $bank];
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
        $form = Bank::find($request->id);
        return view('/bank/del')->with('form', $form);
    }

    public function remove(Request $request)
    {
        Bank::find($request->id)->delete();
        return redirect('/bank');
    }

    public function defaultCreate(Request $request)
    {
        Defaultbank::where('user_id', $request->user_id)->delete();

        $default_bank = new Defaultbank;
        $form = $request->all();
        unset($form['_token']);
        $default_bank->fill($form)->save();
        return redirect('/bank');
    }
}
