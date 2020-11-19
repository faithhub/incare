<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan-name',
        'plan_type',
        'plan_amount',
        'plan_month',
    ];
    public function create($data, $month)
    {
        $save               = new self();
        $save->plan_name    = $data->plan_name;
        $save->plan_type    = $data->plan_type;
        $save->plan_amount  = $data->plan_amount;
        $save->plan_month   = $month;
        $save->save();
    }
}
