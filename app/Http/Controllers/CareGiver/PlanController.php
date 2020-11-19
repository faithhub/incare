<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
    }

    public function index()
    {
        $data['title'] = 'plans';
        $data['plans'] = Plan::all();
        return view('care_giver.plans.index', $data);
    }
}
