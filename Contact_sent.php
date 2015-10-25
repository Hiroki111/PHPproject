<!doctype html> 
<html> 
    <head> 
        <title>Submission - done</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css">
		<script type="text/javascript" src="http://blog.webcreativepark.net/sample/js/36/footerFixed.js"></script>
	</head>
	
    <body> 
        <?php 
			include("menu.php");
		?>
        <div id="mainContainer">           
            <div id="content">  
				<h2>Contact Us</h2>     
				<!--
					Summary of the function of this page
					1, Read the posted information by POST method.
					2, Access DB 
					3, Execute SQL query to insert the new contact, Show a message 
					"Submission is done, a confirmation email was sent."
					4. Send email to both the visitor and admin   
					
					Included files
					1, MailContents.php.
					This contains the contents of the confirmation emails for
					both the visitor and admin.
					2, MailServerAccountInformation.php
					This contains SMTP information, mail sender and the admin's
					email addresses
				-->
				
				<?php
					$name = $_POST['name'];
					$email = $_POST['email'];
					$affiliation = $_POST['affiliation'];
					$role = $_POST['role'];
					$purposeOfContact = $_POST['purposeOfContact'];
					$researchExperience = $_POST['researchExperience'];
					$researchTools = $_POST['researchTools'];
					$familiarityWithProcessMining = $_POST['familiarityWithProcessMining'];
					$datasetAnalysed = $_POST['datasetAnalysed'];
					
					
					
					$cxn = mysqli_connect($host, $user, $password, $dbname)
					or die ("Connection failed".mysqli_error($cxn));
					
					$query = "INSERT INTO `pattern_table`.`contact_information` 
					(`Name`, `Email`, `Affiliation`, `Role`, `PurposeOfContact`, 
					`ResearchExperience(year)`, `ResearchTools`, `DatasetAnalysed`, 
					`FamiliarityWithProcessMining`) 
					VALUES 
					('$name', '$email', '$affiliation', '$role', '$purposeOfContact', 
					'$researchExperience', '$researchTools', '$datasetAnalysed', 
					'$familiarityWithProcessMining');";
					
					$result = mysqli_query($cxn, $query)
					or die("Coudn't execute query. ".mysqli_error($cxn));
					
					
					$visitor = $email;
					
					require 'PHPMailer-master/PHPMailerAutoload.php';
					include("MailServerAccountInformation.php");
					include("MailContents.php");
					$mail = new PHPMailer();
					
					$mail->isSMTP();
					$mail->SMTPSecure =$Authentication;
					$mail->Host = $SMTPHost;
					$mail->Port = $Port;
					
					$mail->SMTPAuth = true;
					$mail->Username = $SMTPUsername;
					$mail->Password = $SMTPPassword;
					
					$mail->addAddress($visitor);
					$mail->setFrom($SendersAddress, $Sender);
					$mail->Subject =$Subject;
					$mail->Body = $Body;
					
					//The line below is used to see information for debugging.
					//Usually, it should be commented out
					//$mail->SMTPDebug = 1;
					
					if($result){
						echo "<p>Submission is done.</p>";
					}
					
					if (!$mail->Send()){
						//The line below is used to see error information.
						//Usually, it should be commented out
						//echo("Failed to send mail. Error:".$mail->ErrorInfo);
						}else{
						echo"<p>A confirmation email has been sent to your email address.</p>";
						$mail->ClearAddresses();
						$mail->addAddress($AdminsAddress);
						$mail->Subject =$SubjectForAdmin;
						$mail->Body = $BodyForAdmin;
						$mail->Send();
					}
					
				?>
				
				
			</div> <!-- end content -->                      
			<?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>