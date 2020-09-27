<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PackageRequest;
use App\Model\Category;
use App\Model\File;
use App\Model\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    public function list()
    {
        $packages = Package::all();
        return view('admin.packages.list',compact('packages'))->with([
            'panel_title' => 'Packages List',
            'panel_icon' => 'fad fa-archive'
        ]);
    }

    public function create()
    {
        $files = File::all();
        $categories = Category::all();
        return view('admin.packages.create',compact('files','categories'))->with([
            'panel_title' => 'Create Package',
            'panel_icon' => 'fad fa-plus-circle'
        ]);
    }

    public function store(PackageRequest $packageRequest)
    {
        $data = array_intersect_key(request()->all(), array_flip(['title','price']));
        $package = Package::create($data);
        if ($package && $package instanceof Package){
            $files = request()->input('files');
            if ($files){
                $package->files()->sync($files);
            }
            $categories = request()->input('categories');
            if ($categories){
                $package->categories()->sync($categories);
            }

            return redirect()->route('admin.packages.list')->with([
                'success' => true,
                'message' => 'Package (' . $data['title'] . ') Successfully Created.'
            ]);
        }
        return redirect()->route('admin.packages.list')->with([
            'error' => true,
            'message' => 'Error While Creating Package. Please try again.'
        ]);
    }

    public function edit($package_id)
    {
        $package = Package::find(intval($package_id));
        if ($package && $package instanceof Package){
            $files = File::all();
            $package_files = $package->files()->get()->pluck('id')->toArray();
            $categories = Category::all();
            $package_categories = $package->categories()->get()->pluck('id')->toArray();
            return view('admin.packages.edit',compact(
                'package','files','package_files','categories','package_categories'
            ))->with([
                'panel_title' => 'Package Edit',
                'panel_icon' => 'fad fa-edit'
            ]);
        }
        return redirect()->route('admin.packages.list')->with([
            'error' => true,
            'message' => 'Package with id (' . $package_id . ') not found.'
        ]);
    }

    public function update(PackageRequest $packageRequest,$package_id)
    {
        $package = Package::find(intval($package_id));
        $data = array_intersect_key(request()->all(), array_flip(['title','price']));
        if ($package && $package instanceof Package){
            $package->update($data);

            $files = request()->input('files') ?? [];
            $package->files()->sync($files);

            $categories = request()->input('categories') ?? [];
            $package->categories()->sync($categories);

            return redirect()->route('admin.packages.list')->with([
                'success' => true,
                'message' => 'Package (' . $data['title'] . ') Successfully Updated.'
            ]);
        }
        return redirect()->route('admin.packages.list')->with([
            'error' => true,
            'message' => 'Package with id (' . $package_id . ') does not exists.'
        ]);
    }

    public function delete($package_id)
    {
        $package = Package::find(intval($package_id));
        if ($package && $package instanceof Package){
            $package->delete();
            return redirect()->route('admin.packages.list')->with([
                'success' => true,
                'message' => 'Package (' . $package->title . ') Successfully Deleted.'
            ]);
        }
        return redirect()->route('admin.packages.list')->with([
            'error' => true,
            'message' => 'Package with id (' . $package_id . ') does not exists.'
        ]);
    }
}
