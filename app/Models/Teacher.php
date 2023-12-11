<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teacher";
    protected $primarykey = "teacher_id";
    protected $fillable = ['name', 'email', 'subject'];
    public function student()
    {
        // return $this->hasOne(Student::class, 'teacher_id');
        // return $this->hasMany(Student::class, 'teacher_id');
        return $this->belongsToMany(Student::class, 'teacher_student', 'teacher_id', 'student_id');
    }
}
