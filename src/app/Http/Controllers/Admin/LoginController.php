<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login()
    {
        request()->session()->flush();
        request()->session()->regenerateToken();
        return view('admin.login');
    }
}
