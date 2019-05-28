<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applygoods extends Model
{
    public function collection()
    {
        return $this->hasone('App\Collection')->withDefault();
    }
}
