<?php

namespace App\Http\Controllers\Web\Front\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function show()
    {
    	return view('home');
    }
}
