@extends('layouts.app')

@section('title', 'Add a new student')

@section('content')
  <h1>Add new Student</h1>
  <div class="text-left">
    <a href="{{ route('student.get.index') }}" class="btn btn-outline-primary">Back to list</a>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger mt-3">
      {{ $errors->first() }}
    </div>
  @endif
  <form class="mt-3" method="post" action="{{ route('student.post.create') }}">
    <div class="mb-3">
      <label for="txtFullname" class="form-label">Fullname</label>
      <input type="text" class="form-control" id="txtFullname" name="txtFullname">
    </div>
    <div class="mb-3">
      <label for="dateBirthday" class="form-label">Birthday</label>
      <input type="date" class="form-control" id="dateBirthday" name="dateBirthday">
    </div>
    <div class="mb-3">
      <label for="txtAddress" class="form-label">Address</label>
      <input type="text" class="form-control" id="txtAddress" name="txtAddress">
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
