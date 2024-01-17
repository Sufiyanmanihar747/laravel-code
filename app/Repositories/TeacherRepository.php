<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;
use Illuminate\Support\Str;

class TeacherRepository implements TeacherRepositoryInterface{

    public function all()
    {
        return Teacher::all();
    }

    public function find($id)
    {
        return Teacher::find($id);
    }

    public function create(array $data)
    {
        return Teacher::create($data);
    }

    public function update($id, array $data)
    {
        $teacher = Teacher::find($id);

        $oldStudents = $teacher->students->pluck('id')->toArray();
        $newStudents = $data['student_id'] ?? [];
        dump('new' ,$newStudents);
        $addedStudents = array_diff($newStudents, $oldStudents);
        dump('new' ,$addedStudents);
        $removedStudents = array_diff($oldStudents, $newStudents);
        dump('new' ,$removedStudents);
        // dd('attached');

        // for new teachers added
        if($addedStudents)
        {
            foreach ($addedStudents as $value)
            {
                $uuid = Str::uuid()->toString();
                $teacher->students()->attach($value, ['id' => $uuid]);
            }
        }

        // for removed teachers
        if($removedStudents && count($removedStudents) > 0)
        {
            foreach ($removedStudents as  $value)
            {
                $teacher->students()->sync($value);
            }
        }

        // when there is no teacher
        if(count($oldStudents) == 1 && $removedStudents == $oldStudents)
        {
            $teacher->students()->detach();
        }

        return $teacher->update($data);
    }

    public function delete($id)
    {
        return Teacher::destroy($id);
    }

    public function paginate($page)
    {
        return Teacher::paginate($page);
    }

    public function search($search)
    {
        return Teacher::where('name', 'like', '%' . $search . '%')->paginate(3);;
    }

    public function with($relations)
    {
        return Teacher::with($relations);
    }
}
