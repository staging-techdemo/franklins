<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function privacy()
    {
        return view('frontend.pages.privacy');
    }

    public function terms()
    {
        return view('frontend.pages.terms');
    }
}
