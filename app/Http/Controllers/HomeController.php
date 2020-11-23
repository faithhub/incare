<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = 'Incare Home Page';
        $data['cats'] = Category::all();
        return view('web.index', $data);
    }
    public function contact_form(Request $request)
    {
        //dd($request->all());
        $rules = array(
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'mobile' => ['required', 'max:255'],
            'reason' => ['required', 'max:255'],
            'bot' => ['required', 'max:255'],
            'communicate' => ['required', 'max:255'],
            'message' => ['required', 'max:255'],
        );
        $fieldNames = array(
            'name'          => 'Name',
            'email'         => 'Email',
            'mobile'        => 'Mobile Number',
            'reason'        => 'Reason For Contact',
            'bot'           => 'Spam Protection',
            'communicate'   => 'Preferred Method Of Communication',
            'message'       => 'Additional Information',
        );
        // dd($request->all());
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {                      
           try {
                Mail::to('adebayooluwadara@gmail.com')->send(new MessageMail($request));
                Session::flash('success', 'Message Sent Successfully');
                return \back();
            } catch (\Throwable $th) {
                Session::flash('error', $th->getMessage());
                return \back();
            }
        }
    }

    public function about()
    {
        $data['title'] = 'About Us';
        return view('web.about');
    }
    public function contact()
    {
        $data['title'] = 'Contact Us';
        return view('web.contact');
    }
    public function courses()
    {
        $data['title'] = 'All Jobs';
        return view('web.courses');
    }
    public function jobs()
    {
        $data['title'] = 'All Jobs';
        $data['cats'] = Category::all();
        $data['subs'] = SubCategory::all();
        $data['jobs'] = Job::orderBy('id', 'DESC')->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name,avatar,email,mobile')->get();
        return view('web.jobs', $data);
    }
    public function job_details($id)
    {
        if ($id) {
            $data['job'] = $job = Job::where('id', $id)->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name,avatar,email,mobile,address')->get();
            // dd($job);
            if ($job->count() > 0) {
                $data['applies'] = JobApply::where('job_id', $job[0]['id'])->with('user:id,first_name,last_name,avatar,email,mobile,address')->get();
                $data['title'] = 'View Job Details';
                return view('web.job_details', $data);
            } else {
                Session::flash('error', 'No record found for Job');
                return redirect('jobs');
            }
        } else {
            return redirect('jobs');
        }
    }
    public function search_job(Request $request)
    {
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
              $data['jobs'] = $job = Job::where('job_title', 'LIKE', "%$request->job_title%")->where('job_category', 'LIKE', "%$request->category%")->where('job_sub_category', 'LIKE', "%$request->sub_category%")->where('address', 'LIKE', "%$request->address%")->with('cat:id,name')->with('sub:id,name')->with('user:id,first_name,last_name')->get();
              //dd($job);
              Session::flash('success', 'Job Result');
              return view('web.job_search_result', $data);
            } catch (\Throwable $th) {
              Session::flash('error', 'Please Try again!');
              return back()->withErrors($validator)->withInput();
            }
          }
    }
}
