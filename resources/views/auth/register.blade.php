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

    <p>Hello, This is registration page</p>

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="register">
      {!! csrf_field() !!}

      <div>
          Title
          <input type="text" name="title" value="{{ old('title') }}">
      </div>

      <div>
          First name
          <input type="text" name="first_name" value="{{ old('first_name') }}">
      </div>

      <div>
          Last name
          <input type="text" name="last_name" value="{{ old('last_name') }}">
      </div>

      <div>
          Date of birth
          <input type="text" name="dob" value="{{ old('dob') }}">
      </div>

      <div>
          address
          <input type="text" name="address" value="{{ old('address') }}">
      </div>

      <div>
          town
          <input type="text" name="town" value="{{ old('town') }}">
      </div>

      <div>
          county
          <input type="text" name="county" value="{{ old('county') }}">
      </div>

      <div>
          postcode
          <input type="text" name="postcode" value="{{ old('postcode') }}">
      </div>

      <div>
          mob_no
          <input type="text" name="mob_no" value="{{ old('mob_no') }}">
      </div>

      <div>
          tel_no
          <input type="text" name="tel_no" value="{{ old('tel_no') }}">
      </div>

      <div>
          role
          <input type="text" name="role" value="{{ old('role') }}">
      </div>

      <div>
          Locations
          <input type="text" name="all_locations" value="{{ old('all_locations') }}">
      </div>

      <div>
          Email
          <input type="email" name="email" value="{{ old('email') }}">
      </div>

      <div>
          Password
          <input type="password" name="password">
      </div>

      <div>
          Confirm Password
          <input type="password" name="password_confirm">
      </div>

      <div>
          <button type="submit">Register</button>
      </div>
    </form>


    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>



    

      
