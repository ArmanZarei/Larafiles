<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function single($category_id)
    {
        $category = Category::find($category_id);

        if (!$category) {
            return redirect()->back();
        }

        $files = $category->files;
        $packages = $category->packages;
        return view('front.categories.single', compact('category', 'files', 'packages'));
    }
}
