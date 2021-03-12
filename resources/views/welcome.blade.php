<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Apotekon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{asset('css/front_page.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    </head>
    @section('body')
    <body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="#">Apotekon</a>
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('product_page')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        <li class="nav-item">
          @if(Auth::check())
            <a class="nav-link" href="{{route("user_page")}}" tabindex="-1" aria-disabled="false">Home</a>
          @else
            <a class="nav-link" href="{{route("login")}}" tabindex="-1" aria-disabled="false">Login</a>
          @endif
        </li>
      </ul>

    </nav>

    <div id="carouselExampleCaptions" class="carousel slide custom-css-corousel" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('img/1.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/2.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/3.jpg')}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>

    <div class="container">
      <div class="row">
          <div class="adventage-msg">
            <h1>Some Text for adventage off the APp masmcijijeajj jwqjiojciqjjdkf jsa'AIOSJdnen dsfeceakljnjlnenc</h1>
          </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          <div class="adventage-msg">
            <h1>Some Text for adventage off the APp masmcijijeajj jwqjiojciqjjdkf jsa'AIOSJdnen dsfeceakljnjlnenc</h1>
          </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          <div class="adventage-msg">
            <h1>Some Text for adventage off the APp masmcijijeajj jwqjiojciqjjdkf jsa'AIOSJdnen dsfeceakljnjlnenc</h1>
          </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="card-fade-in">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="{{asset('img/3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card-fade-in">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="{{asset('img/3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card-fade-in">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="{{asset('img/3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="card-fade-in">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="{{asset('img/3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card-fade-in">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="{{asset('img/3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <div class="card-fade-in">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('img/3.jpg')}}" class="card-img-top" alt="{{asset('img/3.jpg')}}">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="footer">
    <h6>Footer</h6>
</div>

    </body>
</html>
