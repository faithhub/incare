<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->new_sub = new SubCategory();
        $this->new_cat = new Category();
    }

    public function job_alert()
    {
        $data['title'] = 'Jobs Alert';
        return view('admin.jobs.job_alert', $data);
    }

    public function manage_job()
    {
        $data['title'] = 'Jobs Alert';
        return view('admin.jobs.manage_job', $data);
    }

    public function all_job()
    {
        $data['title'] = 'Jobs Alert';
        $data['jobs'] = Job::with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name,avatar,email,mobile')->get();
        return view('admin.jobs.all_jobs', $data);
    }

    public function view_job($id)
    {
        if ($id) {
            $data['job'] = $job = Job::where('id', $id)->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name,avatar,email,mobile,address')->get();
            // dd($job);
            if ($job->count() > 0) {
                $data['applies'] = JobApply::where('job_id', $job[0]['id'])->with('user:id,first_name,last_name,avatar,email,mobile,address')->get();
                $data['title'] = 'View Job Details';
                return view('admin.jobs.view_job', $data);
            } else {
                Session::flash('error', 'No record found for Job');
                return redirect('admin/all-job');
            }
        } else {
            return redirect('employer/manage-jobs');
        }
    }

    public function add_category(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name' => ['required', 'max:255'],
                'sub_category_id' => ['required', 'max:255'],
            );
            $fieldNames = array(
                'name' => 'Job Category Name',
                'sub_category_id' => 'Job Sub Category',
            );
            // dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('warning', 'Please check the form again!');
                return back()->withErrors($validator)->withInput();
            } else {
                $this->new_cat->create($request);
                Session::flash('success', 'Job Sub Category Added Successfully');
                return  back();
                // return redirect('admin/add-job-category');
            }
        } else {
            $data['title'] = 'Jobs Category';
            $data['subs'] = SubCategory::all();
            return view('admin.jobs.add_category', $data);
        }
    }

    public function delete_cat(Request $request)
    {
        Category::find($request->id)->delete();
        Session::flash('success', 'Job Category Deleted Successfully');
        return redirect('admin/job-categories');
    }

    public function category(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name' => ['required', 'max:255'],
                'sub_category_id' => ['required', 'max:255'],
            );
            $fieldNames = array(
                'name' => 'Job Category Name',
                'sub_category_id' => 'Job Sub Category',
            );
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('warning', 'Please check the form again!');
                return back()->withErrors($validator)->withInput();
            } else {
                $sub = Category::find($request->id);
                $sub->name = $request->name;
                $sub->sub_category_id = $request->sub_category_id;
                $sub->save();
                Session::flash('success', 'Job Sub Category Updated Successfully');
                return redirect('admin/job-categories');
            }
        } else {
            $data['title'] = 'Category';
            $data['subs'] = SubCategory::all();
            $data['categories'] = Category::with('sub:id,name')->get();
            return view('admin.jobs.categories', $data);
        }
    }

    public function delete_sub(Request $request)
    {
        SubCategory::find($request->id)->delete();
        Session::flash('success', 'Job Sub Category Deleted Successfully');
        return redirect('admin/job-sub-categories');
    }


    public function sub_category(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name' => ['required', 'max:255'],
            );
            $fieldNames = array(
                'name' => 'Job Sub Category Name',
            );
            // dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('warning', 'Please check the form again!');
                return back()->withErrors($validator)->withInput();
            } else {
                $sub = SubCategory::find($request->id);
                $sub->name = $request->name;
                $sub->save();
                Session::flash('success', 'Job Sub Category Updated Successfully');
                return redirect('admin/job-sub-categories');
            }
        } else {
            $data['title'] = 'Job Sub-Category';
            $data['sub_categories'] = SubCategory::all();
            return view('admin.jobs.sub_categories', $data);
        }
    }

    public function add_sub_category(Request $request)
    {
        if ($_POST) {
            $rules = array(
                'name' => ['required', 'max:255'],
            );
            $fieldNames = array(
                'name' => 'Job Sub Category Name',
            );
            // dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash('warning', 'Please check the form again!');
                return back()->withErrors($validator)->withInput();
            } else {
                $this->new_sub->create($request);
                Session::flash('success', 'Job Sub Category Added Successfully');
                return redirect('admin/job-sub-categories');
            }
        } else {
            $data['title'] = 'Jobs Sub Category';
            return view('admin.jobs.add_sub_category', $data);
        }
    }
}
