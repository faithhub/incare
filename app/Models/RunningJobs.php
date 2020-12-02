<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RunningJobs extends Model
{
    use HasFactory;
    public function create($data)
    {
        $save               = new self();
        $save->care_giver_id    = Auth::user()->id;
        $save->employer_id    = $data->employer_id;
        $save->job_id  = $data->job_id;
        $save->amount  = $data->amount;
        $save->date_start   = Carbon::now();
        $save->save();
    }
}
