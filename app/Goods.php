<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public function title()
    {
        return $this->belongsTo('App\Title')->withDefault();
    }
}
