<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        return view('care_giver.settings.profile', $data);
    }

    public function change_password()
    {
        $data['title'] = 'Change Password';
        return view('care_giver.settings.change_password', $data);
    }

    public function update_profile(Request $request)
    {
        //dd($request);
        $rules = array(
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'mobile' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'facebook' => ['max:255'],
            'twitter' => ['max:255'],
            'instagram' => ['max:255'],
            'avatar' => 'image|mimes:jpg,jpeg,png|max:5000',
        );
        $fieldNames = array(
            'first_name'          => 'First Name',
            'last_name'           => 'Last Name',
            'mobile'              => 'Mobile Number',
            'city'                => 'City From',
            'address'             => 'Address',
            'facebook'            => 'FaceBook Name',
            'twitter'             => 'Twiter Username',
            'instagram'           => 'Instagram Handle Name',
            'avatar'              => 'Profile Picture',
        );
        // dd($request->all());
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            Session::flash('warning', 'Please check the form again!');
            return back()->withErrors($validator)->withInput();
        } else {
            //dd($request->all());
            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                $picture = 'PP'.'CG' . date('dMY') . time() . '.' . $file->getClientOriginalExtension();
                $pictureDestination = 'uploads/profile_pictures';
                $file->move($pictureDestination, $picture);
            }
            $user = User::find(Auth::user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->facebook = $request->facebook;
            $user->twitter = $request->twitter;
            $user->instagram = $request->instagram;
            $user->avatar = $request->hasFile('avatar') ? $picture : $user->avatar;
            $user->save();
            Session::flash('success', 'Profile Updated Successfully');
            return \back();
        }
    }
}
