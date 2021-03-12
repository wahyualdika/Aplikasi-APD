<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Apotekon</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/user_page.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
      $( document ).ready(function() {
        $( "#datepicker" ).datepicker({
          format: 'dd-mm-yyyy'
        });
      });
    </script>
  </head>
  <body class="body">
    <div class="container">
      <div class="row">
        <div class="form-edit-profile">
        <form action="{{route('admin.edit',['id' => $admin->id])}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="Alamat">Name</label>
              <input type="text" class="form-control" id="nameAdmin" aria-describedby="alamatHelp" placeholder="Name" name="admin_name" value="{{$admin->name}}">
            </div>
            <div class="form-group">
              <label for="Alamat">E-Mail</label>
              <input type="email" class="form-control" id="emailAdmin" aria-describedby="emailHelp" placeholder="Email" name="admin_email" value="{{$admin->email}}">
            </div>
            <div class="form-group">
              <label for="Jenis Kelamin">Administrator Status</label>
              <select class="custom-select" id="inputGroupSelect01" name="is_admin">
                @if($admin->is_admin==1)
                  <option  value="1" selected>Admin</option>
                @else
                  <option  value="0" selected>Not Admin</option>
                @endif
                <option value="1">Admin</option>
                <option value="0">Not Admin</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Jenis Kelamin">Staff Status</label>
              <select class="custom-select" id="inputGroupSelect01" name="is_staff">
                @if($admin->is_staff==1)
                  <option  value="1" selected>Staff</option>
                @else
                  <option  value="0" selected>Not Staff</option>
                @endif
                <option value="1">Staff</option>
                <option value="0">Not Staff</option>
              </select>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        </div>
      </div>
    </div>


  </body>
</html>
