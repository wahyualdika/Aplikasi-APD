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
    <nav class="navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="{{route('admin.home')}}">Apotekon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('admin.form.edit',['id' => Auth::user()->id])}}">Edit Profile</a>
              <a class="dropdown-item" href="{{route('admin.form')}}">Add Staff</a>
              <a class="dropdown-item" href="{{route('admin.all')}}">View Staff List</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('admin.users.list')}}">View User List</a>
            </div>
          </li>
        </ul>

          <a class="btn btn-danger" href="{{route('admin.logout')}}" role="button">Logout</a>

      </div>
      <!-- Navbar content -->
    </nav>
    <div class="jumbotron">
      <h1 class="display-4">Hello, Admin</h1>
      <p class="lead">This the home page for administrator to manage the website such as adding product, view product, delete staff list, etc</p>
      <hr class="my-4">
      <p>Please click button below to start your action in this page</p>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="{{route('admin.product.form')}}" role="button">Add Product</a>
            </p>
          </div>
          <div class="col-sm">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="{{route('admin.product.list')}}" role="button">List Product</a>
            </p>
          </div>
          <div class="col-sm">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="{{route('admin.orders.list')}}" role="button">List Order</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
