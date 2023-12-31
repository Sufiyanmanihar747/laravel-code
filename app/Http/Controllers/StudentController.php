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
        if($search){
            $students = $studentRepository->search($search);
        } 
        else{
            $students = $studentRepository->paginate(5);
        }
        // ddd($students);
        return view('student.index', compact('students'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address', 'image']);
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }
        // @dump($image, $data, $request);
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
        return view('student.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);
        $data = compact('student');
        return view('student.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request,$id)
    {
        $student = $this->studentRepository->find($id);
        if($student){
            $data = $request->only(['name', 'email', 'phone', 'gender', 'course', 'year', 'address', 'image']);
            if ($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs('public/images', $imageName);
                $data['image'] = $imageName;
            }
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
            $imagePath = public_path("storage/images/".$student->image);
            if($imagePath){
                unlink($imagePath);
            }
            $this->studentRepository->delete($id);
        }
        return redirect('students');
    }
}
