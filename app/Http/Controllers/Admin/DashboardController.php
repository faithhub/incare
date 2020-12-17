<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['jobss'] = Job::with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name,avatar,email,mobile')->skip(0)->take(5)->get();
        $data['jobs'] = $job = Job::with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name,avatar,email,mobile')->get();
        $data['job_count'] = $job->count();
        $data['trans_count'] = Payment::all()->count();
        $data['care_giver_count'] = User::where('type', '1')->count();
        $data['employer_count'] = User::where('type', '2')->count();
        return view('admin.dashboard.index', $data);
    }
}

