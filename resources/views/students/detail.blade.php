@extends('layouts.app')

@section('title', 'Detail for student {{ $student->fullname }}')

@section('content')
  <h1>Detail for student {{ $student->fullname }}</h1>
  <div class="text-left">
    <a href="{{ route('student.get.index') }}" class="btn btn-outline-primary">Back to list</a>
  </div>
  <p>{{ $student->id }}</p>
  <p>{{ $student->fullname }}</p>
  <p>{{ $student->birthday }}</p>
  <p>{{ $student->address }}</p>

@endsection
