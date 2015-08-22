<!DOCTYPE html>
<html lang="en"> <!-- .html -->
  <head> <!-- .head -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
    <title>Drive</title>

  </head> <!-- /.head -->
  
  <body>   <!--.body -->
    <div class="container"> <!-- /.Container -->
      <div class="row"> <!-- /.row -->
        <div class="panel panel-primary"> <!-- .panel pane-primary -->
          <div class="panel-heading">
            <h4 class="panel-title">Instructor Profile</h4>
          </div>

            <div class="panel-body"> <!-- .pannel-body -->
              <div class="row info">
                <div class="profile col-md-3">      
                @if (count($instructor) > 0)
                  @foreach ($instructor as $profile)                
                  <img src="http://www.gravatar.com/avatar/{{ md5($profile->email) }}?s=200&d=mm" alt="My avatar" class="img-rounded img-responsive">
                  <hr>
                  <button type="submit" class="hire_me btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Hire Me</button></br>
                  <b class="glyphicon glyphicon-gbp"></b><b>20</b>GBP/hr <i class="glyphicon glyphicon-pencil"></i> 
                  <hr><h4>Contact info <i class="glyphicon glyphicon-pencil"></i></h4>
                      <p>
                        <b class="glyphicon glyphicon-earphone"></b> Mob: 07799654789 </br>
                        <b class="glyphicon glyphicon-phone-alt"></b> Tel: 02056345678 </br>
                        <b class="glyphicon glyphicon-envelope"></b> mana_badman@gmail.com </br>
                      </p>
                  @endforeach
                @endif  
                </div><!-- /.col-md-3 -->
                
                <div class="col-md-6">
                  <blockquote class="info-adj">
                    <h3 class="name">{{ $profile->instructor->title }} {{ $profile->instructor->first_name }} {{ $profile->instructor->last_name }}</h3> 
                    <hr><h4>Work Location <i class="glyphicon glyphicon-pencil"></i></h4>
                      <small><cite title="Source Title">London, united Kingdom<span class="glyphicon glyphicon-map-marker"></span></cite></small>
                    <h4>Areas Taught <i class="glyphicon glyphicon-pencil"></i></h4>
                      <small><cite title="Areas">Kingston, Tiwckenham, Whitton, Hounslow, Feltham<span class="glyphicon glyphicon-map-marker"></span></cite></small>
                    <hr><h4>Additional Info <i class="glyphicon glyphicon-pencil"></i></h4>
                    <p>
                      <b class="glyphicon glyphicon-info-sign"></b> Manual & Automatic 
                    </p>
                  </blockquote>
                </div> <!-- /.col-md-6 -->

                <div class="col-xs-12 col-md-3 ">
                  <div class="rating well-sm">
                    <div class="row">
                      <h1 class="rating-num">4.0</h1>
                        <div class="rating">
                          <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                          </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                          </span><span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                        <div>
                          <span class="glyphicon glyphicon-user"></span>Reviews: 5
                        </div>
                    </div>                  
                  </div>
                </div> <!-- /.col-xs-12 col-md-3 -->
              </div> <!-- /.row -->
            </div> <!-- /.panel body -->
            
            <div class="panel-footer "> <!-- .footer --> 
              <div class="form-group">
              Links|Link2|Link3|Link4
              </div> 
            </div><!-- /.footer -->
        </div> <!-- /.panel pane;-primary -->
      </div> <!-- /.row -->
    </div> <!-- /.container --><!-- /.row -->

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
  </body><!-- /.body -->
</html><!-- /.html -->



    

      
