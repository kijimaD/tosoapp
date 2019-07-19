<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function top(Request $request)
    {
        return view('info.top');
    }

    public function flow(Request $request)
    {
        return view('info.flow');
    }

    public function flow1(Request $request)
    {
        return view('info.flow1');
    }

    public function flow2(Request $request)
    {
        return view('info.flow2');
    }

    public function flow3(Request $request)
    {
        return view('info.flow3');
    }

    public function flow4(Request $request)
    {
        return view('info.flow4');
    }

    public function privacy_policy(Request $request)
    {
        return view('info.privacy_policy');
    }

    public function law_display(Request $request)
    {
        return view('info.law_display');
    }
}
