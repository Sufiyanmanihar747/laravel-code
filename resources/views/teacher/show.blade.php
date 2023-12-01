<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    <pre>
    <?php
    // print_r($teacher);
    ?>
    </pre>
    <div class="profile-container" style="background-color:#1C6E9F;">
        <button class="close-btn"><a href="{{route('teachers.index');}}">&times;</a></button>
        <div class="profile-details">
            <h2>{{$teacher->name}}</h2>
            <p><b>Email:</b>  {{$teacher->email}}</p>
            <p><b>Subject:</b>  {{$teacher->subject}}</p>
            <p><b>Created at:</b>  {{$teacher->created_at}}</p>
            <p><b>Last update:</b>  {{$teacher->updated_at}}</p>
        </div>
        <br>
        <div>
            <a href="{{route('teachers.edit',[$teacher->id])}}"><img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg" style="width:43px;"alt="edit button"></a>
        </div>
    </div>
</body>
</html>