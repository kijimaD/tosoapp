<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\AssessmentService;
use App\Assessment;
use App\Coupen;
use App\Shippingcost;
use App\Title;
use App\Goods;
use App\Assessmentdone;

class AssessmentController extends Controller
{
    protected $service;

    public function __construct(AssessmentService $service)
    {
        $this->service = $service;
    }

    public function admin_index(Request $request)
    {
        $items = Assessment::get();
        $param = ['items' => $items];
        return view('assessment.admin_index', $param);
    }

    public function add(Request $request)
    {
        return view('assessment.add', $this->service->add($request));
    }

    public function create(Request $request)
    {
        $this->service->create($request);
        return redirect('/assessment/admin_index');
    }

    public function edit(Request $request)
    {
        return view('assessment.edit', $this->service->edit($request));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect('/assessment/admin_index');
    }

    public function delete(Request $request)
    {
        $assessment_id = \Crypt::decrypt($request->id);
        $form = Assessment::find($assessment_id);
        return view('assessment/del')->with('form', $form);
    }

    public function remove(Request $request)
    {
        $assessment_id = session()->pull('assessment_id');
        Assessment::find($assessment_id)->delete();
        return redirect('/assessment/admin_index');
    }

    public function assessmentdone_create(Request $request)
    {
        $assessmentdone = new Assessmentdone;
        $form = $request->all();
        $assessmentdone->fill($form)->save();
        return redirect('assessment/admin_index');
    }
}
