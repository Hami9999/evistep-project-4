<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'group_id'
    ];
    public function group(){
        return $this->belongsTo(Groups::class,'groups_id');
    }
    public function mark(){
        return $this->hasMany(Marks::class, 'student_id');
    }
}
