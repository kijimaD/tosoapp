<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $guarded = array('id');

    public function entry()
    {
        return $this->belongsTo('App\Entry');
    }

    public function shippingcost()
    {
        return $this->belongsTo('App\Shippingcost');
    }

    public function coupen()
    {
        return $this->belongsTo('App\Coupen');
    }

    public function assessmentdetail()
    {
        return $this->hasmany('App\Assessmentdetail');
    }
}
