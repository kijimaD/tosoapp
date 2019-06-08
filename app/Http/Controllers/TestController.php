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

        //     $b_items = array(
        //     '9784274065972',
        //     '9784839928407',
        //     '9784478490273',
        //     '0012417437',
        //     '9784820116226'
        // );
        //     foreach ($b_items as $item) {
        //         searchIsbn($item);
        //         sleep(1);
        //     }
        $isbns = [
          '9784274065972',
          '9784839928407',
        ];

        foreach ($isbns as $isbn) {
            $titles[] = $search_amazon -> searchIsbn($isbn);
            sleep(1);
        };
        $param = ['titles' => $titles];
        return view('test.index0', $param);
        // return view('test.index0');
    }
}
