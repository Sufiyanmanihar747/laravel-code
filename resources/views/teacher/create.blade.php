@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 3rem!important;">
    {!! Form::open([
        'url' => isset($teacher) ? route('teachers.update', $teacher->id) : route('teachers.store'),
        'files' => 'true',
        'method' => isset($teacher) ? 'PUT' : 'POST',
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
    ]) !!}
    @csrf

    @if (isset($teacher))
      @method('PUT')
    @endif
    <div class="d-flex justify-content-between align-items-center mb-5">
      <a href="{{ url()->previous() }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">{{ isset($teacher) ? 'Edit Teacher' : 'Add Teacher' }}</h2>
      <div></div>
    </div>

    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 text-center">
        <img class="rounded-circle text-center" id="uploadedImage"
          src="{{ isset($teacher->image) ? url('storage/images/' . $teacher->image) : url('https://banner2.cleanpng.com/20190221/gw/kisspng-computer-icons-user-profile-clip-art-portable-netw-c-svg-png-icon-free-download-389-86-onlineweb-5c6f7efd8fecb7.6156919015508108775895.jpg') }}"
          width="125" height="125" alt="Profile Image">
      </div>
      <div class="from-group col-md-5 ">
        <label class="font-weight-bold m-0" for="student_id[]">Select Students:</label>
        {!! Form::select('student_id[]', isset($teacher)?$teacher->students->pluck('name', 'id'):[], isset($teacher) ? $teacher->students : null, [
            'class' => 'form-control h-75',
            'multiple' => 'multiple',
            'id' => 'student-select',
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
        {!! Form::text('name', isset($teacher) ? $teacher->name : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter name',
        ]) !!}
      </div>
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="branch">Branch:</label>
        <span class="text-danger">
          @error('branch')
            {{ $message }}
          @enderror
        </span>
        {!! Form::select(
            'branch',
            [
                'engineering' => 'Engineering',
                'business' => 'Business',
                'medicine' => 'Medicine',
            ],
            isset($teacher) ? $teacher->branch : null,
            ['class' => 'form-control h-75', 'placeholder' => 'Select branch', 'required' => 'required', 'id' => 'course-student',],
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
        {!! Form::email('email', isset($teacher) ? $teacher->email : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your email',
        ]) !!}
      </div>

      <div class="form-group col-md-5  ">
        <label class="font-weight-bold m-0" for="salary">Salary:</label>
        <span class="text-danger">
          @error('salary')
            {{ $message }}
          @enderror
        </span>
        {!! Form::number(
            'salary',
            isset($teacher) ? $teacher->salary : null,
            [
                'class' => 'form-control h-75',
                'placeholder' => 'Enter your salary',
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
        {!! Form::tel('phone', isset($teacher) ? $teacher->phone : null, [
            'class' => 'form-control h-75',
            'placeholder' => 'Enter your number',
        ]) !!}
      </div>

      <div class="form-group col-md-5 ">
        <label class="font-weight-bold m-0" for="gender">Gender:</label>
        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], isset($teacher) ? $teacher->gender : null, [
            'class' => 'form-control
                    h-75',
            'placeholder' => 'Select Gender',
        ]) !!}
      </div>

    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <button type="submit" class="btn btn-primary mt-3 col-md-5 ">Submit</button>
    </div>
    {!! Form::close() !!}
</div>
@endsection
