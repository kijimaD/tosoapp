<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\PaymentdoneService;

class PaymentdoneController extends Controller
{
    protected $service;
    public function __construct(PaymentdoneService $service)
    {
        $this->service = $service;
    }

    public function admin_index(Request $request)
    {
        return view('paymentdone.admin_index', $this->service->admin_index());
    }

    public function create(Request $request)
    {
        $this->service->create();
        return redirect('paymentdone/admin_index');
    }
}
