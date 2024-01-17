@extends('layouts.app')

@section('content')
<div id="container-for-ajax"></div>
<div class="container" style="margin-top: 4rem!important;">
    <div class=" text-left d-flex justify-content-end align-items-center rounded">
        <a href="{{ route('teachers.create') }}">
            <button class="btn btn-warning text-white mb-2 text-dark">Add Teacher</button>
        </a>
    </div>
    <table id="table" class="table border shadow-sm">
        <thead>
            <tr style="height:23px">
                <th class="text-center py-0" style="vertical-align:middle">Name</th>
                <th class="text-center py-0" style="vertical-align:middle">Email</th>
                <th class="text-center py-0" style="vertical-align:middle">Phone</th>
                <th class="text-center py-0" style="vertical-align:middle">Salary</th>
                <th class="text-center py-0" style="vertical-align:middle">Branch</th>
                <th class="text-center py-0" style="vertical-align:middle">Students</th>
                <th class="text-center ">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr class="shadow-lg">
                <td class="py-2" style="vertical-align:middle"><a href="{{ route('teachers.show', [$teacher->id]) }}">{{
                        $teacher->name }}</a></td>
                <td class="py-2 px-4" style="vertical-align:middle">
                    <!-- {{-- <div class="d-inline-block text-truncate" style="max-width: 100px;"> --}} -->
                        {{ $teacher->email }}
                        <!-- {{-- </div> --}} -->
                </td>
                <td class="py-2 px-4" style="vertical-align:middle">{{ $teacher->phone }}</td>
                <td class="py-2 px-4" style="vertical-align:middle">{{ $teacher->salary }}</td>
                <td class="py-2 px-4" style="vertical-align:middle">{{ $teacher->branch }}</td>
                <td class="py-2" style="vertical-align:middle">
                    <div class="d-inline-block text-truncate" style="max-width: 100px;">
                        @if($teacher->students->isNotEmpty())
                            @foreach ($teacher->students as $student)
                            <a href="{{ route('students.show', $student->id) }}">
                                {{$student->name}}
                            </a>
                            @endforeach
                        @else
                            No student
                        @endif
                    </div>
                </td>
                <td class="py-2 px-4" style="vertical-align:middle">
                    <div class="d-flex">
                        <a href="{{ route('teachers.edit', [$teacher->id]) }}">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg"
                                style="width:20px;" alt="edit"></a>
                        <form action="{{ route('teachers.destroy', [$teacher->id]) }}" method="post"
                            onsubmit="return showCancelAlert()">
                            @method('DELETE')
                            @csrf
                            <button type="submit" style="border:none;" id="showAlertBtn">
                                <img style="width:20px;" src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png"
                                    alt="">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="row">
        <div class="col-md-12 pagination">
            {{ $teachers->links() }}
        </div>
    </div> --}}
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<td>

</td>
@endsection
