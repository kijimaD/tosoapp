<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Hash;
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
    public function create(AddUserRequest $request)
    {
        User::create([
          'family_name' => $request['family_name'],
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => Hash::make($request['password']),
]);
        return redirect('/user');
    }
}
