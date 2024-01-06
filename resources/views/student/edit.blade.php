<!DOCTYPE html>

<head>
    <title>Update page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="
background: linear-gradient(180deg, #1A335D 0%, #1EAAE2 100%);">
    {{-- @dd($student); --}}
        {!! Form::open([
            'route' => ['students.update', $student->id],
            'files' => 'true'
        ]) !!}
        @method('PUT')
        @csrf
        <div class=" my-2  d-flex justify-content-center">
            <div class="form-control p-3 col-md-6" style="backdrop-filter: blur(40px);
            background-color: transparent;color: white;box-shadow: 1px 1px 20px black;">
                <h3 class="text-center">Update form</h3>
                <div class="form-group">
                    <label class="font-weight-bold" for="fullname">Full Name</label>
                    {!! Form::text('name',$student->name,[
                        'class' => 'form-control',
                        'placeholder' => 'Enter name',
                    ]) !!}
                    <span class="text-danger">
                        @error('name')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="exampleInputEmail1">Email address</label>
                    {!! Form::email('email',$student->email,[
                        'class' => 'form-control',
                        'placeholder' => 'Enter email',
                    ]) !!}
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                    <span class="text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="fullname">Phone no</label>
                    {!! Form::tel('phone',$student->phone,[
                        'class' => 'form-control',
                        'placeholder' => 'Enter number',
                    ]) !!}
                    <span class="text-danger">
                        @error('phone')
                        {{$message}}
                        @enderror
                    </span>
                </div>


                <div class="form-group">
                    <label class="font-weight-bold" for="">Gender</label><br>
                    {!! Form::radio('gender', 'Male', $student->gender === 'Male') !!} Male

                    {!! Form::radio('gender', 'Female', $student->gender === 'Female') !!} Female
                </div>
                <br>
                <div class="form-group">
                    <label class="font-weight-bold" for="teacher_id">Present Teachers</label>

                    @foreach($student->teachers as $teacher)

                        <a href="{{route('teachers.show', $teacher->id )}}" class="text-white"><li>
                            {{ $teacher->name }}</li>
                        </a>

                    @endforeach
                </div>
                <div>
                    <label class="font-weight-bold">Select Teachers</label>
                    <div class="d-flex flex-column">
                        @foreach($teachers as $teacher)
                            <div class="form-check mr-3">
                                {!! Form::checkbox('teacher_id[]', $teacher->id, null,
                                    [
                                        'class' => 'form-check-input'
                                    ])
                                !!}
                                <label for="teacher_id" class="form-check-label">{{ $teacher->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <span class="text-danger">
                        @error('teacher_id')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <br>
                <div class="form-group">
                    <label class="font-weight-bold" for="address">Course</label>
                    {!! Form::text('course',$student->course,[
                        'class' => 'form-control',
                        'placeholder' => 'Enter course',
                    ]) !!}
                    <span class="text-danger">
                        @error('course')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="address">Year</label>
                    {!! Form::text('year',$student->year,[
                        'class' => 'form-control',
                        'placeholder' => 'Enter Year',
                    ]) !!}
                    <span class="text-danger">
                        @error('year')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="address">Address</label>
                    {!! Form::text('address',$student->address,[
                        'class' => 'form-control',
                        'placeholder' => 'Enter address',
                    ]) !!}
                    <span class="text-danger">
                        @error('address')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="image">Upload Image</label><br>
                    <div>{{$student->image}}</div>
                    {!! Form::file('image',[
                        'class' => 'form-control',
                        'accept' => 'image/*'
                    ]) !!}
                </div>
             <button type="submit" class="btn btn-primary" id="showAlertBtn">Submit</button>
             <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    {!! Form::close() !!}
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
