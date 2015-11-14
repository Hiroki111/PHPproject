<!doctype html>
<html>
	<head>
		<title>Edit page</title>
		<link rel= "stylesheet" type ="text/css" href="Admin.css"> 
		
	</head>
	
	<body>
		<div id="header"><h2>EDIT PAGE</h2> </div>          
		<?php
			if( $_GET['Id'] )
			{
				echo '<p> Chosen ID : ' . $_GET['Id']. '</p>';		
			}
			
			include(dirname(__DIR__).'/MySQL_AccountInformation.php');
			$Id = $_GET['Id'];
			
			$cxn = mysqli_connect($host, $user, $password, $dbname)
			or die ("Connection failed".mysqli_error($cxn));	
			
			$query = "SELECT * FROM pattern_table.patterns WHERE Id = $Id";
			$result = mysqli_query($cxn, $query)
			or die("Coudn't execute query. ".mysqli_error($cxn));
			
			$patternName;
			$description;
			$remedy;
			$realLifeExample;
			$affect;
			$manifestation;
			$sideEffect;
			$qualityIssueName;
			
			while ($data = mysqli_fetch_array($result)) {
				$patternName = $data['PatternName'];
				$description = $data['Description'];
				$remedy = $data['Remedy'];
				$realLifeExample = $data['RealLifeExample'];
				$affect = $data['Affect'];
				$manifestation = $data['Manifestation'];
				$sideEffect = $data['SideEffect'];
				$qualityIssueName = $data['QualityIssueName'];
			}
			
		?>	
		<form action = "Update.php" method ="post">
			Patten Name
			<br>
			<textarea class ="inputNewPatternName" 
			name="newPatternName" wrap ="soft" ><?php echo $patternName ?></textarea>
			<br>
			Description;
			<br>
			<textarea class ="inputNewDescription" 
			name="newDescription" wrap ="soft" ><?php echo $description ?></textarea>
			<br>
			Real life example;
			<br>
			<textarea class ="inputNewItems" 
			name="newRealLifeExample" wrap ="soft" ><?php echo $realLifeExample ?></textarea>
			<br>
			Affect;
			<br>
			<textarea class ="inputNewItems" 
			name="newAffect" wrap ="soft" ><?php echo $affect ?></textarea>
			<br>
			Manifestation;
			<br>
			<textarea class ="inputNewItems" 
			name="newManifestation" wrap ="soft" ><?php echo $manifestation ?></textarea>
			<br>
			Remedy;
			<br>
			<textarea class ="inputNewItems" 
			name="newRemedy" wrap ="soft" ><?php echo $remedy ?></textarea>
			<br>
			Side Effect;
			<br>
			<textarea class ="inputNewItems" 
			name="newSideEffect" wrap ="soft" ><?php echo $sideEffect ?></textarea>
			<br>
			Quality Issue Name
			<br>
			<textarea class ="inputNewItems" 
			name="newQualityIssueName" wrap ="soft" ><?php echo $qualityIssueName ?></textarea>
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