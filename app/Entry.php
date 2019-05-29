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

    public function assessment()
    {
        return $this->hasone('App\Assessment')->withDefault();
    }

    // フラグ系

    public function applydone()
    {
        return $this->hasone('App\Applydone')->withDefault();
    }

    public function approvedone()
    {
        return $this->hasone('App\Approvedone')->withDefault();
    }

    public function cancel()
    {
        return $this->hasone('App\Cancel')->withDefault();
    }

    public function paymentdone()
    {
        return $this->hasone('App\Paymentdone')->withDefault();
    }
}
