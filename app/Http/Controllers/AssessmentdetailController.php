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
        return view('assessmentdetail.admin_index', $this->service->admin_index($request));
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
        return view('assessmentdetail/del', $this->service->delete($request));
    }

    public function remove(Request $request)
    {
        $this->service->remove();
        return redirect('/assessment/admin_index');
    }
}
