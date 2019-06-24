<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\AssessmentdetailService;
use App\Assessment;
use App\Assessmentdetail;
use App\Condition;

class AssessmentdetailController extends Controller
{
    protected $service;

    public function __construct(AssessmentdetailService $service)
    {
        $this->service = $service;
    }

    public function admin_index(Request $request)
    {
        $items = Assessmentdetail::get();
        $param = ['items' => $items];
        return view('assessmentdetail.admin_index', $param);
    }

    public function edit(Request $request)
    {
        return view('assessmentdetail.edit', $this->service->edit($request));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect('/assessment/admin_index');
    }

    public function delete(Request $request)
    {
        $assessmentdetail_id = \Crypt::decrypt($request->id);
        $form = Assessmentdetail::find($assessmentdetail_id);
        return view('assessmentdetail/del')->with('item', $form);
    }

    public function remove(Request $request)
    {
        $assessmentdetail_id = session()->pull('assessmentdetail_id');
        Assessmentdetail::find($assessmentdetail_id)->delete();
        return redirect('/assessmentdetail/admin_index');
    }
}
