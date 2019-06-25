<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $guarded = array('id');
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function SendAssessmentDone($user_name) //送信テスト。
    {
        $this->notify(new \App\Notifications\SendAssessmentDone($user_name));
        // notifyメソッドは通知インスタンスを受け取る
        // クラスごとに違う送信をする感じか。
        // $thisからnotifyで通じるのは継承しているから？
    }
}
