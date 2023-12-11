<?php 

namespace App\Repositories;

use App\Repositories\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface{
    
    public function all(){
        return Teacher::all();
    }

    public function find($id){
        return Teacher::find($id);
    }

    public function create(array $data){
        return Teacher::create($data);
    }

    public function update($id, array $data){
        $teacher = Teacher::find($id);
        // @dd($data);
        if ($teacher) {
           return $teacher->student()->sync($data['student_id']);
        }
    }

    public function delete($id){
        $teacher = Teacher::find($id);
        return Teacher::destroy($teacher);
    }

    public function paginate($page) {
        return Teacher::paginate($page);
    }
    public function search($search) {
        return Teacher::where('name', 'like', '%' . $search . '%')->paginate(3);;
    }

    public function with($relations)
    {
        return Teacher::with($relations);
    }
}