<!doctype html>
<html>
	<head>
		<title>EDITED</title>
		<link rel= "stylesheet" type ="text/css" href="admin.css"> 
	</head>
	
	<body>
		<div id="header"><h2>EDIT PAGE</h2> </div>          
		<?php
			$host = $_POST['host'];
			$user = $_POST['user'];
			$password = $_POST['password'];
			$dbname =$_POST['dbname'];
			
			$id = $_POST['Id'];
			$description = $_POST['newDescription'];
			$remedy = $_POST['newRemedy'];
			
			$cxn = mysqli_connect($host, $user, $password, $dbname)
			or die ("Connection failed".mysqli_error($cxn));	
			
			
			$query = "UPDATE `pattern_table`.`patterns` 
			SET `Description`='$description', `Remedy`='$remedy' WHERE `Id`='$id';";
			
			$result = mysqli_query($cxn, $query)
			or die("Coudn't execute query. ".mysqli_error($cxn));
			
			
			if($result){
				echo "<p>Updated</p>";
				}else{
				echo "<p>NOT updated</p>\n<p>The entered information is following</p>\n";
				echo "<p>Description: </p>";
			echo $description;
			echo "<p>Remedy: </p>";
			echo $remedy;
			}
			?>
			
			<p><a href ="edit_top.php">Return to the top page</a></p>
			</body>
			
			</html>			