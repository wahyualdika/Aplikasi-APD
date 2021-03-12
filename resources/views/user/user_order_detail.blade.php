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
        <form action="{{route('order_cancel',['id' => $order->id])}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="Order ID">Order ID</label>
              <input type="text" class="form-control" id="order" aria-describedby="alamatHelp" placeholder="Order ID" name="order_id" value="{{$order->id}}" disabled>
            </div>
            <div class="form-group">
              <label for="Order ID">Product Name</label>
              <input type="text" class="form-control" id="order" aria-describedby="productNameHelp" placeholder="Product Name" name="product_id" value="{{$order->products->product_name}}" disabled>
            </div>
            <div class="form-group">
              <label for="Order ID">Order Status</label>
              @if($order->order_status == 1)
              <input type="text" class="form-control" id="order" aria-describedby="orderStatusHelp" placeholder="Order Status" name="order_status" value="Ordered" disabled>
              @else
              <input type="text" class="form-control" id="order" aria-describedby="orderStatusHelp" placeholder="Order Status" name="order_status" value="Canceled" disabled>
              @endif
            </div>
            <div class="form-group">
              <label for="Order ID">Order By</label>
              <input type="text" class="form-control" id="order" aria-describedby="orderedByHelp" placeholder="Ordered By" name="ordered_by" value="{{$order->users->name}}" disabled>
            </div>
            <div class="form-group">
              <label for="tanggalLahir">Tanggal Lahir</label>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$order->created_at}}" name="order_created" disabled>
            </div>
            <button class="btn btn-primary" type="submit">Cancel Order</button>
        </form>
        </div>
      </div>
    </div>


  </body>
</html>
