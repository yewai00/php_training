<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create page</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h3 class="mb-3">Create a student</h3>
        <form action="{{ url('students') }}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="f-name">First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="f-name" value="{{ old('first_name')}}">
            @error('first_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="l-name">Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="l-name" value="{{ old('last_name')}}">
            @error('last_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email')}}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="Phone">Phone Number</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone')}}">
            @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address')}}">
            @error('address')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="major">Major</label>
            <select class="form-select @error('major') is-invalid @enderror" name="major_id">
              @foreach ($majors as $major)
                @if (old('major_id') == $major->id)
                  <option value="{{ $major->id }}" selected>{{ $major->name }}</option>
                @else
                  <option value="{{$major->id}}">{{ $major->name }}</option>
                @endif
              @endforeach
          </select>
          </div>
          <input type="submit" value="Create" class="btn btn-success">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

</body>
</html>