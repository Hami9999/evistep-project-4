<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $fillable =[
        'first_name',
        'last_name'
    ];

    public function subjets()
    {
        return $this->belongsToMany(Subjects::class,'subject_teacher','teachers_id','subjects_id');
    }
    public function groups()
    {
        return $this->belongsToMany(Groups::class,'subject_teacher','teachers_id','groups_id');
    }

}
