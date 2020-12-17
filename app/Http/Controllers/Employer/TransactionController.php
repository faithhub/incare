<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['title'] = 'My Transactions';
        $data['trans'] = $p = Payment::where('user_id', Auth::user()->id)->with('plan:id,plan_name,plan_type')->get();
        return view('employer.transaction.index', $data);
    }
}
