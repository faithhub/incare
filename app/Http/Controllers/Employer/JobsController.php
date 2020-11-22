<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plan;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class JobsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('employer');
    $this->create_job = new Job();
  }

  public function manage_jobs()
  {
    $data['title'] = 'Manage Jobs';
    $data['menu'] = 'manage_jobs';
    $data['jobs'] = Job::where('employer_id', Auth::user()->id)->with('cat:id,name')->with('sub:id,name')->get();
    return view('employer.jobs.manage_job', $data);
  }

  public function manage_care_giver()
  {
    $data['title'] = 'Manage Care Givers';
    return view('employer.jobs.manage_care_giver', $data);
  }

  public function get_sub_cat($id)
  {
    $get_cat = Category::with('sub:id,name')->find($id);
    return $get_cat->sub;
  }

  public function post_job()
  {
    $data['title'] = 'Post New Job';
    $data['categories'] = Category::all();
    $data['sub_categories'] = SubCategory::all();
    return view('employer.jobs.post_job', $data);
  }

  public function delete_job(Request $request)
  {
    if ($request->id) {
      try {
        $check = JobApply::where('job_id', $request->id)->count();
        if ($check < 1) {
          $job = Job::where(['id' => $request->id, 'employer_id' => Auth::user()->id])->delete();
          Session::flash('success', 'Deleted Successfully');
          return back();
        } else {
          Session::flash('error', 'Job can not be deleted, Job has been applied for already');
          return back();
        }
      } catch (\Throwable $th) {
        $request->session()->flash('warning', $th->getMessage());
        return back();
      }
    } else {
      $request->session()->flash('warning', 'Something went wrong');
      return back();
    }
  }

  public function view_job($id)
  {
    if ($id) {
      $data['job'] = $job = Job::where(['id' => $id, 'employer_id' => Auth::user()->id])->with('cat:id,name')->with('sub:id,name')->get();
      if ($job->count() > 0) {
        $data['applies'] = JobApply::where('job_id', $job[0]['id'])->with('user:id,first_name,last_name,avatar,email,mobile,address')->get();
        $data['title'] = 'View Job Details';
        return view('employer.jobs.view_job', $data);
      } else {
        Session::flash('error', 'No record found for Job');
        return redirect('employer/manage-jobs');
      }
    } else {
      return redirect('employer/manage-jobs');
    }
  }

  public function edit_job($id)
  {
    $data['title'] = 'Edit Job';
    $data['mode'] = 'Edit';
    $data['job'] = Job::where('id', $id)->with('cat:id,name')->with('sub:id,name')->get();
    $data['categories'] = Category::all();
    $data['sub_categories'] = SubCategory::all();
    return view('employer.jobs.post_job', $data);
  }

  public function approve_job($id)
  {
    try {
      $job = JobApply::find($id);
      $job->status = 'Approved';
      $job->save();
      Session::flash('success', 'Job Approved Successfully');
      return back();
    } catch (\Throwable $th) {
      Session::flash('error', $th->getMessage());
      return back();
    }
  }

  public function deny_job($id)
  {
    try {
      $job = JobApply::find($id);
      $job->status = 'Denied';
      $job->save();
      Session::flash('success', 'Job Denied Successfully');
      return back();
    } catch (\Throwable $th) {
      Session::flash('error', $th->getMessage());
      return back();
    }
  }

  public function new_job(Request $request)
  {
    if ($request->id) {
      //dd($request->all());
      $rules = array(
        'avatar' => 'image|mimes:jpg,jpeg,png|max:5000',
        'job_title' => ['required', 'max:255'],
        'job_category' => ['required', 'max:255'],
        'amount' => ['required', 'max:255'],
        'date_end' => ['required', 'max:255'],
        'job_description' => ['required', 'max:255'],
        'mobile' => ['required', 'max:255'],
        'city' => ['required', 'max:255'],
        'address' => ['required', 'max:255'],
      );

      $fieldNames = array(
        'avatar'           => 'Job Picture',
        'job_title'        => 'Job Title',
        'job_category'     => 'Job Category',
        'amount'           => 'Amount',
        'date_end'         => 'Application End Date',
        'job_description'  => 'Job Description',
        'mobile'           => 'Mobile',
        'city'             => 'City',
        'address'          => 'Address',
      );

      $validator = Validator::make($request->all(), $rules);
      $validator->setAttributeNames($fieldNames);
      if ($validator->fails()) {
        Session::flash('warning', 'Please check the form again!');
        return back()->withErrors($validator)->withInput();
      } else {
        try {
          if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $jobs = 'JOBS' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
            $jobsDestination = 'uploads/jobs';
            $file->move($jobsDestination, $jobs);
          }
          $job = Job::find($request->id);
          if ($request->job_sub_category != null) {
            $job_sub_category = $request->job_sub_category;
          } else {
            $job_sub_category = $job->job_sub_category;
          }
          $job->avatar = $request->hasFile('avatar') ? $jobs : $job->avatar;
          $job->job_title = $request->job_title;
          $job->job_category = $request->job_category;
          $job->job_sub_category = $job_sub_category;
          $job->amount = $request->amount;
          $job->date_end = $request->date_end;
          $job->job_description = $request->job_description;
          $job->mobile = $request->mobile;
          $job->city = $request->city;
          $job->address = $request->address;
          $job->save();
          Session::flash('success', 'Job Updated Successfully');
          return redirect('employer/manage-jobs');
        } catch (\Throwable $th) {
          Session::flash('error', 'Please Try again!');
          return back()->withErrors($validator)->withInput();
        }
      }
    } else {
      $rules = array(
        'avatar' => 'required|image|mimes:jpg,jpeg,png|max:5000',
        'job_title' => ['required', 'max:255'],
        'job_category' => ['required', 'max:255'],
        'job_sub_category' => ['required', 'max:255'],
        'amount' => ['required', 'max:255'],
        'date_end' => ['required', 'max:255'],
        'job_description' => ['required', 'max:255'],
        'mobile' => ['required', 'max:255'],
        'city' => ['required', 'max:255'],
        'address' => ['required', 'max:255'],
        'terms' => ['required', 'max:255'],
      );

      $fieldNames = array(
        'avatar'           => 'Job Picture',
        'job_title'        => 'Job Title',
        'job_category'     => 'Job Category',
        'job_sub_category' => 'Job Sub Category',
        'amount'           => 'Amount',
        'date_end'         => 'Application End Date',
        'job_description'  => 'Job Description',
        'mobile'           => 'Mobile',
        'city'             => 'City',
        'address'          => 'Address',
        'terms'            => 'Terms Condition',
      );

      $validator = Validator::make($request->all(), $rules);
      $validator->setAttributeNames($fieldNames);
      if ($validator->fails()) {
        Session::flash('warning', 'Please check the form again!');
        return back()->withErrors($validator)->withInput();
      } else {
        try {
          $file = $request->file('avatar');
          $jobs = 'JOBS' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
          $jobsDestination = 'uploads/jobs';
          $file->move($jobsDestination, $jobs);

          $this->create_job->create($request, $jobs);
          Session::flash('success', 'Job Created Successfully');
          return redirect('employer/manage-jobs');
        } catch (\Throwable $th) {
          Session::flash('error', 'Please Try again!');
          return back()->withErrors($validator)->withInput();
        }
      }
    }
  }

  public function applied_jobs()
  {
    $data['title'] = 'Applied Jobs';
    return view('employer.jobs.applied_jobs', $data);
  }
}
