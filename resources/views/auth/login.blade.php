<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ URL::asset('items/bootstrap-3.3.5/css/bootstrap.css') }}">

    <title>Drive</title>
  </head>
  <body style="background:#d2d6de;">  
    <div class="container">
      <p><br/></p>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="page-header">
                <h3>Login Here!</h3>
              </div> <!-- /.page-header -->
              <form method="POST" action="login">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1="><span class="glyphicon glyphicon-user"></span></span>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Email or Username">
                  </div> <!-- /.input-group -->
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-star"></span></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div> <!-- /.input-group -->
                </div> <!-- /.form-group -->

                <hr/>
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>Back</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span>Login</button>
                <p><br/></p>
              </form>
            </div> <!-- /.panel-body -->
          </div>  <!-- /.panel .panel-default -->
        </div> <!-- /.col-md-4 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
   </body>
</html>