<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data['users'] = User::where('type', '!=', 3)->get();
        return view('admin.users.index', $data);
    }
    public function users()
    {
        $data['title'] = 'Users';
        return view('admin.users.index', $data);
    }
}
