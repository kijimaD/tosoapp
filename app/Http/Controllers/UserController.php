<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインしてください。'];
        return view('user.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
      'password' => $password])) {
            $msg = 'ログインしました。(' . Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('user.auth', ['message' => $msg]);
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        return view('info.top');
    }

    public function mypage(Request $request)
    {
        return view('user.mypage');
    }
}
