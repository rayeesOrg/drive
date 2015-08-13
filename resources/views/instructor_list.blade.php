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

  	<p>List of instructors</p>

	@foreach ($instructors as $instructor)
		<img src="http://www.gravatar.com/avatar/{{ md5($instructor->email) }}?s=200&d=mm" alt="My avatar">
		<p>Name: {{ $instructor->instructor->title }} {{ $instructor->instructor->first_name }} {{ $instructor->instructor->last_name }} </br>
		Areas taught: {{ $instructor->instructor->all_locations }} </br>
		Mob: {{ $instructor->instructor->mob_no }}

		@if($instructor->instructor->tel_no != NULL)
			</br>
			Tel: {{ $instructor->instructor->tel_no }} </p>
		@else
			</p>
		@endif
	@endforeach

	<script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>