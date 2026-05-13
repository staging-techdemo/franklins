<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Fetch latest published blogs for home slider
        $blogs = Blog::with(['category', 'user'])
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        // Fetch active services for home section (left column, max 3)
        $services = Service::where('status', 'active')
            ->orderBy('created_at', 'asc')
            ->take(6)
            ->get();

        return view('frontend.home.index', compact('blogs', 'services'));
    }
}
