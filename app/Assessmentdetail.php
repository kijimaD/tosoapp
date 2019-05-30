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
}
