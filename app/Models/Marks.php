<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
        'date',
        'mark'
        ];
//    public function student(){
//        return $this->belongsTo(Students::class,'student_id');
//    }
}
