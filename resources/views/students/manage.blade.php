@extends('layouts.app')

@section('title', 'Students manage')

@section('content')
  <h1>Student manage</h1>
  <div class="text-left">
    <a href="{{ route('student.get.create') }}" class="btn btn-outline-primary">Add new</a>
  </div>
  <table class="table mt-3  text-left">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Birthday</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($students as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{!! $row->fullname !!}</td>
          <td>{!! $row->birthday !!}</td>
          <td>{!! $row->address !!}</td>
          <td>
            <a href="{{ route('student.get.update', $row->id) }}" class="btn btn-outline-success">
              Edit
            </a>
            <button type="button" class="btn btn-outline-danger ml-1" data-bs-toggle="modal" data-bs-target="#delete-id-{{ $row->id }}">
              Delete
            </button>
            <a href="{{ route('student.get.detail', $row->id) }}" class="btn btn-outline-primary">
              Detail
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3">No products found</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  @foreach($students as $row)
  <div class="modal fade" id="delete-id-{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xác nhận xóa sinh viên</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Bạn có muốn xóa sản phẩm {{ $row->fullname }} không?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
          <a class="btn btn-danger" href="{{ route('student.get.delete', $row->id) }}">Xóa</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
