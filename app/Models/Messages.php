<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
  use HasFactory;
  protected $table = 'messages';
  protected $fillable = [
    'message',
    'sender_id',
    'receiver_id',
  ];

  public function create($data)
  {
    $save             = new self();
    $save->message    = $data->message;
    $save->sender_id  = $data->sender_id;
    $save->receiver_id = $data->receiver_id;
    $save->save();
  }
}
