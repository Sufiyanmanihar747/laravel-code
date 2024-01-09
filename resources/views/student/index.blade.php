@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 5rem!important;">
    {{-- <div class="col-12 text-left d-flex justify-content-end align-items-center rounded"
        style="background-image: linear-gradient(91.53deg, #1A335D 0%, #1EAAE2 100%"> --}}

        {{-- <a href="{{ route('students.create')}}">
            <button class="btn btn-warning text-white my-3 text-dark">Add student</button>
        </a> --}}
    {{-- </div> --}}
    <table class="table border shadow-sm table-responsive">
        <thead>
            <tr style="height:23px">
                <th class="text-center py-0" style="vertical-align:middle">Name</th>
                <th class="text-center py-0" style="vertical-align:middle">Email</th>
                <th class="text-center py-0" style="vertical-align:middle">Phone</th>
                <th class="text-center py-0" style="vertical-align:middle">Gender</th>
                <th class="text-center py-0" style="vertical-align:middle">Course</th>
                <th class="text-center py-0" style="vertical-align:middle">Year</th>
                {{-- <th>Address</th> --}}
                <th class="text-center py-0" style="vertical-align:middle">Teacher</th>
                {{-- <th class="text-center py-0" style="vertical-align:middle">Created at</th>
                <th class="text-center py-0" style="vertical-align:middle">Updated at</th> --}}
                <th colspan="2" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)

            <tr class="shadow-lg">
                <td class="py-2" style="vertical-align:middle"><a
                        href="{{ route('students.show', [$student->id]) }}">{{$student->name}}</a></td>
                <td class="py-2 px-3" style="vertical-align:middle">
                    {{-- <div class="d-inline-block text-truncate" style="max-width: 100px;"> --}}
                        {{$student->email}}
                    {{-- </div> --}}
                </td>
                <td class="py-2 px-3" style="vertical-align:middle">{{$student->phone}}</td>
                <td class="py-2 px-3" style="vertical-align:middle">{{$student->gender}}</td>
                <td class="py-2 px-3" style="vertical-align:middle">{{$student->course}}</td>
                <td class="py-2 px-3" style="vertical-align:middle">{{$student->year}}</td>
                {{-- <td class="py-2 px-3" style="vertical-align:middle" class="overflow">{{$student->address}}</td>
                --}}
                <td class="py-2" style="vertical-align:middle">
                    <div class="d-inline-block text-truncate" style="max-width: 100px;">
                        @foreach($student->teachers as $teacher)
                        {{-- <a href="{{route('teachers.show', $teacher->id )}}">
                        </a> --}}
                        {{ $teacher->name }}
                        @endforeach
                    </div>
                </td>
                {{-- <td class="py-2 px-3" style="vertical-align:middle">{{$student->created_at}}</td>
                <td class="py-2 px-3" style="vertical-align:middle">{{$student->updated_at}}</td> --}}
                <td class="py-2 px-3" style="vertical-align:middle">
                    <a href="{{route('students.edit', [$student->id])}}">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg"
                            style="width:20px;" alt="edit"></a>
                </td>
                <td class="py-2 px-3" style="vertical-align:middle">
                    <form action="{{ route('students.destroy', [$student->id]) }}" method="post"
                        onsubmit="return showCancelAlert()">
                        @method('DELETE')
                        @csrf
                        <button type="submit" style="border:none;" id="showAlertBtn">
                            <img style="width:20px;" src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png"
                                alt="">
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
