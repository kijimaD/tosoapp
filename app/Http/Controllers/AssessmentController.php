<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;

class AssessmentController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = Assessment::get();
        $param = ['items' => $items];
        return view('assessment.admin_index', $param);
    }

    public function add(Request $request)
    {
        $items = Assessment::get();
        $param = ['items' => $items];
        return view('assessment.add', $param);
    }
}
