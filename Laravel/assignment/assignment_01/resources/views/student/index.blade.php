@extends('layouts.app')

@section('content')
@if(Session('success'))
      <div class="alert alert-success mt-3">
          <strong>{{ Session('success') }}</strong>
      </div>
    @endif
    <div class="row mt-4">
      <div class="col-md-10 me-5">
        <form action="{{ url('students/import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class=" input-group">
            <label for="formFile" class="form-label"></label>
            <input class="form-control @error('import_file') is-invalid @enderror" type="file" id="formFile" name="import_file">
            <input type="submit" value="import file" class="btn btn-primary">
            @error('import_file')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </form>
      </div>
      <div class="col">
        <a href="{{ url('students/export') }}" class="btn btn-success float-right">export file<a>
      </div>
    </div><!-- export import-->
      <div class="mt-4">
        <form class="form-inline" action="" method="">
          @csrf
          <div class="row"> 
            <div class="col">
              <label for="keyword">Keyword:</label>
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">
            </div>
            <div class="col">
              <label for="start">Start Date:</label>
              <input class="form-control mr-sm-2" type="date" aria-label="Search" name="start" id="start">   
            </div>
            <div class="col">
              <label for="end">End Date:</label>
              <input class="form-control mr-sm-2" type="date" aria-label="Search" name="end" id="end">
            </div>
            <div class="col-md-1 mt-4">
              <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>      
            </div>
          </div>
        </form>
      </div>
    

  @if(count($students)>0)
    <table class='table mt-5 table-hover table-bordered'>
      <tr class="bg-secondary text-white">
        <th class="col">Id</th>
        <th class="col">First Name</th>
        <th class="col">Last Name</th>
        <th class="col">Email</th>
        <th class="col">Phone</th>
        <th class="col-md-2">Address</th>
        <th class="col">Major</th>
        <th class="col">Created at</th>
        <th class="col">Edit and Delete</th>
      </tr>
      @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->major}}</td>
        <td>{{date('Y/m/d', strtotime($student->created_at))}}</td>
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
      <h4 class="text-danger text-center mt-5">No data found</h4>
  @endif
@endsection