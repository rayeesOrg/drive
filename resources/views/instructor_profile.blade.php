<!DOCTYPE html>
<html lang="en"> 
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <!-- .BOOTSTRAP STYLESHEET -->
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> 
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
                  <button type="submit" class="hire_me btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Hire Me</button></br>
                  <b class="glyphicon glyphicon-gbp"></b><b>20</b>GBP/hr <i class="glyphicon glyphicon-pencil"></i> 
                  <hr><h4>Contact info <i class="glyphicon glyphicon-pencil"></i></h4>
                      <p>
                        <b class="glyphicon glyphicon-earphone"></b> Mob: 07799654789 </br>
                        <b class="glyphicon glyphicon-phone-alt"></b> Tel: 02056345678 </br>
                        <b class="glyphicon glyphicon-envelope"></b> mana_badman@gmail.com </br>
                      </p>
                @endif  
                </div><!-- /.col-md-3 -->

                
                <div class="col-xs-12 col-md-6">
                  <blockquote class="info-adj">
                    <h3 class="name">{{ $instructor->instructor->title }} {{ $instructor->instructor->first_name }} {{ $instructor->instructor->last_name }}</h3> 
                    <hr><h4>Work Location <i class="glyphicon glyphicon-pencil"></i></h4>
                      <small><cite title="Source Title">London, United Kingdom<span class="glyphicon glyphicon-map-marker"></span></cite></small>
                    <h4>Areas Taught <i class="glyphicon glyphicon-pencil"></i></h4>
                      <small><cite title="Areas">Kingston, Tiwckenham, Whitton, Hounslow, Feltham,<span class="glyphicon glyphicon-map-marker"></span></cite></small>
                    <hr><h4>Additional Info <i class="glyphicon glyphicon-pencil"></i></h4>
                      <p><b class="glyphicon glyphicon-info-sign"></b> <i>Manual & Automatic</i></p>
                    <hr><h4>Special Offers <i class="glyphicon glyphicon-pencil"></i></h4>
                      <p><i>5 Lessons for £75</i></p>
                  </blockquote>
                </div> <!-- /.col-xs-12 col-md-6 -->

                <div class="col-xs-12 col-md-3 ">
                  <blockquote class="rate well-sm">
                    <div class="row">
                      <h1 class="rating-num">4.0</h1>
                        <div class="rating">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                        <div class="no-of-reviews">
                          <span class="glyphicon glyphicon-user"></span> 34 Reviews
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
                        <div class="stars">  
                          <input class="star star-5" id="star-5" type="radio" name="star"/>  
                          <label class="star star-5" for="star-5"></label>  
                          <input class="star star-4" id="star-4" type="radio" name="star"/>  
                          <label class="star star-4" for="star-4"></label>  
                          <input class="star star-3" id="star-3" type="radio" name="star"/>  
                          <label class="star star-3" for="star-3"></label>  
                          <input class="star star-2" id="star-2" type="radio" name="star"/>  
                          <label class="star star-2" for="star-2"></label>  
                          <input class="star star-1" id="star-1" type="radio" name="star"/>  
                          <label class="star star-1" for="star-1"></label>  
                        </div>
                        <a class="pull-left"><img src="http://www.gravatar.com/avatar/{{ md5($instructor->email) }}?s=80&d=mm" alt="" class="r-img img-circle"></a>
                        <textarea class="form-control r-text" placeholder="Enter your review here..." rows="3"></textarea>
                        <br />
                          <a href="#" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-thumbs-up"></span> Post Review</a>
                          <div class="clearfix"></div>
                          <hr />
                          <ul class="media-list">
                            <li class="media">
                              <a class="pull-left"><img src="http://www.gravatar.com/avatar/{{ md5($instructor->email) }}?s=80&d=mm" alt="My avatar" class="img-circle"></a>
                                <div class="media-body">
                                  <span class="text-muted pull-right"><small class="text-muted">30 min ago</small></span>
                                  <strong class="text-success">@ Rexona Kumi</strong>
                                  <p><i>&quot; &nbsp;Very good instructor. I rate him 4/5&nbsp; &quot;</i></p>
                                  <div class="review_rating">
                                    <span class="data-no">4.0</span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                  </div>
                                  <br />
                                </div>
                            </li> 

                            <li class="media">
                              <a class="pull-left"><img src="" alt="" class="img-circle"></a>
                                <div class="media-body">
                                  <span class="text-muted pull-right"><small class="text-muted">7 hours ago</small></span>
                                  <strong class="text-success">@ John Doe</strong>
                                  <p><i>&quot; &nbsp;Great job done. I passed my test in 2 weeks&nbsp; &quot;</i></p>
                                  <div class="review_rating">
                                    <span class="data-no">4.0</span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                  </div>
                                  <br />
                                </div>
                            </li>

                            <li class="media">
                              <a class="pull-left"><img src="" alt="" class="img-circle"></a>
                                <div class="media-body">
                                  <span class="text-muted pull-right"><small class="text-muted">5 days ago</small></span>
                                  <strong class="text-success">@ Madonae Jonisyi</strong>
                                  <p><i>&quot; &nbsp;He is on budget and time. I would recommend him to all&nbsp; &quot;</i></p>
                                  <div class="review_rating">
                                    <span class="data-no">4.0</span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </div>
                                <br />
                                </div>
                            </li>
                          </ul>
                            <span class="text-danger"> <a href="#">View More Reviews</a></span>
                      </div>
                      <!-- PANEL BODY END--> 
                    </div>
                    <!-- PANEL-PANEL END -->
                </div>
                <!-- REVIEW WRAPPER END -->
              </div>
              <!-- col-xs-12 col-md-8 END -->
              

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
                      <div class="item active">
                        <div class="row-fluid">
                          <table>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="http://www.reddrivingschool.com/wp-content/uploads/Vauxhall-Ampera-Red-Driving-School-car.jpg" alt="Image"></a></div></td>
                          </tr>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="http://www.reddrivingschool.com/wp-content/uploads/Nina-Nesbitt-learning-to-drive.jpg" alt="Image"></a></div></td>
                          </tr>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="http://www.elitedrivingschool.net/wp-content/uploads/2013/03/Car-driving-lessons-Hannah-Charlton.jpg" alt="Image"></a></div></td>
                          </tr>
                          </table>
                        </div><!--/row-fluid-->
                      </div><!--/item-->
                     
                      <div class="item">
                        <div class="row-fluid">
                          <table>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="" alt="Image"></a></div></td>
                          </tr>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="" alt="Image"></a></div></td>
                          </tr>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="http://topwalls.net/wp-content/uploads/2012/01/Nature-sea-scenery-travel-photography-image.jpg" alt="Image"></a></div></td>
                          </tr>
                          </table>
                        </div><!--/row-fluid-->
                      </div><!--/item-->
                     
                      <div class="item">
                        <div class="row-fluid">
                          <table>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="" alt="Image"></a></div></td>
                          </tr>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="" alt="Image"></a></div></td>
                          </tr>
                          <tr>
                          <td><div class="span3"><a href="#x" class="thumbnail"><img src="http://www.reddrivingschool.com/wp-content/uploads/Vauxhall-Ampera-Red-Driving-School-car.jpg" alt="Image"></a></div></td>
                          </tr>
                          </table>
                        </div><!--/row-fluid-->
                      </div><!--/item-->
                      <br />
                    </div><!--/carousel-inner-->        
                </div><!--/myCarousel-->     
              </div><!--/col-xs-12 col-md-4--> 
            </div>
            <!-- ROW END -->

            <div class="panel-footer "> <!-- .footer --> 
              <div class="form-group">
              Links|Link2|Link3|Link4
              </div> 
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

  </body>
</html>



    

      
