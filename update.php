<!doctype html>
<html>
<head>
<title>EDIT</title>
</head>

<body>

<?php
	$host ="localhost";
	$user ="root";
	$password ="c53160";
	$dbname ="pattern_table";
	$Id = $_GET['Id'];
	
	$cxn = mysqli_connect($host, $user, $password, $dbname)
		or die ("Connection failed".mysqli_error($cxn));	
	
	$query = "UPDATE `pattern_table`.`patterns` 
	SET `Remedy`='Remedy is _____.' WHERE `Id`='1';";


?>
</body>

</html>