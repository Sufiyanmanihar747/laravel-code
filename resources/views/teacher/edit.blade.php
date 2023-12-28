<!DOCTYPE html>

<head>
    <title>Update page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="
background: linear-gradient(180deg, #1A335D 0%, #1EAAE2 100%);">
    {{-- @dd($teacher); --}}

    <div class="progress mt-auto" style="display: none;">
        <div class="progress-bar bg-success" id="progressBar" style="width: 0;"></div>
    </div>
        {!! Form::open([
            'route' => ['teachers.update', $teacher->id], 
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
                    {!! Form::text('name',$teacher->name,[
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
                    {!! Form::email('email',$teacher->email,[
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
                    <label class="font-weight-bold" for="fullname">Subject</label>
                    {!! Form::text('subject',$teacher->subject,[
                        'class' => 'form-control',
                        'placeholder' => 'Subject',
                    ]) !!}
                    <span class="text-danger">
                        @error('subject')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="teacher_id">Present Students</label>
                    @foreach($teacher->students as $student)
                        <a href="{{route('students.show', $student->id )}}" class="text-white"><li>
                            {{ $student->name }}</li>
                        </a>
                    @endforeach
                    <label class="font-weight-bold">Select Teachers</label>
                    <div class="d-flex flex-column">
                        @foreach($students as $student)
                            <div class="form-check mr-3">
                                {!! Form::checkbox('student_id[]', $student->id, null,
                                    [
                                        'class' => 'form-check-input'
                                    ])
                                !!}
                                <label  for="teacher_id" class="form-check-label">{{ $student->name }}</label>
                            </div>
                        @endforeach   
                    </div>
                    <span class="text-danger">
                        @error('teacher_id')
                        {{$message}}
                        @enderror
                    </span>
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

<script>
    function closeAutoCloseAlert() {
        $('#autoCloseAlert').hide();
        $('#progressBar').parent().hide();
        $('#showAlertBtn').show();
    }

    function showAlertWithProgressBar() {
        $('#autoCloseAlert').show();
        $('#progressBar').parent().show();

        const duration = 5000;

        const progressIncrement = (100 / duration) * 100;

        let progress = 0;
        const progressBar = $('#progressBar');
        const interval = 100;

        const updateProgressBar = setInterval(() => {
            progress += progressIncrement;
            progressBar.css('width', progress + '%');
            if (progress >= 100) {
                clearInterval(updateProgressBar);
                closeAutoCloseAlert();
            }
        }, interval);
    }
    $('#showAlertBtn').click(showAlertWithProgressBar);
</script>

</html>
