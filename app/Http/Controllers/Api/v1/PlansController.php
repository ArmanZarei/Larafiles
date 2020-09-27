<?php

namespace App\Http\Controllers\Api\v1;

use App\Model\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return response()->json($plans);
    }
}
