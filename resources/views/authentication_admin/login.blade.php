<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Apotekon</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b3160aeb67.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{asset('css/user_page.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body class="container">
    <div class="row align-items-center">
      <div class="col">
    </div>
    <div class="col">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <form class="" action='{{route('admin.login')}}' method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
          <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email">
          @if($errors->login->has('email'))
            <div class="error">{{ $errors->login->first('email') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password" aria-label="Passwordlogin->first('email')" aria-describedby="basic-addon1" name="password">
          @if($errors->login->has('password'))
            <div class="error">{{ $errors->login->first('password') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck2" name="remember">
            <label class="form-check-label" for="dropdownCheck2">
              Remember me
            </label>
          </div>
        </div>
        <a href="">Lupa Password?</a>
        <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
        </form>
      </div>
    <div class="col">
    </div>
    </div>
  </body>
</html>
