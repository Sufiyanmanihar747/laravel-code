<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Models\Teacher;
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
        if($search){
            $students = $studentRepository->search($search);
        }
        else{
            $students = $studentRepository->paginate(5);
        }
        // dd($students);
        // $teachers = Teacher::all();
        // $studentTeacher = Student::with('teacher')->get();
        // @dd($studentTeacher);
        return view('student.index', compact('students'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('student.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address', 'image']);
        $data['teacher_id'] = $request->input('teacher_id');
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        $student=$this->studentRepository->create($data);
        $teachers = $request->input('teacher_id', []);
        foreach ($teachers as $teacher) {
            $student->teacher()->attach($teacher);
        }
        return redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = $this->studentRepository->find($id);
        $data = compact('students');
        return view('student.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $student = $this->studentRepository->find($id);
        return view('student.edit', compact('student'), compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request,$id)
    {
        $student = $this->studentRepository->find($id);
        if($student){
            $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address', 'image']);
            $data['teacher_id'] = $request->input('teacher_id');
            if ($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs('public/images', $imageName);
                $data['image'] = $imageName;
            }
            $student = $this->studentRepository->find($id);
            $teachers = $request->input('teacher_id', []);
            foreach ($teachers as $teacher) {
                $student->teacher()->sync($teacher);
            }
            // @dd($data);
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
            // @dd($student);
            if($student->image){
                $imagePath = public_path("storage/images/".$student->image);
                unlink($imagePath);
            }
            $student->teacher()->detach();
            $this->studentRepository->delete($id);
        }
        return redirect('students');
    }
}
