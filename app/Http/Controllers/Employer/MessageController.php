<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
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

  // public function sendNewMessage(Request $request) {
  //   if ($request->id) {
  //     $check = Messages::where('receiver_id',)
  //   }
  // }
}
