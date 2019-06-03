<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return view('test.index');
    }
    public function index0(Request $request)
    {
        $search_amazon = new \App\lib\Amazonfunctions;
        list($title, $usedprice) = $search_amazon -> searchIsbn(9784798052588);
        return view('test.index0')->with($title);
    }
}
