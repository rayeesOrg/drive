<!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
  <head>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
    <!-- END PAGE LEVEL STYLES -->
    <title>Drive</title>
  </head>     
  <!-- END HEAD -->

  <!-- BEGIN BODY -->
  <body>
  <!-- CONTAINER -->
    <div class="container"> 
      <div class="row">
        <div class="panel panel-default">
          <!-- PANNEL-HEADING TAG -->
          <div class="panel-heading">
            <!-- NAVBAR -->
            <nav class="navbar navbar-default" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                  <a class="navbar-brand" href="#">Company Name</a>
              </div>
              
              <!-- COLLAPSE NAVBAR-COLLAPSE TAG -->
              <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <!-- LISTS -->
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <!-- DROPDOWN LIST -->
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                      <li class="divider"></li>                    
                    </ul>
                  </li> <!-- END DROPDOWN LIST -->
                </ul> <!-- END LISTS -->
                
                <!-- col-sm-3 col-md-3 pull-right -->
                <div class="col-sm-3 col-md-3 pull-right">
                  <!-- SEARCH BAR FORM -->
                  <form class="navbar-form" role="search"> 
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                      <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                    </div>
                  </form> <!-- END SEARCH BAR FORM -->
                </div> <!-- END col-sm-3 col-md-3 pull-right -->    
              </div> <!-- END COLLAPSE NAVBAR-COLLAPSE -->
            </nav> <!-- END NAVBAR -->
          </div> <!-- END PANNEL-HEADING -->
    
          <!-- CONATINER1 TAG -->
          <div class="container" id="container1">
            @if (session('message'))
              <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
                {{ session('message') }}
              </div>
            @endif
            <div class="row feature">
	            @foreach ($instructors as $instructor)
                <div class="col-md-3">
                  <!-- PROFILE TAG -->
	                  <div> 
      	              <img src="http://www.gravatar.com/avatar/{{ md5($instructor->email) }}?s=200&d=mm" alt="My avatar" class="img-circle img-thumbnail">
      	              <h4>{{ $instructor->instructor->title }} {{ $instructor->instructor->first_name }} {{ $instructor->instructor->last_name }}</h4>
      	              <p>               
      	              Areas taught: {{ $instructor->instructor->all_locations }}</br>
      	              Mob: {{ $instructor->instructor->mob_no }}</br>
      	              @if($instructor->instructor->tel_no != NULL)
      	              Tel: {{ $instructor->instructor->tel_no }} 
			        @else
				              </p>
			        @endif
			              <div class="rating well-sm">
                      <div class="row">
                        <div class="list-rating">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                      </div>                  
                    </div>
	                    <a href="{{ URL::action('InstructorController@getProfile') }}/{{ $instructor->user_id }}" class="btn btn-success lower">View Profile</a>
	                  </div> <!-- PROFILE TAG -->
	              </div>	<!-- END col-md-3 -->
	            @endforeach
            </div> <!-- END ROW -->
          </div> <!-- END CONTAINER -->

		      <div class="panel-footer"> <!-- FOOTER TAG -->
	          <div class="form-group">                  
	          Already Registered ?  <a href="#" >Login here</a>
	          </div> 
	        </div> <!-- END FOOTER -->
        </div> <!-- END PANEL PANEL-DEFAULT -->
      </div> <!-- END ROW -->
    </div> <!-- END CONTAINER -->

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>

  </body><!-- END BODY -->
</html> 