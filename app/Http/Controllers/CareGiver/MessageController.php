<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('care-giver');
    $this->create_message = new Messages();
  }

  public function index()
  {
    $data['title'] = 'My Messages';
    $m = Messages::where('care_giver_id', Auth::user()->id)->get();
    $data['messages'] = $post = Messages::where('care_giver_id', Auth::user()->id)->orderBy('created_at')->with('employer:id,first_name,last_name,avatar,email,mobile,address')->get()->groupBy('employer_id');
    //dd($post);
    return view('care_giver.message.index', $data);
  }

  public function message($id)
  {
    $data['user'] = $user = User::find($id);
    $data['title'] = 'Message with ' . $user->first_name . ' ' . $user->last_name;
    $data['messages'] = Messages::where([['care_giver_id', Auth::user()->id], ['employer_id', $id]])->with('employer:id,first_name,last_name,avatar,email,mobile,address')->with('care_giver:id,first_name,last_name,avatar,email,mobile,address')->get();
    return view('care_giver.message.message', $data);
  }

  public function sendMessage(Request $request)
  {
    // dd($request->all());
    if ($request->message != null) {
      $data = array(
        'employer_id' => $request->employer_id,
        'care_giver_id' => Auth::user()->id,
        'receiver_id' => $request->employer_id,
        'sender_id' => Auth::user()->id,
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
