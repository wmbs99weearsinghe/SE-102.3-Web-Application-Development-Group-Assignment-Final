<?php

session_start();
include_once("config.php");
if ( isset($_POST['btnsave']) ){

  $title = $_POST['title'];
  $f_name = cleanInputs($_POST['inputFName']);
  $l_name = cleanInputs($_POST['inputLName']);
  $address1 = cleanInputs($_POST['address1']);
  $address2 = cleanInputs($_POST['address2']);
  $city = cleanInputs($_POST['inputCity']);
  $zip = cleanInputs($_POST['inputZip']);
  $country = cleanInputs($_POST['inputCountry']);
  $phone = cleanInputs($_POST['inputPhone']);
  $email = $_POST['inputEmail'];
  $conf_email = $_POST['inputConfEmail'];
  $password = $_POST['inputPassword'];
  $conf_password = $_POST['inputConfPassword'];    
  $hashedPassword = md5($password.$salt);

  if ($email !== $conf_email) {
    $result = "Emails are not matched!";
    $resultType = "danger";
  }
  if ($conf_password !== $password) {
    $result = "Passwords are not matched!";
    $resultType = "danger";
  }

  if(validateText($f_name) && validateText($l_name) && validateText($city) && validateText($zip) && validateText($country) && validateText($phone)){
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    $q1 = "INSERT INTO users VALUES ('$email','$title','$f_name','$l_name', '$address1', '$address2', '$city', '$zip', '$country', '$phone')";
    $q2 = "INSERT INTO credentials VALUES('$email','$hashedPassword', 'active')";
    if( mysqli_query($connection,$q1) && mysqli_query($connection,$q2) ){
      $_SESSION['logged'] = true;
      $_SESSION['user'] = $email;
      header("location: reservation.php");
    }
    else{
      echo "fail".mysqli_error($connection);
    }
    mysqli_close($connection);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign-Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style>
      .form-control {
        min-height: 41px;
        background: #f2f2f2;
        box-shadow: none !important;
        border: transparent;
      }
      .form-control:focus {
        background: #e2e2e2;
      }
      .form-control, .btn {        
        border-radius: 2px;
      }
      .login-form {
        width: 800px;
        margin: 30px auto;

      }
      .login-form h2 {
        margin: 10px 0 25px;
      }
      .login-form form {
        color: #7a7a7a;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 15px;
      }

      .required {
        color: red;
      }
      .login-form a {
        color: #fff;
        text-decoration: underline;
      }
      .login-form a:hover {
        text-decoration: none;
      }
      .login-form form a {
        color: #7a7a7a;
        text-decoration: none;
      }
      .login-form form a:hover {
        text-decoration: underline;
      }

    </style>

    <style type="text/css">
      form * {
        border-radius:0 !important;
      }

      form > fieldset > legend {
        font-size:120%;
      }    </style>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
          if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
          else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
      </script>
    </head>
    <body>
      <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');            
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
    })();
  </script>

  <div style="height: 10px;"></div>
  <p class="text-right">Back to <a href="Home.html">HOME</a></p>
  <div style="background-color: #3598dc; ">
   <div style="height: 2px;"></div>
   <div class="login-form">
      <form action="" method="post" class="needs-validation" novalidate>
        <h2 class="text-center">Register</h2>   

        <?php if( isset($_POST['btnsave'])){ ?>
          <div class="alert alert-<?php echo $resultType; ?>">
            <?php echo $result; ?>
          </div>
        <?php } ?>

        <legend>Personal Information</legend>

        <div class="form-group row">
          <label for="inputTitle" class="col-sm-6 col-form-label">Title<span aria-hidden="true" class="required">*</span></label>
          <label for="inputTest" class="col-sm-6 col-form-label"></label>                  
          <div class="col-sm-6">
            <select class="form-control" id="exampleFormControlSelect1" name="title">
              <option value="Mr">Mr.</option>
              <option value="Miss">Miss.</option>
              <option value="Mrs">Mrs.</option>
              <option value="Ms">Ms.</option>
              <option value="Dr">Dr.</option>
              <option value="Prof">Prof.</option>
            </select>
          </div>

        </div>

        <div class="form-group row">
          <label for="inputFName" class="col-sm-6 col-form-label">First Name<span aria-hidden="true" class="required">*</span></label>
          <label for="inputLName" class="col-sm-6 col-form-label">Last Name<span aria-hidden="true" class="required">*</span></label>                  
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="First Name" required>
            <div class="invalid-feedback">Please enter your First Name.</div>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputLName" name="inputLName" placeholder="Last Name" required>
            <div class="invalid-feedback">Please enter your Last Name.</div>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputaddress1" class="col-sm-6 col-form-label">Address Line 1</label>
          <label for="inputaddress2" class="col-sm-6 col-form-label">Address Line 2</label>                  
          <div class="col-sm-6">
            <input type="text" class="form-control" name="address1" placeholder="Address Line 1" >            
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="address2" placeholder="Address Line 2" >
          </div>
        </div>

        <div class="form-group row">
          <label for="inputCity" class="col-sm-6 col-form-label">City<span aria-hidden="true" class="required">*</span></label>
          <label for="inputZip" class="col-sm-6 col-form-label">Zip code<span aria-hidden="true" class="required">*</span></label>                  
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="City" required>
            <div class="invalid-feedback">Please enter your City</div>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Zip code" required>
            <div class="invalid-feedback">Please enter the Zip Code</div>
          </div>
        </div>


        <div class="form-group row">
          <label for="inputCountry" class="col-sm-6 col-form-label">Country<span aria-hidden="true" class="required">*</span></label>
          <label for="inputPhone" class="col-sm-6 col-form-label">Phone<span aria-hidden="true" class="required">*</span></label>                  
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputCountry" name="inputCountry" placeholder="Country" required>
            <div class="invalid-feedback">Please enter your Country.</div>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone" required>
            <div class="invalid-feedback">Please enter a valid phone number.</div>
          </div>
        </div>

        <legend>Login Information</legend>

        <div class="form-group row">
          <label for="inputEmail" class="col-sm-6 col-form-label">Email<span aria-hidden="true" class="required">*</span></label>
          <label for="inputConfEmail" class="col-sm-6 col-form-label">Confirm Email<span aria-hidden="true" class="required">*</span></label>                  
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputConfEmail" name="inputConfEmail" placeholder="Confirm Email" required>
            <div class="invalid-feedback">Confirm Email not valid.</div>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword" class="col-sm-6 col-form-label">Password<span aria-hidden="true" class="required">*</span></label>
          <label for="inputConfPassword" class="col-sm-6 col-form-label">Confirm Password<span aria-hidden="true" class="required">*</span></label>                  
          <div class="col-sm-6">
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
            <div class="invalid-feedback">Please enter a valid Password.</div>
          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control" id="inputConfPassword" name="inputConfPassword"  required>
            <div class="invalid-feedback">Confirm Password not valid.</div>
          </div>
        </div>


        <div class="form-group row">                
          <div class="col-sm-8">
            <p aria-hidden="true" id="required-description">
              <span aria-hidden="true" class="required">*</span>Required fields
            </p>
          </div>
          <div class="col-sm-4">
            <button name="btnsave" type="submit" class="btn btn-success btn-lg btn-block">Register</button>
          </div>
        </div>


      </form>

    </div>
    <div style="height: 1px;"></div>
  </div>

  <div style="height: 10px;"></div>
</body>
</html>
