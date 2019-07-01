<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\ReceiptService;
use App\Receipt;
use App\Assessmentdetail;
use App\Entry;

class ReceiptController extends Controller
{
    protected $service;

    public function __construct(ReceiptService $service)
    {
        $this->service = $service;
    }

    public function admin_index(Request $request)
    {
        return view('receipt.admin_index', $this->service->admin_index());
    }

    public function add(Request $request)
    {
        return view('receipt.add', $this->service->add($request));
    }

    public function create(Request $request)
    {
        $this->service->create($request);
        return redirect('receipt/admin_index');
    }

    // 要追加:個別editやdeleteを実装する
    public function edit(Request $request)
    {
        return view('receipt.edit', $this->service->edit($request));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect('receipt/admin_index');
    }
}
