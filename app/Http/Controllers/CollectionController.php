<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\CollectionService;
use App\Entry;

class CollectionController extends Controller
{
    protected $service;
    public function __construct(CollectionService $service)
    {
        $this->service = $service;
    }

    public function admin_index(Request $request)
    {
        return view('collection.admin_index', $this->service->admin_index());
    }

    public function applydone_create(Request $request)
    {
        $this->service->applydone_create($request);
        return redirect('collection/admin_index');
    }
}
