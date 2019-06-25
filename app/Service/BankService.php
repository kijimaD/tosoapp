<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use App\Bank;
use App\DefaultBank;

class BankService
{
    public function index()
    {
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

    // 不安: editとdeleteはまったく同じなので共用している(いいのか？)
    public function edit($request)
    {
        $bank_id = \Crypt::decrypt($request->id);
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

    // memo: 未使用(editを使っている)
    public function delete($request)
    {
        $bank_id = \Crypt::decrypt($request->id);
        $form = Bank::find($bank_id);
        $param = ['form' => $form];
        return $param;
    }

    public function remove()
    {
        $bank_id = session()->pull('id');
        Bank::find($bank_id)->delete();
    }

    // 要注意: バグがある！
    public function defaultCreate()
    {
        $bank_id = session()->pull('bank_id');
        $user_id = session()->pull('user_id');
        Defaultbank::where('user_id', $user_id)->delete();

        $default_bank = new Defaultbank;
        $form = [
          'bank_id' => $bank_id,
          'user_id' => $user_id,
          'created_at' => now(),
        ];
        $default_bank->fill($form)->save();
    }
}
