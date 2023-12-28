<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Teacher extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = "teachers";
    protected $primarykey = "teacher_id";
    protected $fillable = ['name', 'email', 'subject'];
    public function students()
    {
        // return $this->hasOne(Student::class, 'teacher_id');
        // return $this->hasMany(Student::class, 'teacher_id');
        return $this->belongsToMany(Student::class, 'teacher_student', 'teacher_id', 'student_id')->withTimestamps();
    }

    public static function boot(){

        parent::boot();

        static::creating(function($teacher)
        {
            $teacher->id = $teacher->uuid($teacher); 
            $studentIds = request()->input('student_id');

            if($studentIds)
            {
                foreach ($studentIds as $value)
                {
                    $teacher->students()->attach($value);
                }
            }
        });

        static::created(function($student)
        {
            dump('this is created');
        });

        static::updating(function($name)
        {
            dump('this is updating');
        });

        static::updated(function($name)
        {
            dump('this is Updated');
        });

        static::deleting(function($name)
        {
            dump('this is deleting');
        });

        static::deleted(function($name)
        {
            dump('this is deleted');
        });
    
    }

}
