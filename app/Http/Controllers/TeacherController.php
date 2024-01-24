<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\TeacherRepositoryInterface;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $teacherRepository;

    public function __construct(TeacherRepositoryInterface $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function index(Request $request, TeacherRepositoryInterface $teacherRepository)
    {
        $search = $request->input('search');
        $teachers = Teacher::all();
        if($search)
        {
            $teachers = $teacherRepository->search($search);
        }
        // else
        // {
        //     $teachers = $teacherRepository->with('students')->paginate(5);
        // }

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('teacher.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'gender','salary', 'branch','student_id']);
        $teacher = $this->teacherRepository->create($data);
        return redirect('teachers');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = $this->teacherRepository->find($id);
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::all();
        $teacher = $this->teacherRepository->find($id);
        return view('teacher.create', compact('teacher'), compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = $this->teacherRepository->find($id);

        if($teacher)
        {
            $data = $request->only(['name', 'email', 'phone', 'gender','salary', 'branch','student_id']);
            $data['student_id'] = $request->input('student_id', []);
            $this->teacherRepository->update($id, $data);
            return redirect('teachers');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = $this->teacherRepository->find($id);

        if($teacher)
        {
            $teacher->students()->detach();
            $this->teacherRepository->delete($id);
        }

        return redirect('teachers');
    }

    public function getStudents($branch)
    {
        $students = Student::where('course', $branch)->pluck('name','id');
        return response()->json($students);
    }
}
