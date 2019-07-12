<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEntryRequest;
use App\Service\EntryService;

class EntryController extends Controller
{
    protected $service;
    public function __construct(EntryService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return view('entry.index', $this->service->index());
    }

    public function admin_index(Request $request)
    {
        return view('entry.admin_index', $this->service->admin_index());
    }

    public function add(Request $request)
    {
        return view('entry.add', $this->service->add());
    }

    public function create(CreateEntryRequest $request)
    {
        $this->service->create($request);
        return redirect('/entry');
    }

    public function edit(Request $request)
    {
        return view('entry.edit', $this->service->edit($request));
    }

    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect('/entry');
    }

    public function delete(Request $request)
    {
        return view('entry/del', $this->service->delete($request));
    }

    public function remove(Request $request)
    {
        $this->service->remove();
        return redirect('/entry');
    }

    public function unify(Request $request)
    {
        return view('entry.unify', $this->service->unify());
    }
}
