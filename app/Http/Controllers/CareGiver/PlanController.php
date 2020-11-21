<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
        $this->save_plan = new Payment();
    }

    public function index()
    {
        $data['title'] = 'plans';
        $data['plans'] = Plan::all();
        return view('care_giver.plans.index', $data);
    }

    public function payment(Request $request)
    {
        try {
            $plan = Plan::find($request->plan_id);
            if ($plan->plan_type == 'Monthly') {
                $plan_end_date = Carbon::now()->addMonths(1);
            } elseif ($plan->plan_type == 'Quarterly') {
                $plan_end_date = Carbon::now()->addMonths(3);
            } elseif ($plan->plan_type == 'Annually') {
                $plan_end_date = Carbon::now()->addMonths(12);
            }

            $this->save_plan->create($request);
            $save                   = User::find(Auth::user()->id);
            $save->plan_id          = $request->plan_id;
            $save->plan             = $request->plan;
            $save->plan_end_date    = $plan_end_date;
            $save->plan_start_date  = Carbon::now();
            $save->save();

            $request->session()->flash('success', 'Plan Subcribed Successfully');
            return true;
        } catch (\Throwable $th) {
            return  $th->getMessage();
        }
    }
}
