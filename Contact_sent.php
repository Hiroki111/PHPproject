<!doctype html> 
<html> 
    <head> 
        <title>Submission - done</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css"> 
	</head>
	
    <body> 
        <?php 
			include("menu.php");
		?>
        <div id="mainContainer">           
            <div id="content">  
					<h2>Contact Us</h2>     
				<!--
					1, get the posted information.
					2, Access DB 
					3, See if there is something wrong with accessing
					If unsuccessful, warning message 
					
					4. Execute the update query, Show a message 
					"Updata is done, a confirmation email was sent. Return to the top page"
					5. Send email to both the visitor and admin   
				-->
				
				<?php
					$name = $_POST['name'];
					$email = $_POST['email'];
					$affiliation = $_POST['affiliation'];
					$role = $_POST['role'];
					$purposeOfContact = $_POST['purposeOfContact'];
					$year = $_POST['year'];
					$month = $_POST['month'];
					$researchTools = $_POST['researchTools'];
					$familiarityWithProcessMining = $_POST['familiarityWithProcessMining'];
					$datasetAnalysed = $_POST['datasetAnalysed'];
					
					$researchExperience = $year."/".$month;
					
					
					$cxn = mysqli_connect($host, $user, $password, $dbname)
					or die ("Connection failed".mysqli_error($cxn));
					
					$query = "INSERT INTO `pattern_table`.`contact_information` 
					(`Name`, `Email`, `Affiliation`, `Role`, `PurposeOfContact`, 
					`ResearchExperience(y/m)`, `ResearchTools`, `DatasetAnalysed`, 
					`FamiliarityWithProcessMining`) 
					VALUES ('$name', '$email', '$affiliation', '$role', '$purposeOfContact', 
					'$researchExperience', '$researchTools', '$datasetAnalysed', '$familiarityWithProcessMining');";
					
					$result = mysqli_query($cxn, $query)
					or die("Coudn't execute query. ".mysqli_error($cxn));
					
					if($result){
						echo "<p>Submission is done.</p>";
						echo "<p>A confirmation email has been sent to your email address.</p>";
						
					}
				?>
				
				
			</div> <!-- end content -->                      
			<?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>