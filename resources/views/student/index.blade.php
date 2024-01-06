@extends('layouts.app')

@section('content')

    <div class="container mt-5">
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
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Course</th>
                    <th class="text-center">Year</th>
                    {{-- <th>Address</th> --}}
                    <th class="text-center">Teacher</th>
                    <th class="text-center">Created at</th>
                    <th class="text-center">Updated at</th>
                    <th colspan="2" class="text-center">Actions</th>
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
                        {{-- <td class="overflow">{{$student->address}}</td> --}}
                        <td>
                            <ul>
                                @foreach($student->teachers as $teacher)

                                    {{-- <a href="{{route('teachers.show', $teacher->id )}}">
                                    </a> --}}
                                    <li>{{ $teacher->name }}</li>

                                @endforeach
                            </ul>
                        </td>
                        <td>{{$student->created_at}}</td>
                        <td>{{$student->updated_at}}</td>
                        <td>
                            <a href="{{route('students.edit', [$student->id])}}">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg"style="width:30px;" alt="edit"></a>
                        </td>
                        <td>
                            <form action="{{ route('students.destroy', [$student->id]) }}" method="post" onsubmit="return showCancelAlert()">
                                @method('DELETE')
                                @csrf
                                <button type="submit" style="border:none;" id="showAlertBtn">
                                    <img style="width:30px;" src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" alt="">
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
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

@endsection
