<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
    }

    public function new_job(Request $request)
    {
        $data['title'] = 'New Jobs';
        // $request->ip();
        // $data = Location::get('129.205.113.238');
        // dd($data);
        $data['categories'] = Category::all();
        $data['sub_categories'] = SubCategory::all();
        $data['jobs'] = $jobs = Job::with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name')->get();
        return view('care_giver.jobs.new_job', $data);
    }

    public function view_job($id)
    {
        if ($id) {
            $data['job'] = $job = Job::where(['id' => $id])->with('user:id,first_name,last_name')->with('cat:id,name')->with('sub:id,name')->get();
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
                    $data['results'] = $job = Job::where('job_title', 'LIKE', "%$request->job_title%")->where('job_category', 'LIKE', "%$request->category%")->where('job_sub_category', 'LIKE', "%$request->sub_category%")->where('address', 'LIKE', "%$request->address%")->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name')->get();
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
        return view('care_giver.jobs.applied_jobs', $data);
    }
}
