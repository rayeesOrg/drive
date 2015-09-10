<!DOCTYPE html>
<html lang="en"> 
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <!-- .BOOTSTRAP STYLESHEET -->
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> 
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- .CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/style.css') }}">
    <title>Drive</title>
  </head> 
  
  <body>
    <div class="container"> <!-- /.container -->
      <div class="row"> <!-- /.row -->
        <div class="panel panel-primary"> <!-- .panel pane-primary -->
          <div class="panel-heading">
            <h4 class="panel-title">Instructor Profile</h4>
          </div>

          <div class="panel-body"> <!-- .pannel-body -->
            <div class="row info">
              <div class="profile col-md-3">      
              @if (count($instructor) > 0)              
                <img src="http://www.gravatar.com/avatar/{{ md5($instructor->email) }}?s=200&d=mm" alt="My avatar" class="img-rounded img-responsive">
                <hr>
                <button type="submit" class="hire_me btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Book Lesson</button></br>
                <button type="submit" class="hire_me btn btn-success" data-target="#msgModal" data-toggle="modal"><span class="glyphicon glyphicon-envelope"></span> Send Message</a></button></br>
                <b class="glyphicon glyphicon-gbp"></b><b>20</b> GBP/hr <i class="glyphicon glyphicon-pencil"></i> 
                <hr><h4>Contact info <i class="glyphicon glyphicon-pencil"></i></h4>
                <p>
                  <b class="glyphicon glyphicon-earphone"></b> Mob: {{ $instructor->instructor->mob_no }} </br>
                  <b class="glyphicon glyphicon-phone-alt"></b> Tel: {{ $instructor->instructor->tel_no }} </br>
                  <b class="glyphicon glyphicon-envelope"></b> {{ $instructor->email }} </br>     
                </p>
              @endif  
              </div><!-- /.col-md-3 -->

              <div class="col-xs-12 col-md-6">
                <blockquote class="info-adj">
                  <h3 class="name">{{ $instructor->instructor->title }} {{ $instructor->instructor->first_name }} {{ $instructor->instructor->last_name }}</h3> 
                  <hr><h4>Work Location <i class="glyphicon glyphicon-pencil"></i></h4>
                    <small><cite title="Source Title">{{ $instructor->instructor->work_location }}<span class="glyphicon glyphicon-map-marker"></span></cite></small>
                  <h4>Areas Taught <i class="glyphicon glyphicon-pencil"></i></h4>
                    <small><cite title="Areas">{{ $instructor->instructor->all_locations }}<span class="glyphicon glyphicon-map-marker"></span></cite></small>
                  <hr><h4>Additional Info <i class="glyphicon glyphicon-pencil"></i></h4>
                    <p><b class="glyphicon glyphicon-info-sign"></b> <i>Manual & Automatic</i></p>
                  <hr><h4>Special Offers <i class="glyphicon glyphicon-pencil"></i></h4>
                    <p><i>5 Lessons for £75</i></p>
                      <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                      </ul>  
                </blockquote>
              </div> <!-- /.col-xs-12 col-md-6 -->

              <div class="col-xs-12 col-md-3 ">
                <blockquote class="rate well-sm">
                  <div class="row">
                    <!-- Rounding the average rating to 1 d.p. -->
                    <h1 class="rating-num">{{ round($avg_rating, 1) }}</h1>
                      <div class="rating">
                        <span class="stars2" title="{{ round($avg_rating, 1) }}">
                          <span class="stars1" style="width:{{$avg_rating/5*100}}%;"/>
                        </span>
                      </div>
                      <div class="no-of-reviews">
                        <span class="glyphicon glyphicon-user"></span> {{ $total_reviews }} Reviews
                      </div>
                      <hr>
                      <div class="stats">
                        <li class="on_time">
                          <h4><span class="item-stats-value">95%</span><span class="item-stats-name">On Time</span></h4>
                        <li class="on_budget">
                          <h4><span class="item-stats-value">97%</span><span class="item-stats-name">On Budget</span></h4>
                        <hr>
                        <li class="learners_hired">
                          <h4><span class="item-stats-value">231 </span><span class="item-stats-name">No of Hires</span></h4>
                        <li class="profile_views">
                          <h4><span class="item-stats-value">346 </span><span class="item-stats-name">Profile Views</span></h4>
                      </li>
                      </div>
                  </div>                  
                </blockquote>
              </div> <!-- /.col-xs-12 col-md-3 -->
            </div> <!-- /.row -->
          </div> <!-- /.panel body -->

          <div class="row">
            <div class="col-xs-12 col-md-8">
              <!-- Review WRAPPER START -->
              <div class="review-wrapper">
                <div class="panel panel-primary">
                  <div class="panel-heading"><h5>Recent Reviews</h5></div>
                    <div class="panel-body">
                      <!-- Displays the form errors -->
                      <div>
                        @if (count($errors) > 0)
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                        @endif
                      </div>
                      <!-- Checking if the current user is authenticated and a learner -->
                      @if (Auth::check() && Auth::user()->role === 'learner')
                        <!-- Review form -->
                        <form method="POST" action="/review/add-review">
                          {!! csrf_field() !!}
                          <div class="stars">  
                            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>  
                            <label class="star star-5" for="star-5"></label>  
                            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>  
                            <label class="star star-4" for="star-4"></label>  
                            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>  
                            <label class="star star-3" for="star-3"></label>  
                            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>  
                            <label class="star star-2" for="star-2"></label>  
                            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>  
                            <label class="star star-1" for="star-1"></label>  
                          </div>
                          <a class="pull-left"><img src="http://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?s=80&d=mm" alt="" class="r-img img-circle"></a>
                          <textarea class="form-control r-text" placeholder="Enter your review here..." rows="3" name="review">{{ old('review') }}</textarea>
                          <!-- Hidden form field for instructor_id -->
                          <input type="hidden" name="instructor_id" value="{{ $instructor->instructor->instructor_id }}">
                          <br />
                          <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-thumbs-up"></span> Post Review</button>
                        </form>
                        <div class="clearfix"></div>
                        <hr />
                      @endif
                      <ul class="media-list">
                      @foreach ($reviews as $review)
                        <li class="media">
                          <a class="pull-left"><img src="http://www.gravatar.com/avatar/{{ md5($review->learner->user->email) }}?s=80&d=mm" alt="My avatar" class="img-circle"></a>
                            <div class="media-body">
                              <span class="text-muted pull-right"><small class="text-muted">{{ $review->created_at }}</small></span>
                              <strong class="text-success">{{ $review->learner->first_name }} {{ $review->learner->last_name }}</strong>
                              <p><i>&quot; &nbsp;{{ $review->review }}&nbsp; &quot;</i></p>
                              <div class="review_rating">
                                <span class="data-no">{{ $review->rating }}.0</span>
                                <span class="stars2" title="{{ round($review->rating, 1) }}">
                                  <span class="stars1" style="width:{{$review->rating/5*100}}%;"/>
                                </span>
                              </div>
                              <br />
                            </div>
                        </li>
                      @endforeach
                      </ul>
                      <!-- Pagination links -->
                      {!! $reviews->render() !!}
                          <!-- <span class="text-danger"> <a href="#">View More Reviews</a></span> -->
                    </div>
                    <!-- PANEL BODY END--> 
                  </div>
                  <!-- PANEL-PANEL END -->
              </div>
              <!-- REVIEW WRAPPER END -->
            </div>
            <!-- col-xs-12 col-md-8 END -->

            @if(count($images) === 0)
              {{-- Empty space if there are no images for the instructor--}}
            @else
            <div class="col-xs-12 col-md-4">               
              <div id="myCarousel" class="carousel vertical slide" >
                <ol class="carousel-indicators-top">
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">▲</a>
                </ol>
                <ol class="carousel-indicators">
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">▼</a>
                </ol>     
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                    @foreach (array_chunk($images->all(), 3) as $key => $item)
                    <div class="item {{ $key === 0? 'active' : '' }}">
                      <div class="row-fluid">
                        <table>
                        @foreach ($item as $image)
                          <tr>
                          <td><div class="span3"><a href="#" data-target="#imgModal" data-toggle="modal" class="thumbnail"><img src="/storage/app/{{ $image->name }}" alt="Image" class="getSrc"></a></div></td>
                          </tr>
                        @endforeach
                        </table>
                      </div><!--/row-fluid-->
                    </div><!--/item-->
                    @endforeach
                    <br />
                  </div><!--/carousel-inner-->        
              </div><!--/myCarousel-->     
            </div><!--/col-xs-12 col-md-4--> 
            @endif
          </div>
   
    		  <!--modal img-->
    		  <div tabindex="-1" class="modal fade" id="imgModal" role="dialog" aria-hidden="true">
    		    <div class="modal-dialog">
    		      <div class="modal-content">
    		        <div class="modalimg-body">
                <button class="close" aria-hidden="true" type="button" data-dismiss="modal">x</button>
    		        <img src="" alt="Image" class="img-responsive" id="showPic">
    		        </div>
    		      </div>     
    		    </div>
    		  </div> <!-- /.modal img -->
          
          <!--modal email message-->
          <div tabindex="-1" class="modal fade" id="msgModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                  <h1 class="text-center">Fill in the Details Below </h1>
                </div>
                <br />
                </hr>
                <form class="form-horizontal" name="commentform" method="post" action="send_form_email.php">
                  <div class="form-group">
                    <label class="control-label col-md-4" for="first_name">First Name</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4" for="last_name">Last Name</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4" for="email">Email Address</label>
                    <div class="col-md-6 input-group">
                    <span class="input-group-addon">@</span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4" for="comment">Question or Comment</label>
                    <div class="col-md-6">
                    <textarea rows="6" class="form-control" id="comments" name="comments" placeholder="Your question or comment here"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                    <button type="submit" value="Submit" class="btn btn-primary pull-right" id="send_btn"><span class="glyphicon glyphicon-envelope"></span> Submit Email</button>
                    </div>
                  </div>                
                      </div>
                    </div>
                  </div> <!-- /.modal email message --> 
          
          <!-- ROW END -->
          <div class="panel-footer "> <!-- .footer -->
          </div><!-- /.footer -->
        </div> <!-- /.panel panel-primary -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
    
    <!-- REQUIRED SCRIPTS FILES -->
    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-transition.js"></script> 
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
        $('.getSrc').click(function(){
           var src = $(this).attr('src'); 
           $('#showPic').attr('src', src);
        });
    </script>
    <script>
      $('#send_btn').popover({content: 'Thank You'},'click'); 
    </script>
  </body>
</html>



    

      
