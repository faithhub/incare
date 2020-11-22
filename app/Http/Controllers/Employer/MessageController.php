<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->create_message = new Messages();
  }

  public function index()
  {
    $data['title'] = 'Messages';
    $data['messages'] = Messages::where('employer_id', Auth::user()->id)->get();
    return view('employer.message.index', $data);
  }

  public function message($id)
  {
    $data['user'] = $user = User::find($id);
    $data['title'] = 'Message with' . $user->first_name . ' ' . $user->last_name;
    return view('employer.message.message', $data);
  }

  public function sendMessage(Request $request)
  {
    // dd($request->all());
    if ($request->message != null) {
      $data = array(
        'employer_id' => Auth::user()->id,
        'care_giver_id' => $request->care_giver_id,
        'message' => $request->message,
      );

      $this->create_message->create($data);
      Session::flash('success', 'Message Sent');
      return back();
    } else {
      Session::flash('warning', 'Message cannot be blank');
      return back();
    }
  }
}
