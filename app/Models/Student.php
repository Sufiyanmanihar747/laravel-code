<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Student extends Model
{
    use Uuids;
    use HasFactory;

    protected $table = "students";
    protected $primarykey = "student_id";
    protected $fillable = ['name', 'email', 'phone',  'gender', 'course', 'year', 'address', 'image'];

    public function teachers()
    {
        // return $this->belongsTo(Teacher::class, 'teacher_id');
        return $this->belongsToMany(Teacher::class, 'teacher_student', 'student_id', 'teacher_id')->withTimestamps();
    }

    public static function boot(){
        parent::boot();
        static::creating(function($student)
        {
            $student->id = $student->uuid($student);
            $teacherIds = request()->input('teacher_id');

            if($teacherIds)
            {
                foreach ($teacherIds as $value)
                {
                    $uuid = Str::uuid()->toString();
                    $student->teachers()->attach($value, ['id' => $uuid]);
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
            // dump('this is deleting');
        });

        static::deleted(function($name)
        {
            // dump('this is deleted');
        });

        static::saving(function($name)
        {
            dump('this is saving');
        });

        static::saved(function($name)
        {
            dump('this is saved');
        });
    }
}
