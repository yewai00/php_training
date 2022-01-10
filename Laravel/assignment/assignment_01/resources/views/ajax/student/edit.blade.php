<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>

</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h3 class="mb-3">Edit a student</h3>
        <form action="" method="POST" id="form">
          @csrf
          <div class="form-group mb-3">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
          </div>
          <div class="form-group mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="form-group mb-3">
            <label for="Phone">Phone Number</label>
            <input type="tel" class="form-control" name="phone" id="phone">
          </div>
          <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address">
          </div>
          <div class="form-group mb-3">
            <label for="major">Major</label>
            <select class="form-select" name="major_id">
            </select>
          </div>
          
          <input type="submit" value="Update" class="btn btn-success" id="submit">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- ajax script -->
  <script src="{{ asset('js/edit-ajax.js') }}"></script>
</body>
</html>