<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">

    <title>Drive</title>

    <p>Hello, This is login page</p>

    <!-- resources/views/auth/login.blade.php -->
<!-- <form method="POST" action="/auth/login"> -->
    <form method="POST" action="login">
      {!! csrf_field() !!}

      <div>
          Email
          <input type="email" name="email" value="{{ old('email') }}">
      </div>

      <div>
          Password
          <input type="password" name="password" id="password">
      </div>

      <div>
          <input type="checkbox" name="remember"> Remember Me
      </div>

      <div>
          <button type="submit">Login</button>
      </div>
    </form>

    



  </head>
  <body>

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>



    

      
