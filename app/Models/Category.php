<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sub_category_id',
    ];
    public function create($data)
    {
        $save                  = new self();
        $save->name            = $data->name;
        $save->sub_category_id = $data->sub_category_id;
        $save->save();
    }

    public function sub()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
