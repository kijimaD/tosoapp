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
        $paymentdones = new Paymentdone;
        $form = $request->all();
        $paymentdones->fill($form)->save();
        return redirect('paymentdone/admin_index');
    }
}
