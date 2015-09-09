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
  <body class="login">  
    <div class="container">
      <p><br/></p>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="page-header">
                <h3>Login </h3>
              </div> <!-- /.page-header -->
              @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form method="POST" action="login">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1="><span class="glyphicon glyphicon-user"></span></span>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                  </div> <!-- /.input-group -->
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-star"></span></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div> <!-- /.input-group -->
                </div> <!-- /.form-group -->
                <a type="button" class="btn btn-success" href="{{ URL::previous() }}"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span>Login</button>
              </form>
                <hr/>
                  <a href="#" data-target="#pwdModal" data-toggle="modal">Forgot My Password</a> |
                  <a href="register"> Make a New Account</a>
                  <!--modal forgot password -->
                  <div tabindex="-1" class="modal fade" id="pwdModal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
                          <h1 class="text-center">What's My Password?</h1>
                        </div>
                        <div class="modalpass-body">
                          <div class="col-md-12">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <div class="text-center">        
                                <p>If you have forgotten your password you can reset it here.</p>
                                  <div class="panel-body">
                                    <fieldset>
                                      <div class="form-group">
                                      <input name="email" class="form-control input-lg" type="email" placeholder="E-mail Address">
                                      </div>
                                      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Send My Password">
                                    </fieldset>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="col-md-12">
                            <button class="btn" aria-hidden="true" data-dismiss="modal">Cancel</button>
                          </div>  
                        </div>
                      </div>
                    </div>
                  </div> <!-- /.modal forgot password -->                  
            </div> <!-- /.panel-body -->
          </div>  <!-- /.panel .panel-default -->
        </div> <!-- /.col-md-4 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->



    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   </body>
</html>