<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
    <title>Drive</title>

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
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
              
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>                    
                      </ul>
                  </li>
                </ul>
        
              <div class="col-sm-3 col-md-3 pull-right">
                <form class="navbar-form" role="search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                      <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
                </form>
              </div>        
              </div>
            </nav>
          </div>   
    
     <div class="container" id="cnt1">
      <div class="row feature">
	@foreach ($instructors as $instructor)
      <div class="col-md-3">
	    <div>
	      <img src="http://www.gravatar.com/avatar/{{ md5($instructor->email) }}?s=200&d=mm" alt="My avatar" class="img-circle img-thumbnail">
	      <h3>{{ $instructor->instructor->title }} {{ $instructor->instructor->first_name }} {{ $instructor->instructor->last_name }}</h3>
	      <p>               
	        Areas taught: {{ $instructor->instructor->all_locations }} </br>
	        Mob: {{ $instructor->instructor->mob_no }} 
	        @if($instructor->instructor->tel_no != NULL)
	        </br>
	        Tel: {{ $instructor->instructor->tel_no }} </p>
			@else
				</p>
			@endif
	      <a href="{{ URL::action('InstructorController@getProfile') }}/{{ $instructor->user_id }}" class="btn btn-success lower">View Profile</a>
	    </div>
	  </div>	
	 @endforeach
    </div>
    </div>
	<div class="panel-footer"> 
                  <div class="form-group">                  
                      Already Registered ?  <a href="#" >Login here</a>
                  </div> 
                </div>
          </div> <!-- /.panel pane;-default -->
        </div> <!-- /.row -->
      </div> <!-- /.container --><!-- /.row -->

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
  </body>
</html>