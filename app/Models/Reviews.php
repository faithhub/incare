<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
  use HasFactory;
  protected $table = 'reviews';
  protected $fillable = [
    'review',
    'care_giver_id',
    'sender_id',
    'employer_id',
    'work_done_id',
  ];

  public function create($data)
  {
    $save = new self();
    $save->review = $data['review'];
    $save->care_giver_id = $data['care_giver_id'];
    $save->employer_id = $data['employer_id'];
    $save->work_done_id = $data['work_done_id'];
    $save->sender_id = $data['sender_id'];
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
