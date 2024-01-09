<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-picture {
            text-align: center;
        }

        .profile-picture img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="d-flex justify-content-center ">

    <div class="container profile-container">
        <h2>User Profile</h2>
        <div class="profile-picture">
            <img src="profile-image.jpg"  src="{{ url('storage/images/'.$student->image) }}" alt="Profile Image">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name:</label>
                <p class="form-control-static">{{$student->name}}</p>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <p class="form-control-static">{{$student->email}}</p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone">Phone:</label>
                <p class="form-control-static">{{$student->phone}}</p>
            </div>

            <div class="form-group col-md-6">
                <label for="gender">Gender:</label>
                <p class="form-control-static">{{$student->gender}}</p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="course">Course:</label>
                <p class="form-control-static"> {{$student->course}}</p>
            </div>

            <div class="form-group col-md-6">
                <label for="year">Year:</label>
                <p class="form-control-static"> {{$student->year}}</p>
            </div>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <p class="form-control-static">{{$student->address}}</p>
        </div>

        <div class="form-group">
            <label for="address">Teachers:</label>
            <p class="form-control-static">
                @if($student->teachers->isNotEmpty())
                @foreach($student->teachers as $teacher)
                    {{$teacher->name}},
                @endforeach
            @else
                No teacher
            @endif
            </p>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="created_at">Created At:</label>
                <p class="form-control-static">{{$student->created_at}}</p>
            </div>

            <div class="form-group col-md-6">
                <label for="updated_at">Updated At:</label>
                <p class="form-control-static">{{$student->updated_at}}</p>
            </div>
        </div>


    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

        {{-- <button class="close-btn"><a href="{{route('students.index');}}">&times;</a></button>
        <img class="profile-image" alt="Profile Image"/>

        <br>
        <div>
            <a href="{{route('students.edit',[$student->id])}}"><img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg" style="width:43px;"alt="edit button"></a>
        </div>
    </div> --}}

