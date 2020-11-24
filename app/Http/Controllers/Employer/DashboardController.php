<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employer');
    }
    
    public function index()
    {
        $data['title'] = 'employer Dashboard';
        $data['jobs'] = $job = Job::where('employer_id', Auth::user()->id)->with('cat:id,name')->with('sub:id,name')->get();
        $data['job_count'] = $job->count();
        return view('employer.dashboard.index', $data);
    }
}
