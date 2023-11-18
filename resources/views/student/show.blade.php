<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    {{-- @vite('public/assets/profile.css'); --}}
    <link rel="stylesheet" href="{{ asset('assets/profile-28d7eed7.css') }}">
</head>
<body>
    <pre>
    <?php
    // print_r($students);
    ?>
    </pre>
    <div class="profile-container" style="background-color:#1C6E9F;">
        <button class="close-btn"><a href="{{route('students.index');}}">&times;</a></button>
        <img class="profile-image" src="{{ url('storage/images/'.$students->image) }}" alt="Profile Image"/>
        <div class="profile-details">
            <h2>{{$students->name}}</h2>
            <p><b>Email:</b>  {{$students->email}}</p>
            <p><b>Location:</b>  {{$students->address}}</p>
            <p><b>Phone:</b>  {{$students->phone}}</p>
            <p><b>Gender:</b>  {{$students->gender}}</p>
            <p><b>Course:</b>  {{$students->course}}</p>
            <p><b>Year:</b>  {{$students->year}}</p>
            <p><b>Created at:</b>  {{$students->created_at}}</p>
            <p><b>Last update:</b>  {{$students->updated_at}}</p>
        </div>
        <br>
        <div>
            <a href="{{route('students.edit',[$students->id])}}"><img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg" style="width:43px;"alt="edit button"></a>
        </div>
    </div>
</body>
</html>
