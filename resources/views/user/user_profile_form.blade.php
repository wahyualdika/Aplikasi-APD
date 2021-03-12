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
        <form action="{{route('edit_profile',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="Alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" aria-describedby="alamatHelp" placeholder="Alamat Rumah" name="alamat" value="{{$user->alamat}}">
            </div>
            <div class="form-group">
              <label for="Jenis Kelamin">Jenis Kelamin</label>
              <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
                @if($user->jenis_kelamin==1)
                  <option  value="1" selected>Laki-Laki</option>
                @else
                  <option  value="2" selected>Perempuan</option>
                @endif
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="tanggalLahir">Tanggal Lahir</label>
              <input type="text" id="datepicker" name="tanggal_lahir" value="{{$user->tanggal_lahir}}">
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="foto">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        </div>
      </div>
    </div>


  </body>
</html>
