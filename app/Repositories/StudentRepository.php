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
        return Student::create($data);
    }

    public function update($id, array $data){
        $student = Student::find($id);
        $student->update($data);
        return $student;
    }

    public function delete($id){
        return Student::destroy($id);
    }

    public function paginate($page) {
        return Student::paginate($page);
    }
}