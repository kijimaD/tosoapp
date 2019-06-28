<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\ApproveService;
use App\Assessment;
use App\Assessmentdetail;
use App\Condition;

class ApproveController extends Controller
{
    protected $service;

    public function __construct(ApproveService $service)
    {
        $this->service = $service;
    }

    public function add(Request $request)
    {
        return view('approve.add', $this->service->add($request));
    }

    public function create(Request $request)
    {
        $this->service->create($request);
        return redirect('/entry');
    }
}
