<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'avatar',
        'job_title',
        'job_category',
        'job_sub_category',
        'amount',
        'date_end',
        'job_description',
        'mobile',
        'city',
        'address',
    ];
    public function create($data, $jobs)
    {
        $save                        = new self();
        $save->employer_id           = Auth::user()->id;
        $save->avatar                = $jobs;
        $save->job_title             = $data->job_title;
        $save->job_category          = $data->job_category;
        $save->job_sub_category      = $data->job_sub_category;
        $save->amount                = $data->amount;
        $save->date_end              = $data->date_end;
        $save->job_description       = $data->job_description;
        $save->mobile                = $data->mobile;
        $save->city                  = $data->city;
        $save->address               = $data->address;
        $save->save();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
    public function cat()
    {
        return $this->belongsTo(Category::class, 'job_category');
    }
    public function sub()
    {
        return $this->belongsTo(SubCategory::class, 'job_sub_category');
    }
}
