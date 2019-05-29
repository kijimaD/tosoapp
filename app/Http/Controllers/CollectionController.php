<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Entry;
use App\Applydone;

class CollectionController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return view('collection.admin_index', $param);
    }

    public function applydone_create(Request $request)
    {
        $applydone = new Applydone;
        $form = $request->all();
        $applydone->fill($form)->save();
        return redirect('collection/admin_index');
    }
}
