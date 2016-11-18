<?php

namespace App\Http\Controllers\Web\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
    	return view('back.site.dashboard');
    }
}
