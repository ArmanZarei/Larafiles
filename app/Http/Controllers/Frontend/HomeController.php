<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use App\Model\File;
use App\Model\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $files = File::take(10)->get();
        $packages = Package::take(10)->get();
        $categories = Category::all();
        $popularFiles = File::orderBy('download_count', 'DESC')->take(5)->get();
        return view('front.home.index', compact('files', 'packages', 'categories', 'popularFiles'));
    }
}
