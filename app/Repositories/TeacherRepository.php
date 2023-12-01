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
        $Teacher = Teacher::find($id);
        $Teacher->update($data);
        return $Teacher;
    }

    public function delete($id){
        return Teacher::destroy($id);
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