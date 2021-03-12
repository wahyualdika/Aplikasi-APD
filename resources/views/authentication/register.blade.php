<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Apotekon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </head>
  <body class="container">
    <div class="row align-items-center">
    <div class="col">
    </div>
    <div class="col">
      <form class="" action='{{route('register')}}' method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="exampleDropdownFormEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="username">
          @if($errors->register->has('username'))
            <div class="error">{{ $errors->register->first('username') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleDropdownFormName" class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="name">
          @if($errors->register->has('name'))
            <div class="error">{{ $errors->register->first('name') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleDropdownFormPassword" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
          @if($errors->register->has('password'))
            <div class="error">{{ $errors->register->first('password') }}</div>
          @endif
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Register</button>
        </form>
      </div>
      <div class="col">
      </div>
    </div>
  </body>
</html>
