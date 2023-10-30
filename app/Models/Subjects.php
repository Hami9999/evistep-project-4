<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'
    ];
    public function teachers()
    {
        return $this->belongsToMany(Teachers::class,'subject_teacher','subjects_id','teachers_id');
    }
    public function groups()
    {
        return $this->belongsToMany(Groups::class,'subject_teacher','subjects_id','groups_id');
    }
}
