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
  <body class="body">
      <div class="container">
        <div class="row">
          <div class="col">
            <a href="{{route('user_orders_list',['id' => Auth::user()->id])}}">
            <div class="daftar-belanja">
              <h4 class="daftar-belanja-title">Order</h4>
              <i class="fas fa-shopping-cart fa-5x fa-cart-custom"></i>
            </div>
            </a>
          </div>
          <div class="col">
            <a href="{{route('product_page')}}"><div class="belanja">
              <h4 class="belanja-title">Belanja</h4>
              <i class="fas fa-pills fa-w-18 fa-5x fa-pill-custom"></i>
            </div></a>
          </div>
        </div>
      </div>
    <div class="container">
      <div class="row">
        <div class="modal fade bd-example-modal-lg" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$user->name}}" name="nama" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Alamat</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$user->alamat}}" name="alamat" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$user->email}}" name="email" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Lahir</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$user->tanggal_lahir}}" name="tanggal_lahir" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                  </div>
                  <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin" disabled>
                    @if($user->jenis_kelamin==1)
                      <option  value="1" selected>Laki-Laki</option>
                    @else
                      <option  value="2" selected>Perempuan</option>
                    @endif
                    <option value="1">Laki-Laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <a class="btn btn-primary" href="{{route('edit_profile_form',['id' => $user->id])}}" role="button">Edit <i class="fas fa-user-edit"></i><a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="user_panel">
      <div class="img_profile">
          @if(isset(Auth::user()->foto))
            <img class="circular--square" src="{{asset(Auth::user()->foto)}}" />
          @else
            <img class="circular--square" src="{{asset('img/profile-example/example.png')}}" />
          @endif
      </div>
      <div class="data-area">
          <a class="btn btn-warning" href="#"  data-toggle="modal" data-target="#profileModal" role="button">Profil <i class="far fa-id-badge"></i><a>
      </div>
      <div class="logout_area">
          <a class="btn btn-danger" href="{{route('logout')}}" role="button">Logout <i class="fas fa-power-off"></i><a>
      </div>

    </div>

  </body>
</html>
