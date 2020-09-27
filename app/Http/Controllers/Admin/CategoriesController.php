<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('admin.categories.list',compact('categories'))->with([
            'panel_title' => 'Categories List',
            'panel_icon' => 'fad fa-layer-group'
        ]);
    }

    public function create()
    {
        return view('admin.categories.create')->with([
            'panel_title' => 'Create Package',
            'panel_icon' => 'fad fa-layer-plus'
        ]);
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $category = Category::create([
            'title' => request()->input('title')
        ]);
        if ($category && $category instanceof Category){
            return redirect()->route('admin.categories.list')->with([
                'success' => true,
                'message' => 'Category (' . $category->title . ') Successfully Created.'
            ]);
        }
        return redirect()->route('admin.categories.list')->with([
            'error' => true,
            'message' => 'Error While Creating Category. Please try again.'
        ]);
    }

    public function edit($category_id)
    {
        $category = Category::find(intval($category_id));
        if ($category && $category instanceof Category){
            return view('admin.categories.edit',compact('category'))->with([
                'panel_title' => 'Edit Category',
                'panel_icon' => 'fad fa-edit'
            ]);
        }
        return redirect()->route('admin.categories.list')->with([
            'error' => true,
            'message' => 'Category with id (' . $category_id . ') not found.'
        ]);
    }

    public function update(CategoryRequest $categoryRequest,$category_id)
    {
        $category = Category::find(intval($category_id));
        $data = ['title' => request()->input('title')];
        if ($category && $category instanceof Category){
            $category->update($data);
            return redirect()->route('admin.categories.list')->with([
                'success' => true,
                'message' => 'Category (' . $data['title'] . ') Successfully Updated.'
            ]);
        }
        return redirect()->route('admin.categories.list')->with([
            'error' => true,
            'message' => 'Category with id (' . $category_id . ') does not exists.'
        ]);
    }

    public function delete($category_id)
    {
        $category = Category::find(intval($category_id));
        if ($category && $category instanceof Category){
            $category->delete();
            return redirect()->route('admin.categories.list')->with([
                'success' => true,
                'message' => 'Category (' . $category->title . ') Successfully Deleted.'
            ]);
        }
        return redirect()->route('admin.categories.list')->with([
            'error' => true,
            'message' => 'Category with id (' . $category_id . ') does not exists.'
        ]);
    }
}
