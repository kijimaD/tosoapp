<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approvegoods extends Model
{
    public function receipt()
    {
        return $this->hasone('App\Receipt');
    }

    public function assessmentdetail()
    {
        return $this->belongsTo('App\Assessmentdetail');
    }
}
