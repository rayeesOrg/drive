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

  	<p>hi</p>

<!-- {{ $instructors }} -->

@foreach ($instructors as $instructor)
	<p>E-mail: {{ $instructor->email }} </p>
	<p>First name: {{ $instructor->instructor->first_name }} {{ $instructor->instructor->last_name }} </p>
@endforeach

<script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>