@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'url' => isset($student) ? route('students.update', $student->id) : route('students.store'),
        'files' => 'true',
        'method' => isset($student) ? 'PUT' : 'POST',
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
    ]) !!}
    @csrf

    @if (isset($student))
      @method('PUT')
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h2>
      <div></div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 text-center">
        <img class="rounded-circle text-center" id="uploadedImage"
          src="{{ isset($student->image) ? url('storage/images/' . $student->image) : url('https://banner2.cleanpng.com/20190221/gw/kisspng-computer-icons-user-profile-clip-art-portable-netw-c-svg-png-icon-free-download-389-86-onlineweb-5c6f7efd8fecb7.6156919015508108775895.jpg') }}"
          width="125" height="125" alt="Profile Image">
      </div>
      <div class="from-group col-md-5 ">
        <label class="font-weight-bold m-0" for="teacher_id[]">Select Teachers:</label>
        {!! Form::select('teacher_id[]', isset($student)?$student->teachers->pluck('name', 'id'):[] , isset($student) ? $student->teachers : null, [
            'class' => 'form-control h-75',
            'multiple' => 'multiple',
            'id' => 'teacher-select',
        ]) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="name">Name:</label>
        <span class="text-danger">
          @error('name')
            {{ $message }}
          @enderror
        </span>
        {!! Form::text('name', isset($student) ? $student->name : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter name',
            'style' =>'text-transform: capitalize;',
        ]) !!}
      </div>
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="course">Branch:</label>
        <span class="text-danger">
          @error('course')
            {{ $message }}
          @enderror
        </span>
        {{-- @dump($student->teachers) --}}
        {!! Form::select(
            'course',
            [
                'engineering' => 'Engineering',
                'business' => 'Business',
                'medicine' => 'Medicine',
            ],
            isset($student) ? $student->course : null,
            ['class' => 'form-control h-75', 'placeholder' => 'Select Course', 'required' => 'required', 'id' => 'course-select'],
        ) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="email">Email:</label>
        <span class="text-danger">
          @error('email')
            {{ $message }}
          @enderror
        </span>
        {!! Form::email('email', isset($student) ? $student->email : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your email',
        ]) !!}
      </div>

      <div class="form-group col-md-5  ">
        <label class="font-weight-bold m-0" for="year">Year:</label>
        <span class="text-danger">
          @error('year')
            {{ $message }}
          @enderror
        </span>
        {!! Form::select(
            'year',
            [
                '1st year' => '1st Year',
                '2nd year' => '2nd Year',
                '3rd year' => '3rd Year',
                '4th year' => '4th Year',
            ],
            isset($student) ? $student->year : null,
            [
                'class' => 'form-control h-75',
                'placeholder' => 'Select Year',
                'required' => 'required',
            ],
        ) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="phone">Phone:</label>
        <span class="text-danger">
          @error('phone')
            {{ $message }}
          @enderror
        </span>
        {!! Form::tel('phone', isset($student) ? $student->phone : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your number',
        ]) !!}
      </div>

      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="gender">Gender:</label>
        {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], isset($student) ? $student->gender : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Select Gender',
        ]) !!}
      </div>

    </div>
    <div class="form-row justify-content-center" style="gap: 35px">

      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="address">Address:</label>
        <span class="text-danger">
          @error('address')
            {{ $message }}
          @enderror
        </span>
        {!! Form::text('address', isset($student) ? $student->address : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter address',
        ]) !!}
      </div>

      <div class="form-group col-md-5">
        <label class="font-weight-bold m-0" for="image">Upload Image:</label>
        <span>{{ isset($student) ? $student->image : null }}</span>
        {!! Form::file('image', [
            'class' => 'form-control h-75',
            'accept' => 'image/*',
            'files' => 'true',
            'id' => 'imageInput',
        ]) !!}
      </div>

    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <button type="submit" class="btn btn-primary mt-3 col-md-5 ">Submit</button>
    </div>
    {!! Form::close() !!}
</div>
@endsection
