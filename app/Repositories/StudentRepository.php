<?php 

namespace App\Repositories;

use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface{
    
    public function all(){
        return Student::all();
    }

    public function find($id){
        return Student::find($id);
    }

    public function create(array $data){
        foreach ($data['teacher_id'] as $value) {
            $data['teacher_id'] = $value; 
            return Student::create($data); 
        }
    }

    public function update($id, array $data){
        $student = Student::find($id);
        if ($student) {
           return $student->teacher()->sync($data['teacher_id']);
        }
    }

    public function delete($id){
        return Student::destroy($id);
    }

    public function paginate($page) {
        return Student::paginate($page);
    }
    public function search($search) {
        return Student::where('name', 'like', '%' . $search . '%')->paginate(3);;
    }
    public function with($relations)
    {
        return Student::with($relations);
    }
}