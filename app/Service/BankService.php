<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use App\Bank;
use App\DefaultBank;

class BankService
{
    public function admin_index(Request $request)
    {
    }

    public function index()
    {
        session()->forget('origin');
        $user = Auth::user();
        $items = Bank::where('user_id', 'like', $user["id"])->get();
        $param = ['items' => $items, 'user' => $user];
        return $param;
    }

    public function add()
    {
        $param = ['user' => Auth::user()];
        return $param;
    }

    public function create($request)
    {
        $user_id = session()->pull('user_id');

        $form = $request->all(); // 入れる値の準備
        $form += array('user_id'=>$user_id);

        $bank = new Bank; // 入れる先の準備
        $bank->fill($form)->save();
    }

    public function edit($request)
    {
        $bank_id = get_salted_id($request, 'bank_id');
        $form = Bank::find($bank_id);
        $param = ['form' => $form];
        return $param;
    }

    public function update($request)
    {
        $form = $request->all();
        $bank = Bank::find(session()->pull('id'));
        $bank->fill($form)->save();
    }

    public function delete($request)
    {
        $bank_id = get_salted_id($request, 'bank_id');
        $form = Bank::find($bank_id);
        $param = ['form' => $form];
        return $param;
    }

    public function remove()
    {
        $bank_id = session()->pull('id');
        Bank::find($bank_id)->delete();
    }

    public function defaultCreate($request)
    {
        $user = Auth::user();
        $bank_id = get_salted_id($request, 'bank_id');
        Defaultbank::where('user_id', $user->id)->delete();

        $default_bank = new Defaultbank;
        $form = [
          'bank_id' => $bank_id,
          'user_id' => $user->id,
          'created_at' => now(),
        ];
        $default_bank->fill($form)->save();
    }
}
