<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
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
        if($search){
            $teachers = $teacherRepository->search($search);
        }   
        else{
            $teachers = $teacherRepository->with('student')->paginate(5);
        }
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo 'this is create';
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo 'this is store';
        $data = $request->only(['name', 'email', 'subject']);
        $this->teacherRepository->create($data);
        return redirect('teachers');
    }
    // public function getstudent(){
    //     return Student::with('teacher')->get();
    // }
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
        echo 'this is edit';
        $teacher = $this->teacherRepository->find($id);
        $data = compact('teacher');
        return view('teacher.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo 'this is update';
        $teacher = $this->teacherRepository->find($id);
        if($teacher){
            $data = $request->only(['name', 'email', 'subject']);
            $this->teacherRepository->update($id, $data);
            return redirect('teachers');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo 'this is destroy';
        $teacher = $this->teacherRepository->find($id);
        if($teacher)
        {
            $this->teacherRepository->delete($id);
        }
        return redirect('teachers');
    }
}
