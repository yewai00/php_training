<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Assignment</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href='{{ url("students") }}'>Student List</a>
              <a class="btn btn-success offset-md-8" href='{{ url("emails/toincharge") }}'>Mail To Incharge</a>
              <a class="btn btn-success" href='{{ url("students/create") }}'>Create Student</a>
            </div>
        </nav>
      </div>
    </div>
    @yield('content')
  </div>

</body>
</html>