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
    'care_giver_id',
    'employer_id',
  ];

  public function create($data)
  {
    $save             = new self();
    $save->message    = $data->message;
    $save->sender_id  = $data->care_giver_id;
    $save->receiver_id = $data->employer_id;
    $save->save();
  }
}
