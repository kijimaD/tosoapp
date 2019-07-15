<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function SendApproveDone_admin($user_name)
    {
        $this->notify(new \App\Notifications\SendApproveDone_admin($user_name));
    }

    public function SendEntry_admin($user_name)
    {
        $this->notify(new \App\Notifications\SendEntry_admin($user_name));
    }
}
