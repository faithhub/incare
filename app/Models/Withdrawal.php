<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Withdrawal extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'bank',
        'account_number',
        'account_name',
    ];
    public function create($data)
    {
        $save               = new self();
        $save->amount    = $data->amount;
        $save->care_giver_id = Auth::user()->id;
        $save->bank    = $data->bank;
        $save->account_number  = $data->account_number;
        $save->account_name   = $data->account_name;
        $save->save();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'care_giver_id');
    }
}
