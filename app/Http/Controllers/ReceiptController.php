<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Receipt;
use App\Approvegoods;

class ReceiptController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Receipt::get();
        $param = ['items' => $items];
        return view('receipt.admin_index', $param);
    }

    public function add(Request $request)
    {
        $items = ApproveGoods::get();
        $param = ['items' => $items];
        return view('receipt.add', $param);
    }
}
