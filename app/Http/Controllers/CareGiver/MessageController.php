<?php

namespace App\Http\Controllers\CareGiver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('care-giver');
    }

    public function index()
    {
        $data['title'] = 'My Messages';
        return view('care_giver.message.index', $data);
    }
}
