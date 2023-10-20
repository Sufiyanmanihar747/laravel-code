<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StorePostRequest;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $data = compact('students');
        return view('student.student')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo 'i am create';
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
