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

    <p>Hello, This is index page</p>

    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif

    @if (Auth::guest())
    <p>I'm a guest</p>
    @else
    <p>I'm logged in</p>
    @endif

    <a href="{{ URL::action('UserController@getLogin') }}" class="btn btn-default" role="button">Log in</a>
    <a href="{{ URL::action('UserController@getRegister') }}" class="btn btn-default" role="button">Register</a>
    <a href="{{ URL::action('UserController@getChangePassword') }}" class="btn btn-default" role="button">Change password</a>
    <a href="{{ URL::action('UserController@getLogout') }}" class="btn btn-default" role="button">Logout</a>
    

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>



    

      
