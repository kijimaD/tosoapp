<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $items = User::get();
        return view('user.index')->with('items', $items);
    }
    public function add(Request $request)
    {
        return view('user.add');
    }
    public function create(Request $request)
    {
        $user = new User;
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/user');
    }
}
