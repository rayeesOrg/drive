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
            <h4 class="panel-title">Please Sign Up Here</h4>
          </div>

            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="panel-body">
              <form class="form-horizontal" method="POST" action="register">
                {!! csrf_field() !!}
                <div class="col-md-6"> 
                  <div class="form-group">
                    <label for="inputtitle" class="col-md-4 control-label"> Title</label>
                    <div class="col-md-3">
                      <select class="form-control" name="title" value="{{ old('title') }}">
                        <option selected value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                      </select>
                    </div>
                  </div>                

                  <div class="form-group">
                    <label for="inputfirstname" class="col-md-4 control-label">First Name</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="first_name" id="inputfirstname" value="{{ old('first_name') }}" placeholder="Enter First Name..." />
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputlastname" class="col-md-4 control-label">Last Name</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="last_name" id="inputlastname" value="{{ old('last_name') }}" placeholder="Enter Last Name..." />
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputemail" class="col-md-4 control-label">E-mail</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="email" id="inputemail" value="{{ old('email') }}" placeholder="Enter E-mail...">
                      </div> 
                  </div>

                  <div class="form-group">
                    <label for="inputpassword" class="col-md-4 control-label">Password</label>
                      <div class="col-md-8">
                        <input type="password" name="password" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="inputpassword_confirm" class="col-md-4 control-label">Confirm Password</label>
                      <div class="col-md-8">
                        <input type="password" name="password_confirm" class="form-control" >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputdateofbirth" class="col-md-4 control-label"> Date of Birth</label>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-5">
                            <select name="dob" value="{{ old('dob') }}" class="form-control">
                              <option value="">January</option>
                              <option value="">February</option>
                              <option value="">March</option>
                              <option value="">April</option>
                              <option value="">May</option>
                              <option selected value="">April</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <select name="dob" value="{{ old('dob') }}" class="form-control">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                              <option selected value="">3</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <select name="dob" value="{{ old('dob') }}" class="form-control">
                              <option value="">1980</option>
                              <option value="">1981</option>
                              <option value="">1982</option>
                              <option value="">1983</option>
                              <option value="">1984</option>
                              <option selected value="">1982</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  </div>
                </div><!-- /.col-md-6 -->

                  <div class="col-md-6"> 
                    <div class="form-group">
                      <label for="inputaddress" class="col-md-4 control-label">Address</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="address" id="inputaddress" rows="3" value="{{ old('address') }}"></textarea>  
                        </div>
                    </div>                
                    
                    <div class="form-group">
                      <label for="inputtown" class="col-md-4 control-label">Town</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="town" id="inputtown" value="{{ old('town') }}" placeholder="Enter Town .." />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputcounty" class="col-md-4 control-label">County</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="county" id="inputcounty" value="{{ old('county') }}" placeholder="Enter County.." />
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputpostcode" class="col-md-4 control-label">Postcode</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="postcode" id="inputCounty" value="{{ old('postcode') }}" placeholder="Enter postcode e.g. TW14 8ED" />
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="inputmob_no" class="col-md-4 control-label">Mobile No*</label>
                        <div class="col-md-8">
                          <input type="tel" class="form-control" name="mob_no" id="inputmob" value="{{ old('mob_no') }}" placeholder="Enter Mobile No...">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputtel_no" class="col-md-4 control-label">Telphone No</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="tel_no" id="inputtel_no" value="{{ old('tel_no') }}" placeholder="Enter Telphone No...">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="inputrole" class="col-md-4 control-label">Role</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="role" id="inputrole" value="{{ old('role') }}" placeholder="Enter Telphone No...">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputall_locations" class="col-md-4 control-label">Work Locations</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="all_locations" id="inputall_locations" rows="3" value="{{ old('all_locations') }}"></textarea>  
                        </div>
                    </div>
                  </div> <!-- /.col-md-6 -->
                  
                  <div class= "form-group">
                    <div class="col-sm-offset-2 col-sm-8 control-label">
                      <div class="checkbox">
                        <label><input type="checkbox"> I agree to the Terms of Use</label>
                      </div>
                    </div>
                  </div>

                  <div class="panel-footer"> 
                  <div class="form-group">
                    <div class="regbutton col-md-4">
                      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span>Submit</button>
                    </div> 
                  </div> 
                </div>
              </form> <!-- /.form end tag -->
            </div> <!-- /.pannel-body closed -->
          </div> <!-- /.panel pane;-default -->
        </div> <!-- /.row -->
      </div> <!-- /.container --><!-- /.row -->

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
  </body>
</html>



    

      
