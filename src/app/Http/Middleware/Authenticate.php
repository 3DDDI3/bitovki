<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $route = Route::currentRouteName(); //текущий мартрут

        if (! $request->expectsJson()) {
            if (preg_match('/pa/', $route))
                return route('index');
            switch ($route) {
                case 'profile':
                    return route('main', ['login' => 1]);
                    break;
                default:
                    // $request->session()->flush();
                    return route('admin.login');
                    break;
            }
        }
    }
}
