@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open([
        'class' => 'bg-white shadow-lg mt-5 pt-2 pb-3 rounded px-4 mx-5',
    ]) !!}
    <div class="d-flex justify-content-between align-items-center mb-5">
      <a href="{{ route('students.index') }}" class="text-decoration-none fs-5">Back</a>
      <h2 class="text-center text-dark m-0 ">Student Profile</h2>
      <a href="{{ route('students.edit', [$student->id]) }}">
        <img width="25px" src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg"
          alt="edit button">
      </a>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5 text-center">
        <img class="rounded-circle text-center"
          src="{{ isset($student->image) ? url('storage/images/' . $student->image) : url('https://banner2.cleanpng.com/20190221/gw/kisspng-computer-icons-user-profile-clip-art-portable-netw-c-svg-png-icon-free-download-389-86-onlineweb-5c6f7efd8fecb7.6156919015508108775895.jpg') }}"
          width="125" height="125" alt="Profile Image">
      </div>
      <div class="form-group col-md-5">
        <label class="font-weight-bold" for="teacher_id">Selected Teachers:</label>
        {{-- {!! Form::select('teachers', $student->teachers->pluck('name'), null, [
                'class' => 'form-control h-75',
                ]) !!} --}}
        {!! Form::select(
            'teacher_id[]',
            $student->teachers->pluck('name'),
            isset($student) ? $student->teachers : null,
            [
                'class' => 'form-control h-75',
                'disabled' => 'disabled',
                'multiple' => 'multiple',
            ],
        ) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5">
        <label class="font-weight-bold" for="name">Name:</label>
        {!! Form::text('name', $student->name, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}
      </div>
      <div class="form-group col-md-5">
        <label class="font-weight-bold" for="course">Course:</label>
        {!! Form::text('course', $student->course, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">

      <div class="form-group col-md-5">
        <label class="font-weight-bold" for="email">Email:</label>
        {!! Form::email('email', $student->email, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}
      </div>
      <div class="form-group col-md-5 ">
        <label class="font-weight-bold" for="year">Year:</label>
        {!! Form::text('year', $student->year, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}
      </div>
    </div>
    <div class="form-row justify-content-center" style="gap: 35px">
      <div class="form-group col-md-5">
        <label class="font-weight-bold" for="phone">Phone:</label>
        {!! Form::text('phone', $student->phone, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}
      </div>

      <div class="form-group col-md-5">
        <label class="font-weight-bold" for="gender">Gender:</label>
        {!! Form::text('gender', $student->gender, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}
      </div>

    </div>
    <div class="form-row justify-content-center">
      <div class="form-group col-md-10 p-0">
        <label class="font-weight-bold" for="address">Address:</label>
        {!! Form::text('address', $student->address, [
            'class' => 'form-control h-75',
            'disabled' => 'disabled',
        ]) !!}

      </div>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
