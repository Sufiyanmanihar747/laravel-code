<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StorePostRequest;
use App\Repositories\StudentRepositoryInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $students = Student::all();
    //     $data = compact('students');
    //     return view('student.student')->with($data);
    // }
    public function index(StudentRepositoryInterface $studentRepository) {
        echo 'i am running';
        $students = $studentRepository->all();
        return view('student.student', compact('students'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address']);
        Student::create($data);
        return redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::find($id);
        $data = compact('students');
        return view('student.profile')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $data = compact('student');
        return view('student.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request,$id)
    {
        $student = Student::find($id);
        if($student){
            $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address']);
            $student->update($data);
            return redirect('students');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student)
        {
            $student -> delete();
        }
        return redirect('students');
    }
}
