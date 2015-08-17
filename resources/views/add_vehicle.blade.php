<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">

    <title>Drive</title>

  </head>
  <body>

  	@if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="add-vehicle">
      {!! csrf_field() !!}

      <div>
          Registration number
          <input type="text" name="reg_no">
      </div>

      <div>
          Make
          <input type="text" name="make">
      </div>

      <div>
          Model
          <input type="text" name="model">
      </div>

      <div>
          Transmission
          <input type="text" name="transmission">
      </div>

      <div>
          <button type="submit">Add</button>
      </div>
    </form>


  	<script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>
