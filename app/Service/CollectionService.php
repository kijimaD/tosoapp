<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use App\Entry;
use App\Applydone;

class CollectionService
{
    public function admin_index()
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return $param;
    }

    public function applydone_create($request)
    {
        $entry_id = session()->pull('entry_id');
        $applydone = new Applydone;
        $applydone->fill([
          'entry_id' => $entry_id
          ])
        ->save();
    }
}
