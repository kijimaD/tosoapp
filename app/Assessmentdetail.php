<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessmentdetail extends Model
{
    public function assessment()
    {
        return $this->belongsTo('App\Assessment');
    }

    public function goods()
    {
        return $this->belongsTo('App\Goods')->withDefault();
    }

    public function approvegoods()
    {
        return $this->hasone('App\Approvegoods')->withDefault();
    }

    public function resendgoods()
    {
        return $this->hasone('App\Resendgoods')->withDefault();
    }
}
