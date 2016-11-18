<?php

namespace App\Http\Controllers\Web\Front\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    }

    public function logout()
    {
    	auth()->logout();

    	return reditect()->route('home');
    }
}
