<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobApply extends Model
{
    use HasFactory;
    protected $fillable = [
        'care_giver_id',
        'job_id',
        'status',
    ];
    public function create($data)
    {
        $save                  = new self();
        $save->care_giver_id   = Auth::user()->id;
        $save->job_id          = $data->id;
        $save->status          = 'Pending';
        $save->save();
    }
}
