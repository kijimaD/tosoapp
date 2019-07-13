<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBankRequest;
use App\Service\BankService;
use App\Bank;
use App\Defaultbank;

class BankController extends Controller
{
    protected $service;

    public function __construct(BankService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return view('bank.index', $this->service->index());
    }

    public function add(Request $request)
    {
        return view('bank.add', $this->service->add());
    }

    public function create(CreateBankRequest $request)
    {
        $this->service->create($request);
        if ($request->session()->pull('origin') == 'entry') {
            return redirect('/entry/add');
        } else {
            return redirect('/bank');
        }
    }

    public function edit(Request $request)
    {
        return view('bank.edit', $this->service->edit($request));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect('/bank');
    }

    public function delete(Request $request)
    {
        return view('/bank/del', $this->service->delete($request));
    }

    public function remove(Request $request)
    {
        $this->service->remove();
        return redirect('/bank');
    }

    public function defaultCreate(Request $request)
    {
        $this->service->defaultCreate($request);
        return redirect('/bank');
    }
}
