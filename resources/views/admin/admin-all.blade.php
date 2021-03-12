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
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">List Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.orders.list')}}">Order List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.export.orders')}}">Export Order</a>
      </li>
    </ul>
  </div>
    </nav>

    <div class="container">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Admin Name</th>
                <th scope="col">Admin Email</th>
                <th scope="col">Administrator Status</th>
                <th scope="col">Staff Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
              <tr>
                <th scope="row">{{$admin->name}}</th>
                <td>{{$admin->email}}</td>
                @if($admin->is_admin == 1)
                  <td>Admin</td>
                @else
                  <td>Not admin</td>
                @endif
                @if($admin->is_staff == 1)
                  <td>Staff</td>
                @else
                  <td>Not staff</td>
                @endif
                <td>
                <form class="" action='' method="post">
                    {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger" data-value="" value="submit">Delete</button>
                </form>
              </td>
              </tr>
                @endforeach
            </tbody>
          </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
