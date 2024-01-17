@extends('layouts.app')

@section('content')
  <div id="container-for-ajax"></div>
  <div class="container" style="margin-top: 4rem!important;">
    <div class=" text-left d-flex justify-content-end align-items-center rounded">
      <a href="{{ route('students.create') }}">
        <button class="btn btn-warning text-white mb-2 text-dark">Add student</button>
      </a>
    </div>
    <table id="table" class="table border shadow-sm ">
      <thead>
        <tr style="height:23px">
          <th class="text-center py-0" style="vertical-align:middle">Name</th>
          <th class="text-center py-0" style="vertical-align:middle">Email</th>
          <th class="text-center py-0" style="vertical-align:middle">Phone</th>
          <th class="text-center py-0" style="vertical-align:middle">Gender</th>
          <th class="text-center py-0" style="vertical-align:middle">Course</th>
          <th class="text-center py-0" style="vertical-align:middle">Year</th>
          <th class="text-center py-0" style="vertical-align:middle">Teacher</th>
          <th class="text-center ">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
          <tr class="shadow-lg">
            <td class="py-2" style="vertical-align:middle"><a
                href="{{ route('students.show', [$student->id]) }}">{{ $student->name }}</a></td>
            <td class="py-2 px-4" style="vertical-align:middle">
              {{-- <div class="d-inline-block text-truncate" style="max-width: 100px;"> --}}
              {{ $student->email }}
              {{-- </div> --}}
            </td>
            <td class="py-2 px-4" style="vertical-align:middle">{{ $student->phone }}</td>
            <td class="py-2 px-4" style="vertical-align:middle">{{ $student->gender }}</td>
            <td class="py-2 px-4" style="vertical-align:middle">{{ $student->course }}</td>
            <td class="py-2 px-4" style="vertical-align:middle">{{ $student->year }}</td>
            <td class="py-2" style="vertical-align:middle">
              <div class="d-inline-block text-truncate" style="max-width: 100px;">
                @foreach ($student->teachers as $teacher)
                  {{ $teacher->name }}
                @endforeach
              </div>
            </td>
            <td class="py-2 px-4" style="vertical-align:middle">
              <div class="d-flex">
                <a href="{{ route('students.edit', [$student->id]) }}">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Edit_Notepad_Icon.svg" style="width:20px;"
                    alt="edit"></a>
                <form action="{{ route('students.destroy', [$student->id]) }}" method="post"
                  onsubmit="return showCancelAlert()">
                  @method('DELETE')
                  @csrf
                  <button type="submit" style="border:none;" id="showAlertBtn">
                    <img style="width:20px;" src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" alt="">
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
            {{ $students->links() }}
        </div>
    </div> --}}
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
