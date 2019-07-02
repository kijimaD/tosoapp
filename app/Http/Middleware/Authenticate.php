<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // 遷移前の、直前にクリックしたURLはどうやって保存する？
            // Session::put('intended', URL::full());
            // session()->put(['intended'=>url()->previous()]);
            return route('login');
        }
    }
}
