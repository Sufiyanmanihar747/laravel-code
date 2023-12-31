@extends('layouts.app')

@section('content')
<!DOCTYPE html>

<head>
    <title>Students Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/studentTable.css')}}">
</head>

<body>
    <div class="progress mt-auto" style="display: none;">
        <div class="progress-bar bg-danger" id="progressBar" style="width: 0;"></div>
    </div>
    <div class="container mt-4">
        <div class="col-12 text-left d-flex justify-content-end align-items-center rounded"
        style="background-image: linear-gradient(91.53deg, #1A335D 0%, #1EAAE2 100%">

        <form class="form-inline my-2 my-lg-0" action="{{route('students.index')}}">
            <input class="form-control mr-sm-2" style="width: 44rem;" name="search" type="search" placeholder="Search name" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Search</button>
        </form>
        <a href="{{ route('students.create')}}"><button class="btn btn-warning text-white my-3 text-dark">Add student</button></a>
        <img src="https://sangamcrm.com/wp-content/uploads/2021/09/Main-LOGO.png" style="width:68px;position: absolute;left: 16px;" alt="">
    </div>
        <table class="table border shadow-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="shadow-lg">
                    <td><a href="{{ route('students.show', [$student->id]) }}">{{$student->name}}</a></td>
                    <td class="overflow">{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->course}}</td>
                    <td>{{$student->year}}</td>
                    <td class="overflow">{{$student->address}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>{{$student->updated_at}}</td>
                    <td>
                        <a href="{{ route('students.edit', [$student->id]) }}"><img
                                src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg"
                                style="width:30px;" alt="edit"></a>
                    </td>
                    <td>
                        <form action="{{ route('students.destroy', [$student->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" style="border:none;"
                                onclick="alert('Are you sure to DELETE this Account!!')" id="showAlertBtn"><img
                                    style="width:30px;" src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png"
                                    alt="">
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- @ddd($student); --}}
                @endforeach
                {{-- @dd($student); --}}
                {{-- {{ddd('dump my article',$student);}} --}}
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12 pagination">
                {{ $students->links() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pagination">
                {{ $students->links() }}
            </div>
        </div>
    </div>
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
@endsection