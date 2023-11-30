<!DOCTYPE html>

<head>
    <title>Teacher's Form</title>
    <!-- <link rel="stylesheet" href="{{ asset('bootstrap.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    {!! Form::open([
        'url' => route('teachers.store'),
        'files' => 'true',
        'method' => 'post',
        ]) !!}
        <!-- <pre>
            @php
            print_r($errors->all());
            @endphp
        </pre> -->
        @csrf
        <div class=" my-2  d-flex justify-content-center">
            <div class="form-control px-3 py-1 col-md-6">
                <h3 class="text-center">Registration form</h3>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    {!! Form::text('name','',[
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
                    <label for="email">Email</label>
                    {!! Form::email('email','',[
                        'class' => 'form-control',
                        'placeholder' => 'Enter your email'
                    ])!!}
                    <span class="text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="email">Subject</label>
                    {!! Form::text('subject','',[
                        'class' => 'form-control',
                        'placeholder' => 'Subject'
                    ])!!}
                    <span class="text-danger">
                        @error('subject')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary" id="showAlertBtn">Submit</button>
                <button type="reset" class="mx-3 btn btn-secondary">Reset</button>
            </div>
        </div>
</body>

</html>