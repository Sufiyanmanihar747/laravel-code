<?php

namespace App\Repositories;

use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentRepository implements StudentRepositoryInterface{

    public function all()
    {
        return Student::all();
    }

    public function find($id)
    {
        return Student::find($id);
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function update($id, array $data)
    {
        $student = Student::find($id);
        $oldTeachers = $student->teachers->pluck('id')->toArray();
        dump('old teachers',$oldTeachers);
        $newTeachers = $data['teacher_id'] ?? [];
        dump('new teachers',$newTeachers);
        $addedTeachers = array_diff($newTeachers, $oldTeachers);
        dump('addedteachers',$addedTeachers);
        $removedTeachers = array_diff($oldTeachers, $newTeachers);
        dump('removed teachers',$removedTeachers);
        // dd('attached');

        // for new teachers added
        if($addedTeachers)
        {
            foreach ($addedTeachers as $value)
            {
                $uuid = Str::uuid()->toString();
                $student->teachers()->attach($value, ['id' => $uuid]);
            }
        }

        // for removed teachers
        if($removedTeachers && count($removedTeachers) > 0)
        {
            foreach ($removedTeachers as  $value)
            {
                $student->teachers()->sync($value);
            }
        }

        // when there is no teacher
        if(count($oldTeachers) == 1 && $removedTeachers == $oldTeachers)
        {
            $student->teachers()->detach();
        }
        return $student->update($data);
    }

    public function delete($id)
    {
        return Student::destroy($id);
    }

    public function paginate($page)
    {
        return Student::paginate($page);
    }

    public function search($search)
    {
        return Student::where('name', 'like', '%' . $search . '%')->paginate(3);;
    }

    public function with($relations)
    {
        return Student::with($relations);
    }
}
