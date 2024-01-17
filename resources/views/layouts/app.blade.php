<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/studentTable.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/passwordEye.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">

</head>

<body style="background-color: #dfdfdf;">
  <div id="app">
    <nav class="p-0 navbar navbar-expand-md shadow-sm position-fixed w-100 z-3 shadow"
      style="backdrop-filter: blur(10px); background-color: #ffffff45;font-weight: bold;">
      <div class="container">
        <a class="navbar-brand p-1" href="{{ url('/') }}">
          <div>
            <img src="https://sangamcrm.com/wp-content/uploads/2021/09/Main-LOGO.png" width="50px" alt=""
              class="mr-5">
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
            @if (request()->is('students*'))
            <a href="{{route('students.index')}}" class="text-dark">Students</a>
            @elseif(request()->is('teacher*'))
            <a href="{{route('teachers.index')}}" class="text-dark">Teachers</a>
            @elseif(request()->is('login*'))
            {{ 'Login' }}
            @elseif(request()->is('/'))
            {{ 'Home' }}
            @else
            {{ 'Registration' }}
            @endif
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto align-items-center">
            <form class="form-inline my-2 my-lg-0" action="{{ route('students.index') }}">
              <input class="form-control mr-sm-2" name="search" type="search"placeholder="Search name"
                aria-label="Search" type="submit">
            </form>

            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <ul class="navbar-nav me-auto gap-4 mr-4">
                {{-- <li><a href="{{route('students.index')}}">Students</a></li> --}}
                {{-- <li><a href="{{route('teachers.index')}}">Teachers</a></li> --}}
              </ul>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
      @yield('content')
    </main>
  </div>
  <script src="{{ asset('jquery.js') }}"></script>
  <script src="{{ asset('assets/js/eye.js') }}"></script>
  <script src="{{ asset('assets/js/alerts.js') }}"></script>
  <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
</body>
<script>

  $(document).ready(function() {
    $('#table').dataTable({
        responsive: true
    });

    //This is for students
    console.log('this is ajax');
        $('#course-student').change(function () {
            console.log('this is running');
            var courseId = $('#course-student').val();
            console.log(courseId);
            $.ajax({
                type: 'GET',
                url: '/getstudents/' + courseId,
                dataType: 'json',

                success: function (data) {
                    console.log(data);
                    var options = '';
                    if ($.isEmptyObject(data)) {
                        $('#student-select').html('');
                    }
                    else{
                        $.each(data, function (key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#student-select').html(options);
                    }
                    console.log(data);
                },
                error: function () {
                    console.log('Error fetching teachers');
                }
            });
        });
  });

  function showCancelAlert() {
    var result = window.confirm('Are you sure to DELETE this Record!!');
    return result;
  }
  document.getElementById('imageInput').addEventListener('change', function() {
    var input = this;
    var reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById('uploadedImage').src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  });

  //This is for teachers
    $(document).ready(function () {
        console.log('this is ajax');
        $('#course-select').change(function () {
            console.log('this is running');
            var courseId = $('#course-select').val();
            console.log(courseId);

            $.ajax({
                type: 'GET',
                url: '/getteachers/' + courseId,
                dataType: 'json',

                success: function (data) {
                    var options = '';
                    if ($.isEmptyObject(data)) {
                        $('#teacher-select').html('');
                    }
                    else{
                        $.each(data, function (key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#teacher-select').html(options);
                    }
                    console.log(data);
                },
                error: function () {
                    console.log('Error fetching teachers');
                }
            });
        });
    });
</script>
</html>
