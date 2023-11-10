<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $studentRepository;
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }
    
    public function index(Request $request, StudentRepositoryInterface $studentRepository) {
        // $students = $studentRepository->all();
        // return view('student.student', compact('students'));
        // $students = Student::paginate(3); 
        $search = $request->input('search');
        if ($search){
            $students = $studentRepository->search($search);
        } else {
            $students = $studentRepository->paginate(3);
        }
        return view('student.student_table', compact('students'));
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
        $this->studentRepository->create($data);
        return redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = $this->studentRepository->find($id);
        $data = compact('students');
        return view('student.profile')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);
        $data = compact('student');
        return view('student.update')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request,$id)
    {
        $student = $this->studentRepository->find($id);
        if($student){
            $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address']);
            $this->studentRepository->update($id, $data);
            return redirect('students');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->find($id);
        if($student)
        {
            $this->studentRepository->delete($id);
        }
        return redirect('students');
    }
}
