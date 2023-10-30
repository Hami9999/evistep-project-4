<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function students(){
        return $this->hasMany(Students::class, 'groups_id');
    }
    public function subjets()
    {
        return $this->belongsToMany(Subjects::class,'subject_teacher','groups_id','subjects_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teachers::class,'subject_teacher','groups_id','teachers_id');
    }
}
