<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function addressbook()
    {
        return $this->belongsTo('App\Addressbook');
    }
}
