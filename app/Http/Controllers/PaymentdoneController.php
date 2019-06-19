<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Entry;
use App\Paymentdone;

class PaymentdoneController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return view('paymentdone.admin_index', $param);
    }

    public function create(Request $request)
    {
        $entry_id = session()->pull('entry_id');
        $paymentdones = new Paymentdone;
        $form = [
          'entry_id' => $entry_id,
        ];
        $paymentdones->fill($form)->save();
        return redirect('paymentdone/admin_index');
    }
}
