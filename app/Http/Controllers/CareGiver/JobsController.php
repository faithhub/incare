<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class JobsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('care-giver');
    $this->apply_job = new JobApply();
  }

  public function new_job(Request $request)
  {
    $data['title'] = 'New Jobs';
    $data['categories'] = Category::all();
    $data['sub_categories'] = SubCategory::all();
    $data['jobs'] = $jobs = Job::where('status', 'Active')->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name')->get();
    return view('care_giver.jobs.new_job', $data);
  }

  public function apply_job(Request $request)
  {
    try {
      if (Auth::user()->plan == 0) {
        if (Auth::user()->plan_end_date > new Carbon()) {
          if (Auth::user()->trail_count < 3) {
            try {
              $job = Job::find($request->id);
              $check = JobApply::where(['care_giver_id' => Auth::user()->id, 'job_id' => $request->id])->count();
              if ($check == 0) {
                $this->apply_job->create($request);
                $user = User::find(Auth::user()->id);
                $user->trail_count = $user->trail_count + 1;
                $user->save();
                Session::flash('success', 'Applied Successfully');
                return redirect('care-giver/applied-jobs');
              } else {
                Session::flash('warning', 'Job already being applied for');
                return back();
              }
            } catch (\Throwable $th) {
              Session::flash('error', $th->getMessage());
              return back();
            }
          } else {
            Session::flash('warning', 'Maximum Job Application limit reach for Trial Plan for this month, please Subcribe to enjoy full package');
            return back();
          }
        } elseif (Auth::user()->plan_end_date < new Carbon()) {
          try {
            $job = Job::find($request->id);
            $check = JobApply::where(['care_giver_id' => Auth::user()->id, 'job_id' => $request->id])->count();
            if ($check == 0) {
              $this->apply_job->create($request);
              $user = User::find(Auth::user()->id);
              $user->plan_start_date = Carbon::now();
              $user->plan_end_date = Carbon::now()->addMonth(1);
              $user->trail_count = 1;
              $user->save();
              Session::flash('success', 'Applied Successfully');
              return redirect('care-giver/applied-jobs');
            } else {
              Session::flash('warning', 'Job already being applied for');
              return back();
            }
          } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
          }
        } else {
          Session::flash('warning', 'Try Again Please');
          return back();
        }
      } elseif (Auth::user()->plan == 1) {
        if (Auth::user()->plan_end_date < Carbon::now()) {
          $job = Job::find($request->id);
          $check = JobApply::where(['care_giver_id' => Auth::user()->id, 'job_id' => $request->id])->count();
          if ($check == 0) {
            $this->apply_job->create($request);
            Session::flash('success', 'Applied Successfully');
            return redirect('care-giver/applied-jobs');
          } else {
            Session::flash('warning', 'Job already being applied for');
            return back();
          }
        } elseif (Auth::user()->plan_end_date > Carbon::now()) {
          $user = User::find(Auth::user()->id);
          $user->plan_id = 0;
          $user->plan  = '0';
          $user->plan_start_date = Carbon::now();
          $user->plan_end_date = Carbon::now()->addMonth(1);
          $user->trail_count = 1;
          $user->save();
          $this->apply_job->create($request);
          Session::flash('success', 'Applied Successfully, Now on Trail Plan, your plan has expired');
          return redirect('care-giver/applied-jobs');
        } else {
          Session::flash('warning', 'Try Again!!!');
          return back();
        }
      } else {
        return back();
      }
    } catch (\Throwable $th) {
      Session::flash('error', $th->getMessage());
      return back();
    }
  }

  public function view_job($id)
  {
    if ($id) {
      $data['job'] = $job = Job::where(['id' => $id])->where('status', 'Active')->with('user:id,first_name,last_name')->with('cat:id,name')->with('sub:id,name')->get();
      $data['check'] = $check = JobApply::where(['care_giver_id' => Auth::user()->id, 'job_id' => $id])->count();
      if ($job->count() > 0) {
        $data['title'] = 'View Job Details';
        return view('care_giver.jobs.view_job', $data);
      } else {
        Session::flash('error', 'No record found for Job');
        return redirect('care_giver/new-jobs');
      }
    } else {
      return redirect('care_giver/new-jobs');
    }
  }

  public function search_job(Request $request)
  {
    $data['title'] = 'Job Search Result';
    $data['categories'] = Category::all();
    $data['sub_categories'] = SubCategory::all();
    if ($request) {
      $rules = array(
        'job_title' => ['max:255'],
        'category' => ['max:255'],
        'sub_category' => ['max:255'],
        'address' => ['max:255'],
      );

      $fieldNames = array(
        'job_title'     => 'Job Title',
        'category'      => 'Job Category',
        'sub_category'  => 'Job Sub Category',
        'address'       => 'Job Address'
      );

      $validator = Validator::make($request->all(), $rules);
      $validator->setAttributeNames($fieldNames);
      if ($validator->fails()) {
        Session::flash('warning', 'Please check the form again!');
        return back()->withErrors($validator)->withInput();
      } else {
        if ($request->job_title == null && $request->category == null && $request->sub_category == null && $request->address == null) {
          Session::flash('warning', 'Please check the form again!');
          return back()->withErrors($validator)->withInput();
        }
        try {
          $data['results'] = $job = Job::where('job_title', 'LIKE', "%$request->job_title%")->where('job_category', 'LIKE', "%$request->category%")->where('job_sub_category', 'LIKE', "%$request->sub_category%")->where('address', 'LIKE', "%$request->address%")->where('status', 'Active')->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name')->get();
          // dd($job);
          $data['mode'] = 'Search';
          // Session::flash('success', 'Job Updated Successfully');
          return view('care_giver.jobs.new_job', $data);
        } catch (\Throwable $th) {
          Session::flash('error', 'Please Try again!');
          return back()->withErrors($validator)->withInput();
        }
      }
    } else {
    }
  }

    public function applied_job()
    {
        $data['title'] = 'Applied Jobs';
        $data['jobs'] = $j = JobApply::where('care_giver_id', Auth::user()->id)->with('job:id,avatar,job_title,created_at,date_end')->get();
        //dd($j);
        return view('care_giver.jobs.applied_jobs', $data);
    }

    public function delete_job(Request $request)
    {
        try {
            JobApply::find($request->id)->delete();
            $request->session()->flash('success', 'Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return back();
        }
    }
//   public function applied_job()
//   {
//     $data['title'] = 'Applied Jobs';
//     $data['jobs'] = JobApply::Where('care_giver_id', Auth::user()->id)->get();
//     return view('care_giver.jobs.applied_jobs', $data);
//   }
}
