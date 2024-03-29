<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function addressbook()
    {
        return $this->belongsTo('App\Addressbook')->withDefault();
    }
}
