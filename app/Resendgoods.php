<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resendgoods extends Model
{
    public function resenddonegoods()
    {
        return $this->hasone('App\Resenddonegoods')->withDefault();
    }
    public function assessmentdetail()
    {
        return $this->belongsTo('App\Assessmentdetail');
    }
}
