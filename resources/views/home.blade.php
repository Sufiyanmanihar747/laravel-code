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
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="d-flex gap-3">
              @if (Auth::user()->is_teacher == 'false')
                <li><a href="{{ route('students.index') }}">Students</a></li>
              @else
                <li><a href="{{ route('students.index') }}">Students</a></li>
                <li><a href="{{ route('teachers.index') }}">Teachers</a></li>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
