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
}
