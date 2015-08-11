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
        <div class="col-md-6">
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
              <form class="form-horizontal">
                <div>
                    Title
                    <input type="text" name="title" value="{{ old('title') }}">
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

                <div>
                    Date of birth
                    <input type="text" name="dob" value="{{ old('dob') }}">
                </div>

                <div>
                    address
                    <input type="text" name="address" value="{{ old('address') }}">
                </div>

                <div>
                    town
                    <input type="text" name="town" value="{{ old('town') }}">
                </div>

                <div>
                    county
                    <input type="text" name="county" value="{{ old('county') }}">
                </div>

                <div>
                    postcode
                    <input type="text" name="postcode" value="{{ old('postcode') }}">
                </div>

                <div>
                    mob_no
                    <input type="text" name="mob_no" value="{{ old('mob_no') }}">
                </div>

                <div>
                    tel_no
                    <input type="text" name="tel_no" value="{{ old('tel_no') }}">
                </div>

                <div>
                    role
                    <input type="text" name="role" value="{{ old('role') }}">
                </div>

                <div>
                    Locations
                    <input type="text" name="all_locations" value="{{ old('all_locations') }}">
                </div>

                <div>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Confirm Password
                    <input type="password" name="password_confirm">
                </div>
              </form>
            </div>

            <div class="panel-footer">
              <div class="form-group">
                <div class="regbutton col-md-12">
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </div>
              </div> 
            </div>

          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="items/bootstrap-3.3.5/js/jquery-1.11.3.js"></script>
    <script src="items/bootstrap-3.3.5/js/bootstrap.js"></script>
  </body>
</html>



    

      
