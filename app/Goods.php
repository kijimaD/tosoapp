<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $guarded = array('id');

    public function title()
    {
        return $this->belongsTo('App\Title')->withDefault();
    }

    public function condition()
    {
        return $this->belongsTo('App\Condition');
    }
}
