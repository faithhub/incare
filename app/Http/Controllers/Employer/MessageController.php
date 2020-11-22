<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $data['title'] = 'Messages';
    return view('employer.message.index', $data);
  }

  public function message($id)
  {
    $data['user'] = $user = User::find($id);
    $data['title'] = 'Message with' . $user->first_name . ' ' . $user->last_name;
    return view('employer.message.message', $data);
  }

  // public function sendMessage(Request $request) {
  //   if ($request->id) {
  //     $check = Messages::where('care_giver_id',)
  //   }
  // }
}
