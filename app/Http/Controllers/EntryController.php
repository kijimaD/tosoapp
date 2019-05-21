<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Entry::where('user_id', 'like', $user['id'])->get();
        $param = ['items' => $items, 'user' => $user];
        return view('entry.index', $param);
    }
}
