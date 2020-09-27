<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PlanRequest;
use App\Model\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlansController extends Controller
{
    public function list()
    {
        $plans = Plan::all();
        return view('admin.plans.list',compact('plans'))->with([
            'panel_title' => 'Plans List',
            'panel_icon' => 'fad fa-cubes'
        ]);
    }

    public function create()
    {
        return view('admin.plans.create')->with([
           'panel_title' => 'Create Plan',
           'panel_icon' => 'fad fa-cube'
        ]);
    }

    public function store(PlanRequest $planRequest)
    {
        $data = array_intersect_key(request()->all(), array_flip(['title','download_limit','price','days_count']));
        $plan = Plan::create($data);
        if ($plan && $plan instanceof Plan){
            return redirect()->route('admin.plans.list')->with([
                'success' => true,
                'message' => 'Plan (' . $data['title'] . ') Successfully Created.'
            ]);
        }
        return redirect()->route('admin.plans.list')->with([
            'error' => true,
            'message' => 'Error While Creating Plan. Please try again.'
        ]);
    }

    public function edit($plan_id)
    {
        $plan = Plan::find(intval($plan_id));
        if ($plan && $plan instanceof Plan){
            return view('admin.plans.edit',compact('plan'))->with([
                'panel_title' => 'Plan Edit',
                'panel_icon' => 'fad fa-edit'
            ]);
        }
        return redirect()->route('admin.plans.list')->with([
            'error' => true,
            'message' => 'Plan with id (' . $plan_id . ') not found.'
        ]);
    }

    public function update(PlanRequest $planRequest,$plan_id)
    {
        $plan = Plan::find(intval($plan_id));
        $data = array_intersect_key(request()->all(), array_flip(['title','download_limit','price','days_count']));
        if ($plan && $plan instanceof Plan){
            $plan->update($data);
            return redirect()->route('admin.plans.list')->with([
                'success' => true,
                'message' => 'Plan (' . $data['title'] . ') Successfully Updated.'
            ]);
        }
        return redirect()->route('admin.plans.list')->with([
            'error' => true,
            'message' => 'Plan with id (' . $plan_id . ') does not exists.'
        ]);
    }

    public function delete($plan_id)
    {
        $plan = Plan::find(intval($plan_id));
        if ($plan && $plan instanceof Plan){
            $plan->delete();
            return redirect()->route('admin.plans.list')->with([
                'success' => true,
                'message' => 'Plan (' . $plan->title . ') Successfully Deleted.'
            ]);
        }
        return redirect()->route('admin.plans.list')->with([
            'error' => true,
            'message' => 'Plan with id (' . $plan_id . ') does not exists.'
        ]);
    }
}
