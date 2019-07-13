<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function defaultbank()
    {
        return $this->hasone('App\Defaultbank');
    }
}
