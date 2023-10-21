<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        .profile-container {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: start;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .profile-image {
            max-width: 150px;
            border-radius: 50%;
        }

        .profile-details {
            margin-top: 20px;
        }

        .profile-details h2 {
            color: white;
            margin: 0;
            text-align: center
        }

        .profile-details p {
            color: white;
            margin: 10px 0;
        }

        .bio {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="profile-container" style="background-color:#1C6E9F;">
        <img class="profile-image" src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Profile Image">
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
