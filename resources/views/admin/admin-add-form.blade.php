<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Apotekon</title>
  </head>
  <body>
    <div class="container">
      <form action="{{route('admin.submit')}}" method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="form-group">
          <label for="productName">Admin Name</label>
          <input type="text" name="admin_name" class="form-control" id="adminName" aria-describedby="adminNameHelp" placeholder="Admin Name">
        </div>
        <div class="form-group">
          <label for="productName">Admin Email</label>
          <input type="email" name="admin_email" class="form-control" id="adminName" aria-describedby="adminNameHelp" placeholder="Admin Email">
        </div>
        <div class="form-group">
          <label for="Jenis Kelamin">Administrator Status</label>
          <select class="custom-select" id="inputGroupSelect01" name="is_admin">
            <option value="1">Admin</option>
            <option value="0">Not Admin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Jenis Kelamin">Staff Status</label>
          <select class="custom-select" id="inputGroupSelect01" name="is_staff">
            <option value="1">Staff</option>
            <option value="0">Not Staff</option>
          </select>
        </div>
        <div class="form-group">
          <label for="productName">Admin Password</label>
          <input type="password" name="admin_password" class="form-control" id="adminPassword" aria-describedby="adminPasswordHelp" placeholder="Admin Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
