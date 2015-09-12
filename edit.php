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
			
			include("MySQL_AccountInformation.php");
			$Id = $_GET['Id'];
			
			$cxn = mysqli_connect($host, $user, $password, $dbname)
			or die ("Connection failed".mysqli_error($cxn));	
			
			$query = "SELECT * FROM pattern_table.patterns WHERE Id = $Id";
			$result = mysqli_query($cxn, $query)
			or die("Coudn't execute query. ".mysqli_error($cxn));
			
			$description;
			$remedy;
			$realLifeExample;
			$affect;
			$manifestation;
			
			while ($data = mysqli_fetch_array($result)) {
				echo '<p> ID: ' .$data['Id'] . "</p>\n";
				//echo '<p> Description: </p><p>' .$data['Description'] . "</p>\n";
				$description = $data['Description'];
				$remedy = $data['Remedy'];
				$realLifeExample = $data['RealLifeExample'];
				$affect = $data['Affect'];
				$manifestation = $data['Manifestation'];
			}
			/*<input type ="text" name="newDescription" value ="<?php echo $description?>" class ="inputNewDescription" >*/
			/*<?php echo "<p>$remedy</p>" ?>*/
		?>	
		<form action = "update.php" method ="post">
			Description;
			<br>
			<textarea class ="inputNewDescription" 
			name="newDescription" wrap ="soft" ><?php echo $description ?></textarea>
			<br>
			Real life example;
			<br>
			<textarea class ="inputRealLifeExample" 
			name="newRealLifeExample" wrap ="soft" ><?php echo $realLifeExample ?></textarea>
			<br>
			Affect;
			<br>
			<textarea class ="inputAffect" 
			name="newAffect" wrap ="soft" ><?php echo $affect ?></textarea>
			<br>
			Manifestation;
			<br>
			<textarea class ="inputManifestation" 
			name="newManifestation" wrap ="soft" ><?php echo $manifestation ?></textarea>
			<br>
			<!-- Edit category, which will be a drop down box -->
			Remedy;
			<br>
			<textarea class ="inputRemedy" 
			name="newRemedy" wrap ="soft" ><?php echo $remedy ?></textarea>
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
		?>
		
		</body>
		
		</html>				