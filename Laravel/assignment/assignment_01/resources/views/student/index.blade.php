@extends('layouts.app')

@section('content')
  @if(count($students)>0)
    @if(Session('success'))
      <div class="alert alert-success mt-3">
          <strong>{{ Session('success') }}</strong>
      </div>
    @endif
    <a href="{{ url('students/export') }}" class="btn btn-success mt-3 me-4">export file<a>
    <form action="{{ url('students/import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mt-5 input-group">
        <label for="formFile" class="form-label"></label>
        <input class="form-control @error('import_file') is-invalid @enderror" type="file" id="formFile" name="import_file">
        <input type="submit" value="import file" class="btn btn-primary">
        @error('import_file')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </form>
    <table class='table mt-5 table-hover'>
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Major</th>
        <th>Edit and Delete</th>
      </tr>
      @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->major->name}}</td>
        <td> 
          <a href="{{ url('students/'.$student->id.'/edit') }}" class="btn btn-primary btn-sm me-2">Edit</a>
          <form action="{{ url('students/'. $student->id) }}" onsubmit="return confirm('Are you sure to delete?');" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </table>
  @else
      <h4 class="text-danger text-center mt-5">No data in students table</h4>
  @endif
@endsection