<!doctype html>
<html>
<head><title>Pattern mining project</title></head>

<body>
<?php 
	if( $_GET['Id'] )
	{
		echo '<p>ID : ' . $_GET['Id']. '</p>';
		
	}

	echo "<p>Populate long text fields</p>\n\n";
	
	$host ="localhost";
	$user ="root";
	$password ="c53160";
	$dbname ="pattern_table";
	$Id = $_GET['Id'];
	
	$cxn = mysqli_connect($host, $user, $password, $dbname)
		or die ("Connection failed".mysqli_error($cxn));
	
	
	
	$query = "SELECT * FROM pattern_table.patterns WHERE Id = $Id";
	$result = mysqli_query($cxn, $query)
		or die("Coudn't execute query. ".mysqli_error($cxn));
	
	while ($data = mysqli_fetch_array($result)) {
		echo '<p> ID: ' .$data['Id'] . ' <p></p> ' .$data['Description'] . "</p>\n";
	}

	
	
	mysqli_close($cxn);
	echo "(Test done)";
?>

</body>

</html>