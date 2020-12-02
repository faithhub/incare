<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data['title'] = 'Withdrawals';
        $data['sn'] = 1;
        $data['trans'] = Withdrawal::with('user:id,avatar,first_name,last_name,email,mobile,address')->get();
        return view('admin.withdraw.index', $data);
    }

    public function cancel_withdrawal(Request $request)
    {
        try {
            $check = Withdrawal::find($request->id);
            if ($check->status == 'Approved') {          
                $request->session()->flash('warning', 'Can not cancel this withdraw, Payment has been Approved');
                return back();
            } else {
                $user = User::where('id', $request->care_giver_id)->first();
                $user->wallet = $user->wallet + $request->amount;
                $user->save();

                $check->status = 'Cancel';
                $check->save();
                
                $request->session()->flash('success', 'Withdrawal Cancelled Successfully');
                return back();
            }
        } catch (\Throwable $th) {
            $request->session()->flash('error', $th->getMessage());
            return back();
        }
    }
}
