<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storagestructure extends Model
{
    protected $guarded = array('id');
      
    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse');
    }
    public function rack()
    {
        return $this->belongsTo('App\Rack');
    }
    public function stage()
    {
        return $this->belongsTo('App\Stage');
    }
}
