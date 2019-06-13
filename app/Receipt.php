<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $guarded = array('id');

    public function goods()
    {
        return $this->belongsTo('App\Goods');
    }

    public function approvegoods()
    {
        return $this->belongsTo('App\Approvegoods');
    }

    public function storagestructure()
    {
        return $this->belongsTo('App\Storagestructure');
    }
}
