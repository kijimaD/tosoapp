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

    public function create(Request $request)
    {
        $resendgoods_id = session()->pull('resendgoods_id');
        $resenddonegoods = new Resenddonegoods;
        $form = [
          'resendgoods_id' => $resendgoods_id,
        ];
        $resenddonegoods->fill($form)->save();
        return redirect('resend/admin_index');
    }
}
