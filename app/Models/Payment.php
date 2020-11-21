<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'plan_id',
        'user_id',
        'amount',
        'status',
        'reference',
        'message',
        'transaction',
        'trxref',
    ];
    public function create($data)
    {
        $save            = new self();
        $save->plan_id   = $data->plan_id;
        $save->user_id   = Auth::user()->id;
        $save->amount    = $data->amount;
        $save->status    = $data->status;
        $save->reference = $data->reference;
        $save->message    = $data->message;
        $save->transaction    = $data->transaction;
        $save->trxref    = $data->trxref;
        $save->save();
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
