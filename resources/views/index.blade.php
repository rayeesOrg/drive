<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> 


    <!-- Bootstrap core CSS -->
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
    <title>Drive</title>

  </head>
  <body class="home-body">
    <nav class="navbar navbar-inverse">
    @if (session('message'))
      <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
        {{ session('message') }}
      </div>
    @endif

    @if (Auth::guest())
    <p class="lstatus pull-right">I'm a guest</p>
    @else
    <p>I'm logged in as {{ Auth::user()->email }} ({{ Auth::user()->role }})</p>
    @endif
    <a href="{{ URL::action('UserController@getLogin') }}" class="btn btn-default" role="button">Log in</a>
    <a href="{{ URL::action('UserController@getRegister') }}" class="btn btn-default" role="button">Register</a>
    <a href="{{ URL::action('UserController@getChangePassword') }}" class="btn btn-default" role="button">Change password</a>
    <a href="{{ URL::action('UserController@getLogout') }}" class="btn btn-default" role="button">Logout</a>
    <a href="{{ URL::action('InstructorController@getIndex') }}" class="btn btn-default" role="button">List of instructors</a>
    <a href="{{ URL::action('InstructorController@getAddImage') }}" class="btn btn-default" role="button">Add Image(Login as instructor first)</a>
    </nav>
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="alert alert-success">
          <ul>*Find Instructors Nearby.</ul>
        </div>
        <form method="" action="">
          <div class="form-group">
            <div class="input-group">
              <input name="track" class="form-control" type="text" placeholder="Enter Your Postcode">
	              <div class="input-group-btn">
	                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
          </div> <!-- /.form-group -->
        </form><!-- /.form -->    
      </div>
       <div id="map-container" class="col-md-8"></div>
    </div>
    </div>
 
   
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>	
 
      function init_map() {
		var var_location = new google.maps.LatLng(45.430817,12.331516);
 
        var var_mapoptions = {
          center: var_location,
          zoom: 14
        };
 
		var var_marker = new google.maps.Marker({
			position: var_location,
			map: var_map,
			title:"Venice"});
 
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
 
		var_marker.setMap(var_map);	
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);
 
    </script>


    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>



    

      
