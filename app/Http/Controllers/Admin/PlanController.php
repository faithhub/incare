<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->create_plan = new Plan();
    }

    public function index()
    {
        $data['title'] = 'Plans';
        $data['plans'] = Plan::all();
        return view('admin.plans.index', $data);
    }

    public function edit_plan(Request $request)
    {
        $rules = array(
            'plan_name' => ['required', 'max:255'],
            'plan_type' => ['required', 'max:255'],
            'plan_amount' => ['required', 'max:255'],
        );

        $fieldNames = array(
            'plan_name'    => 'Plan Name',
            'plan_type'    => 'Plan Type',
            'plan_amount'  => 'Plan Amount',
        );

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {
            try {
                if ($request->plan_type == 'Monthly') {
                    $month = 1;
                } elseif ($request->plan_type == 'Quarterly') {
                    $month = 3;
                } elseif ($request->plan_type == 'Annually') {
                    $month = 12;
                }
                $plan = Plan::find($request->id);
                $plan->plan_name   = $request->plan_name;
                $plan->plan_type   = $request->plan_type;
                $plan->plan_amount = $request->plan_amount;
                $plan->plan_month  = $month;
                $plan->save();
                Session::flash('success', 'Plan Successfully Updated');
                return redirect('admin/plans');
            } catch (\Throwable $th) {
                Session::flash('error', 'Please Try again!');
                return back()->withErrors($validator)->withInput();
            }
        }
    }

    public function edit_plan_now($id)
    {
        $data['title'] = 'Plans';
        $data['plan'] = Plan::find($id);
        $data['mode'] = 'Edit';
        return view('admin.plans.new_plan', $data);
    }

    public function new_plan()
    {
        $data['title'] = 'Create New Plan';
        $data['mode'] = 'New';
        return view('admin.plans.new_plan', $data);
    }

    public function create_new_plan(Request $request)
    {
        //dd($request->all());

        $rules = array(
            'plan_name' => ['required', 'max:255'],
            'plan_type' => ['required', 'max:255'],
            'plan_amount' => ['required', 'max:255'],
        );

        $fieldNames = array(
            'plan_name'    => 'Plan Name',
            'plan_type'    => 'Plan Type',
            'plan_amount'  => 'Plan Amount',
        );

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {
            try {
                if ($request->plan_type == 'Monthly') {
                    $month = 1;
                } elseif ($request->plan_type == 'Quarterly') {
                    $month = 3;
                } elseif ($request->plan_type == 'Annually') {
                    $month = 12;
                }
                $this->create_plan->create($request, $month);
                Session::flash('success', 'Plan Successfully Created');
                return redirect('admin/plans');
            } catch (\Throwable $th) {
                Session::flash('error', 'Please Try again!' . $th);
                return back()->withErrors($validator)->withInput();
            }
        }
    }
}
