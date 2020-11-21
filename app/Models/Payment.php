<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'user_id',
        'amount',
        'currency',
        'status',
    ];
    public function create($data)
    {
        $save            = new self();
        $save->plan_id   = $data->plan_id;
        $save->user_id   = Auth::user()->id;
        $save->amount    = $data->amount;
        $save->currency  = $data->currency;
        $save->status    = $data->status;
        $save->save();
    }
}
