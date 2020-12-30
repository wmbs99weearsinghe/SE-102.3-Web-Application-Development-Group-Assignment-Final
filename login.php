<?php
session_start();

if ( (isset($_SESSION['logged']) && $_SESSION['logged']==true) ){
  header("location: reservation.php");
  exit;
}
include_once("config.php");
$loginResult = "";
$resultType = "";
if( isset($_POST['btnlogin'])){
  $enteredUsername = $_POST['username'];
  $enteredPassword = $_POST['password'];
  $hashedPassword = md5($enteredPassword.$salt);

  $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  $query = "SELECT email FROM credentials WHERE email='$enteredUsername' AND password='$hashedPassword'";
  $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result) == 1){
    $loginResult = "Login OK";
    $resultType = "success";
    $_SESSION['logged'] = true;
    $_SESSION['user'] = $enteredUsername;
    header("location: reservation.php");
  }
  else{
    $loginResult = "Login Failed!";
    $resultType = "danger";
    $_SESSION['logged'] = false;
  }
  mysqli_close($connection);
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .bs-example{
      margin: 20px;        
    }

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
      width: 350px;
      margin: 30px auto;
      text-align: center;
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
      padding: 30px;
    }
    .login-form .btn {        
      font-size: 16px;
      font-weight: bold;
      background: #3598dc;
      border: none;
      outline: none !important;
    }
    .login-form .btn:hover, .login-form .btn:focus {
      background: #2389cd;
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
    
    #hotel_name{
      color: #A9F5E1;
    }


  </style>



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

  <div style="height: 100px;"></div>
  <p class="text-right">Back to <a href="Home.html">HOME</a></p>
  <div style="background-color: #3598dc; ">
   <div style="height: 20px;"></div>
   <div class="login-form">
    <h1 id="hotel_name">Sea Side South Park</h1>
    <form action=" " method="post" class="needs-validation" novalidate>
      <h2 class="text-center">Login</h2> 

      <?php if( isset($_POST['btnlogin'])){ ?>
        <div class="alert alert-<?php echo $resultType; ?>">
          <?php echo $loginResult; ?>
        </div>
      <?php } ?>


      <div class="form-group has-error">
        <input type="email" class="form-control" name="username" id="inputEmail" placeholder="Email" required="required">
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required="required">
        <div class="invalid-feedback">Please enter your password to continue.</div>
      </div>        
      <div class="form-group">
        <button name="btnlogin" type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
      </div>
      <p><a href="reset.php">Forget your Password?</a></p>
    </form>
    <p class="text-center small">Don't have an account? <a href="signup.php">Sign up here!</a></p>
  </div>
  <div style="height: 20px;"></div>
</div>
</body>
</html>
