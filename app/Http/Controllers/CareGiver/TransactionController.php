<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
    }

    public function index()
    {
        $data['title'] = 'My Transactions';
        $data['trans'] = $p = Payment::where('user_id', Auth::user()->id)->with('plan:id,plan_name,plan_type')->get();
        //dd($p);
        return view('care_giver.transaction.index', $data);
    }
}
