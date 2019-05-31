<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;
use App\Assessmentdetail;

class AssessmentdetailController extends Controller
{
    public function admin_index(Request $request)
    {
        $items = assessmentdetail::get();
        $param = ['items' => $items];
        return view('assessmentdetail.admin_index', $param);
    }

    public function edit(Request $request)
    {
        $items = Assessmentdetail::where('assessment_id', $request->id)->get();
        $param = ['items' => $items];
        return view('assessmentdetail.edit', $param);
    }
}
