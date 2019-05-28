<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function paymentway()
    {
        return $this->belongsTo('App\Paymentway');
    }

    public function shippingway()
    {
        return $this->belongsTo('App\Shippingway');
    }

    public function paymentbank()
    {
        return $this->hasone('App\Paymentbank')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function applygoods()
    {
        return $this->hasone('App\Applygoods')->withDefault();
    }
}
