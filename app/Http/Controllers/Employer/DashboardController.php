<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
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
        return view('employer.dashboard.index', $data);
    }
}
