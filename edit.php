<!doctype html>
<html>
	<head>
		<title>Edit page</title>
		<link rel= "stylesheet" type ="text/css" href="admin.css"> 
		
	</head>
	
	<body>
		<div id="header"><h2>EDIT PAGE</h2> </div>          
		<?php
			if( $_GET['Id'] )
			{
				echo '<p> Chosen ID : ' . $_GET['Id']. '</p>';		
			}
			
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
			
			$description;
			
		$remedy;
		
		while ($data = mysqli_fetch_array($result)) {
		echo '<p> ID: ' .$data['Id'] . "</p>\n";
		//echo '<p> Description: </p><p>' .$data['Description'] . "</p>\n";
		$description = $data['Description'];
		$remedy = $data['Remedy'];
		}
		/*<input type ="text" name="newDescription" value ="<?php echo $description?>" class ="inputNewDescription" >*/
		/*<?php echo "<p>$remedy</p>" ?>*/
		?>	
		<form action = "update.php" method ="post">
        Edit the description;
		<br>
		<textarea class ="inputNewDescription" 
		name="newDescription" wrap ="soft" ><?php echo $description ?></textarea>
		<br>
		Edit the remedy;
		<br>
		<input type ="text" name= "newRemedy" value ="<?php echo $remedy ?>" class ="inputNewRemedy">
		<br>
		
		<input type ="hidden" name ="Id" value ="<?php echo $Id ?>">
		<input type ="hidden" name ="host" value ="<?php echo $host ?>">
		<input type ="hidden" name ="user" value ="<?php echo $user ?>">
		<input type ="hidden" name ="password" value ="<?php echo $password ?>">
		<input type ="hidden" name ="dbname" value ="<?php echo $dbname ?>">
		
        <input type="submit" value="EDIT" />
		</form>
		
		
		<?php
		mysqli_close($cxn);
		echo "(Test done)";	
		?>
		
		</body>
		
		</html>		