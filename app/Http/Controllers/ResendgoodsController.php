<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Resendgoods;
use App\Resenddonegoods;

class ResendgoodsController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Resendgoods::get();
        $param = ['items' => $items];
        return view('resend.admin_index', $param);
    }

    public function resenddonegoods_create(Request $request)
    {
        $resenddonegoods = new Resenddonegoods;
        $form = $request->all();
        $resenddonegoods->fill($form)->save();
        return redirect('resend/admin_index');
    }
}
