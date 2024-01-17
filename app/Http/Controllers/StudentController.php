<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Models\Teacher;
use App\Traits\HandleImage;
class StudentController extends Controller
{
    use HandleImage;
    /**
     * Display a listing of the resource.
     */

    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        // $this->middleware('auth');
        $this->studentRepository = $studentRepository;
    }

    public function index(Request $request, StudentRepositoryInterface $studentRepository) {

        $search = $request->input('search');
        $students = Student::all();
        if($search)
        {
            $students = $studentRepository->search($search);
        }
        else
        {
            $students = $studentRepository->paginate(5);
        }
        // $students = $studentRepository->all();
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

        if ($request->hasFile('image'))
        {
            $data['image'] = $this->handleimage($request);
        }

        $student=$this->studentRepository->create($data);
        return redirect('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->studentRepository->find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $student = $this->studentRepository->find($id);
        return view('student.create', compact('student'), compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request,$id)
    {
        $student = $this->studentRepository->find($id);
        if($student)
        {
            $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address', 'image']);
            $data['teacher_id'] = $request->input('teacher_id',[]);

            if ($request->hasFile('image'))
            {
                $data['image'] =$this->handleimage($request);
            }

            $student = $this->studentRepository->find($id);
            $this->studentRepository->update($id, $data);
            dump('this is student controller');
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
            if($student->image)
            {
                $imagePath = public_path("storage/images/".$student->image);
                unlink($imagePath);
            }

            $student->teachers()->detach();
            $this->studentRepository->delete($id);
        }
        return redirect('students');
    }

    public function getTeachers($branch)
    {
        $teachers = Teacher::where('branch', $branch)->pluck('name','id');
        return response()->json($teachers);
    }
}
