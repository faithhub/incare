<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $data['title'] = 'Transactions';
        $data['trans'] = $p = Payment::with('plan:id,plan_name,plan_type')->with('user:id,first_name,last_name,avatar,email,mobile,address')->get();
        return view('admin.transaction.index', $data);
    }
}
