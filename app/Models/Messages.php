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
    $save->message    = $data['message'];
    $save->care_giver_id  = $data['care_giver_id'];
    $save->employer_id = $data['employer_id'];
    $save->save();
  }
  public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
  public function care_giver()
    {
        return $this->belongsTo(User::class, 'care_giver_id');
    }
}
