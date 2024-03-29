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
        return view('assessment/del')->with('form', $this->service->delete($request));
    }

    public function remove(Request $request)
    {
        $this->service->remove();
        return redirect('/assessment/admin_index');
    }

    public function assessmentdone_create(Request $request)
    {
        $this->service->done_create($request);
        return redirect('assessment/admin_index');
    }
}
