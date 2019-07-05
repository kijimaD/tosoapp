<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\AddressbookService;
use App\UserAddress;

class AddressBookController extends Controller
{
    protected $service;

    public function __construct(AddressbookService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return view('address.index', $this->service->index());
    }

    public function add(Request $request)
    {
        return view('address.add', $this->service->add());
    }

    public function create(Request $request)
    {
        $this->service->create($request);
        if ($request->f_entry == '1') {
            return view('entry.add', $this->service->add());
        } else {
            return redirect('/address');
        }
    }

    public function edit(Request $request)
    {
        return view('address.edit', $this->service->edit($request));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect('/address');
    }

    public function delete(Request $request)
    {
        return view('/address/del', $this->service->delete($request));
    }

    public function remove(Request $request)
    {
        $this->service->remove();
        return redirect('/address');
    }

    public function defaultCreate(Request $request)
    {
        $this->service->defaultCreate($request);
        return redirect('/address');
    }
}
