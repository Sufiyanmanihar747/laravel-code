@extends('layouts.app')

@section('content')
<div class="modal fade" id="customPopup" tabindex="-1" role="dialog" aria-labelledby="customPopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <p class="text-center">Welcome Back! You are login.</p>
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header font-weight-bold">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="d-flex gap-3 justify-content-center">
              @if (Auth::user()->is_teacher == 'false')
                    <a href="{{ route('students.index') }}" class="w-100 text-dark text-decoration-none">
                        <div class="p-4 rounded-lg text-center" style=" background-color: lime; font-weight:bold;font-size: x-large;">
                            <div>Students Record</div>
                            <div>{{DB::table('students')->count()}}</div>
                        </div>
                    </a>
              @else
                <a href="{{ route('students.index') }}" class="w-100 text-dark text-decoration-none">
                    <div class="p-4 rounded-lg text-center" style=" background-color: lime; font-weight:bold;font-size: x-large;">
                        <div>Students Record</div>
                        <div>{{DB::table('students')->count()}}</div>
                    </div>
                </a>
                <a href="{{ route('teachers.index') }}" class="w-100 text-dark text-decoration-none">
                    <div class="bg-warning p-4 rounded-lg text-center" style="font-weight:bold;font-size: x-large;">
                        <div>Teachers Record</div>
                        <div>{{DB::table('teachers')->count()}}</div>
                    </div>
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
