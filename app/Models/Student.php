<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primarykey = "student_id";
    protected $fillable = ['name', 'email', 'phone',  'gender', 'course', 'year', 'address', 'image', 'teacher_id'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
