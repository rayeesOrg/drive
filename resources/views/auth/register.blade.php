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
         <h4 class="panel-title">
         Please Sign Up Here</h4>
      </div>

    <div class="panel-body">
    <form class="form-horizontal">

        <div class="form-group">
           <label for="inputfirstname" class="col-md-4 control-label">First Name</label>
             <div class="col-md-8">
                <input type="text" class="form-control" id="inputfirstname" placeholder="Enter First Name..." />
             </div>
        </div>

        <div class="form-group">
           <label for="inputlastname" class="col-md-4 control-label">Last Name</label>
              <div class="col-md-8">
                 <input type="text" class="form-control" id="inputlastname" placeholder="Enter Last Name..." />
              </div>
        </div>

        <div class="form-group">
           <label for="inputscreenname" class="col-md-4 control-label">Screen Name</label>
              <div class="col-md-8">
                 <input type="text" class="form-control" id="inputscreenname" placeholder="Enter Screen Name..." />
              </div>
        </div>


        <div class="form-group">
           <label for="inputpassword" class="col-md-4 control-label">Password</label>
              <div class="col-md-8">
                 <input type="password" name="" class="form-control" value="">
              </div>
        </div>

        <div class="form-group">
           <label for="inputconfirmpassword" class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-8">
                 <input type="password" name="" class="form-control" value="">
              </div>
        </div>

        <div class="form-group">
           <label for="inputdateofbirth" class="col-md-4 control-label"> Date of Birth</label>
              <div class="col-md-8">
                 <div class="row">
                    <div class="col-md-5">
          <select class="form-control" name="">
             <option value="">January</option>
             <option value="">February</option>
             <option value="">March</option>
             <option value="">April</option>
             <option value="">May</option>
             <option selected value="">April</option>
          </select>
                    </div>
          <div class="col-md-3">
          <select name="" class="form-control">
                 <option value="">1</option>
                 <option value="">2</option>
                 <option value="">3</option>
                 <option value="">4</option>
                 <option selected value="">3</option>
          </select>
          </div>
             <div class="col-md-4">
          <select name="" class="form-control">
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

    <div class="form-group">
       <label for="inputgender" class="col-md-4 control-label"> Gender</label> 
          <div class="col-md-8 ">
             <label><input type="radio" name="gender"> Male</label>
             <label><input type="radio" name="gender"> Female</label>
          </div>
    </div>

    <div class="form-group">
       <label for="inputUsername" class="col-md-4 control-label">Country</label>
          <div class="col-md-8">
             <select name="" class="form-control">
              <option value="">Australia</option>
              <option value="">Canada</option>
              <option value="">United Kingdom</option>
              <option selected value="">USA</option>
             </select>
          </div>
    </div>
    
    <div class="form-group">
       <label for="inputemail" class="col-md-4 control-label">E-mail</label>
          <div class="col-md-8">
             <input type="text" class="form-control" id="inputemail" placeholder="Enter E-mail......"></input>
          </div>
    </div>

    <div class="form-group">
       <label for="inputphone" class="col-md-4 control-label">Phone</label>
          <div class="col-md-8">
             <input type="text" class="form-control" id="inputphone" placeholder="Enter Phone......"></input>
          </div>
    </div>
    
    <div class= "form-group">
       <div class="col-md-8 control-label">
           <div class="checkbox">
              <label>
                 <input type="checkbox"> I agree to the Terms of Useeee
              </label>
            </div>
       </div>
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



    

      
