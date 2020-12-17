<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data['title'] = 'Users';
        $data['users'] = User::where('type', '!=', 3)->orderBy('id', 'DESC')->get();
        return view('admin.users.index', $data);
    }
    public function users()
    {
        $data['title'] = 'Users';
        return view('admin.users.index', $data);
    }
    public function user($id)
    {
        try {
        $data['user'] = $user = User::find($id);
        if ($user->type = 2) {        
            $data['reviews'] = $r = Reviews::where('care_giver_id', $id)->with('employer:id,avatar,first_name,last_name')->orderBy('id', 'DESC')->get();
        } else if ($user->type = 1){        
            $data['reviews2'] = $r = Reviews::where('employer_id', $id)->with('care_giver:id,avatar,first_name,last_name')->orderBy('id', 'DESC')->get();
        }
        return view('admin.users.user', $data);
        } catch (\Throwable $th) {
        Session::flash('error', $th->getMessage());
        return back();
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->status = 'Deleted';
            $user->save();
            Session::flash('success', 'User Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
        }
    }

    public function block($id)
    {
        try {
            $user = User::find($id);
            $user->status = 'Blocked';
            $user->save();
            Session::flash('success', 'User Blocked Successfully');
            return back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
        }
    }

    public function unblock($id)
    {
        try {
            $user = User::find($id);
            $user->status = 'Active';
            $user->save();
            Session::flash('success', 'User Unblocked Successfully');
            return back();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return back();
        }
    }
}
