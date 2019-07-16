<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defaultbank extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
}
