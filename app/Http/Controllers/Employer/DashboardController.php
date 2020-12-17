<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\Payment;
use App\Models\RunningJobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $data['jobs'] = $job = Job::where('employer_id', Auth::user()->id)->with('cat:id,name')->with('sub:id,name')->limit(5)->get();
        $data['job_count'] = Job::where('employer_id', Auth::user()->id)->count();
        $data['running_job'] = RunningJobs::where(['employer_id' => Auth::user()->id, 'done' => 'No'])->count();
        $data['done_job'] = RunningJobs::where(['employer_id' => Auth::user()->id, 'done' => 'Yes'])->count();
        $data['transaction'] = Payment::where(['user_id' => Auth::user()->id])->count();
        return view('employer.dashboard.index', $data);
    }

    public function switch()
    {
        try {
            $user = User::find(Auth::user()->id);
            //dd($user->type);
            $user->type = 2;
            $user->save();
            Session::flash('success', 'Switched to Care-Giver Dashboard Successfully');
            return redirect('care-giver');
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
        }
    }
}
