<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\JobApply;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
    }

    public function index()
    {
        $data['title'] = 'Care Giver Dashboard';
        $data['trans'] = $trans = Payment::where('user_id', Auth::user()->id)->with('plan:id,plan_name,plan_type')->get();
        $data['trans_count'] = $trans->count();
        $data['jobs'] = $job = JobApply::where('care_giver_id', Auth::user()->id)->with('job:id,avatar,job_title,created_at,date_end')->get();
        $data['job_count'] = $job->count();
        $data['approve_jobs'] = JobApply::where('care_giver_id', Auth::user()->id)->where('status', 'Approved')->count();
        $data['denied_jobs'] = JobApply::where('care_giver_id', Auth::user()->id)->where('status', 'Denied')->count();
        return view('care_giver.dashboard.index', $data);
    }
}
