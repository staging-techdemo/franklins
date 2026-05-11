<?php

namespace App\Http\Controllers\frontend;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
   public function index(): View
   {
      return view('frontend.blogs.index');
   }
}
