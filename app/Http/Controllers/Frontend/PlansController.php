<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Plan;
use App\Http\Controllers\Controller;
use App\Model\Subscribe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class PlansController extends Controller
{
    public function list()
    {
        $plans = Plan::all();
        return view('front.plans.index', compact('plans'));
    }

    public function single($plan_id)
    {
        $plan = Plan::find($plan_id);
        if ($plan && $plan instanceof Plan)
            return view('front.plans.single', compact('plan'));

        return redirect()->back();
    }

    public function subscribe(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        if (!$plan) {
            return redirect()->back();
        }

        $subscribeData = [
            'user_id' => Auth::user()->id,
            'plan_id' => $plan_id,
            'download_limit' => $plan->download_limit,
            'expires_at' => Carbon::now()->addDays($plan->days_count),
        ];
        $subscribe = Subscribe::create($subscribeData);
        if ($subscribe && $subscribe instanceof Subscribe)
            return redirect()->route('front.home')->with([
                'success' => true,
                'message' => "You Subscribed Plan ({$plan->title}) Successfully."
            ]);

        return redirect()->route('front.home')->with([
            'error' => true,
            'message' => "Error While Subscribing Plan ({$plan->title})."
        ]);
    }
}
