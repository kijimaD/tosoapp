<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentbank extends Model
{
    public function bank()
    {
        return $this->belongsTo('App\Bank')->withDefault();
    }
}
