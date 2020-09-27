<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    public function details($package_id)
    {
        $package = Package::find($package_id);
        $package_files = $package->files;
        if ($package && $package instanceof Package) {
            return view('front.packages.index', compact('package', 'package_files'));
        }

        return redirect()->route('front.home');
    }
}
