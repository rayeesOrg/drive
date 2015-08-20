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

  	<p>Instructor Profile</p>

  	@if (session('message'))
      <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
        {{ session('message') }}
      </div>
    @endif

  	@if (count($instructor) > 0)
	  	@foreach ($instructor as $profile)
	  		<img src="http://www.gravatar.com/avatar/{{ md5($profile->email) }}?s=200&d=mm" alt="My avatar">
	  		{{ $profile->instructor->title }} {{ $profile->instructor->first_name }} {{ $profile->instructor->last_name }} 

          @foreach ($vehicles as $vehicle)
            <p>{{ $vehicle->make }}</p>
          @endforeach
	  	@endforeach
    @endif

	<p>
	<a href="{{ URL::action('InstructorController@getAddVehicle') }}" class="btn btn-default" role="button">Add a vehicle</a>
	</p>
	
  	<script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>