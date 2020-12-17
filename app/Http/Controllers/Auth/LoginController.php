<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $maxAttempts = 3;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $role = Auth::user()->type;
        switch ($role) {
            case '1':
                return '/employer/job-feeds';
                break;

            case '2':
                return '/care-giver/job-feeds';
                break;

            case '3':
                return '/admin';
                break;

            default:
                return '/logout';
                break;
        }
    }

    public function logout()
    {
        Session::flash('success', 'Logout Successfully');
        Auth::logout();
        return redirect('login');
    }
}
