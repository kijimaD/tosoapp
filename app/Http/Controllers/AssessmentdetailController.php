<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Assessment;

class AssessmentdetailController extends Controller
{
    public function edit(Request $request)
    {
        $assessment = Assessment::find($request->id);
        $param = ['assessment' => $assessment];
        return view('assessmentdetail.edit', $param);
    }
}
