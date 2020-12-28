
<?php
session_start();

include_once("config.php");
$username = "";
$name = "";
if ( (isset($_SESSION['logged']) && $_SESSION['logged']==true) ){
	$username = $_SESSION['user'];
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	$query = "SELECT title, f_name FROM users WHERE email='$username' ";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_array($result)){
		$title = $row['title'];
		$f_name = $row['f_name'];		
		$name = $title.".".$f_name;		
	}
	mysqli_close($connection);
}
else{
	header("location:login.php");
}

if( isset($_POST['btnlogout'])){
	$_SESSION = array(); 
	session_destroy();
	header("location: login.php");
	exit;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Reservation</title>
</head>
<body>

	<h2>Welcome <?php echo $name; ?> !</h2>
	<form action=" " method="post">
		<button name="btnlogout" type="submit" class="btn btn-danger btn-lg btn-block">Log Out</button>
	</form>

</body>
</html>