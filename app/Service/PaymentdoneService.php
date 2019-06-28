<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Crypt;
use App\Entry;
use App\Paymentdone;

class PaymentdoneService
{
    public function admin_index()
    {
        $items = Entry::get();
        $param = ['items' => $items];
        return $param;
    }

    public function create()
    {
        $entry_id = session()->pull('entry_id');
        $paymentdones = new Paymentdone;
        $paymentdones->fill([
          'entry_id' => $entry_id,
          ])->save();
    }
}
