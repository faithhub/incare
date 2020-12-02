<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
        $this->save_plan = new Payment();
        $this->withdraw = new Withdrawal();
    }

    public function index()
    {
        $data['title'] = 'Withdrawals';
        $data['sn'] = 1;
        $data['trans'] = Withdrawal::where('care_giver_id', Auth::user()->id)->get();
        return view('care_giver.withdraw.index', $data);
    }
    public function create(Request $request)
    {
       if ($_POST) {
        $rules = array(
            'amount' => ['required', 'max:255'],
            'bank' => ['required', 'max:255'],
            'account_name' => ['required', 'max:255'],
            'account_number' => ['required', 'max:255'],
        );
        $fieldNames = array(
            'amount'          => 'Amount',
            'bank'            => 'Bank',
            'account_name'    => 'Account Name',
            'account_number'  => 'Account Number',
        );
        // dd($request->all());
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {
            if ($request->amount > Auth::user()->wallet) {
                Session::flash('warning', 'Not Enough Balance in Wallet');
                return \back();
            }else{       
                try {
                    $user = User::where('id', Auth::user()->id)->first();
                    $user->wallet = $user->wallet - $request->amount;
                    $user->save();
                    $this->withdraw->create($request);
                    Session::flash('success', 'Withdrawal Initiated Successfully');
                    return redirect('care-giver/withdrawals');
                } catch (\Throwable $th) {
                    Session::flash('error', $th->getMessage());
                    return \back();
                }
            }
        }
       }else{
        $data['title'] = 'Create Withdrawal';
        return view('care_giver.withdraw.create', $data);
       }
    }

    public function cancel_withdraw(Request $request)
    {
        try {
            $check = Withdrawal::find($request->id);
            if ($check->status == 'Approved') {          
                $request->session()->flash('warning', 'Can not cancel this withdraw, Payment has been Approved');
                return back();
            } else {
                $user = User::where('id', Auth::user()->id)->first();
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
