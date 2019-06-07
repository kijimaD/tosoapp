<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function assessmentdetails()
    {
        return $this->hasmany('App\Assessmentdetail');
    }

    public function assessmentdone()
    {
        return $this->hasone('App\Assessmentdone');
    }

    public function sumPrice()
    {
        $sum = DB::table('assessmentdetails')
        ->where('assessment_id', $this->id)
        ->join('goods', 'goods.id', '=', 'assessmentdetails.goods_id')
        ->sum('get_price');

        return $sum;
    }
}
