<!DOCTYPE html>

<head>
    <title>Update </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="progress mt-auto" style="display: none;">
        <div class="progress-bar bg-success" id="progressBar" style="width: 0;"></div>
    </div>

        {!! Form::open(['route' => ['students.update', $student->id]]) !!}
        @method('PUT')
        @csrf
    
        <div class=" my-2  d-flex justify-content-center">
            <div class="form-control p-3 col-md-6">
                <h3 class="text-center">Update form</h3>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
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
                    <label for="exampleInputEmail1">Email address</label>
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
                    <label for="fullname">Phone no</label>
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


                <div class="form-control">
                    <label for="gender">Gender</label><br>
                    {!! Form::radio('gender',$student->gender=='Male'? 'checked':'',[
                        'class' => 'form-control',
                    ]) !!} Male
    
                    {!! Form::radio('gender',$student->gender=='Female'? 'checked':'',[
                        'class' => 'form-control',
                    ]) !!} Female
                </div>
                <br>
              
                <div class="form-group">
                    <label for="address">Course</label>
                    {!! Form::text('course','',[
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
                    <label for="address">Year</label>
                    {!! Form::text('year','',[
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
                    <label for="address">Address</label>
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
             <button type="submit" class="btn btn-primary" id="showAlertBtn">Submit</button>
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