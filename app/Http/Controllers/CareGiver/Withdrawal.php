<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Withdrawal extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
        $this->save_plan = new Payment();
    }

    public function index()
    {
        $data['title'] = 'Withdrawals';
        // $data['plans'] = Withdrawal::all();
        return view('care_giver.withdraw.index', $data);
    }
}
