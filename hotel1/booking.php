<?php
session_start();
error_reporting(0);
$error = array();
?>
<html>
<head>
</head>
<body>
<?php
if(isset($_SESSION['email'])){ //login

	require('db/connection.php');
	require('general.php');
	$query="SELECT name FROM `hotel` WHERE email='{$_SESSION['email']}' ";
	$val = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($val);
	//echo "$data";
	/*foreach($data as $c){
		print_r($data);
	}*/
	 if(!empty($_POST)){
	$a = $_POST['city'];
	$b = $_POST['floor'];
	$c = $_POST['hours'];
	$d = $_POST['days'];
	$mail = $_SESSION['email'];
	$query="INSERT INTO `hotelinfo` (`email`,`city`,`floor`,`hours`,`days`) VALUES ('{$mail}','{$a}','{$b}',{$c},{$d} )";
		echo $query;
	if(!mysqli_query($conn,$query)){
		$error[] = "Error Inserting info";
		echo mysqli_error($conn);
	}
	else{
		//header("Location:register.php");
		header("Location:collection.php");
		//echo "a";
	 }
	}
 } //$error[]= "Please log in";
require("html/booking.html");
 ?>
 
	<?php
	foreach($error as $er){
		print "<p>".$er."</p>";
	}?>
</body>
</html>