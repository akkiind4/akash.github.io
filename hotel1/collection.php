<?php
session_start();
//error_reporting(0);
?>
<html>
<head>
</head>
<body>
<?php
if(isset($_SESSION['email'])){
	
require("general.php");
require("db/connection.php");

	$a="SELECT `hours`,`days` FROM `hotelinfo` WHERE email='{$_SESSION['email']}' ";
	$val = mysqli_query($conn, $a);
	$data = mysqli_fetch_assoc($val);
	//print_r ($data);
	if(!empty($data)){
		$a = $data['hours'];
		$b = $data['days'];
		$c=($a*1000)+($b*15000);
		echo "$c<br>";
		echo '<a href="final.php">Contiunes</a>';
	}
}
?>
</body>
</html>