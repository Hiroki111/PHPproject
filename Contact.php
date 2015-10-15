<!doctype html> 
<html> 
    <head> 
        <title>Contact</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="./footerFixed.js"></script>
	</head>
	
    <body> 
        <?php 
			include("menu.php");
			include("MySQL_AccountInformation.php"); //Is it necessary? menu.php includes it.
			
		?>
        <div id="mainContainer">           
            <div id="content">  
				<div id="contact">
					<h2>Contact Us</h2>     
					
					<form action = "Contact_sent.php" method ="post">
						<h4>Name</h4>
						<input type="text" name="name">
						<h4>Email</h4>
						<input type="text" name="email">
						<h4>Affiliation</h4>
						<input type="text" name="affiliation">		
						<h4>Role</h4>
						<input type="text" name="role">		
						<h4>Purpose of Contact</h4>
						<textarea class ="purposeOfContact"
						name="purposeOfContact" wrap ="soft" ></textarea>
						<h4>Reseacrh Experience</h4>
						<table>
							<tr>
								<td align="right" style ="padding-left:12px">  Year: </td>
								<td align="left"><input type="number" name="year" value ="0" min="0" max="99"> </td>
							</tr>
							<tr>
								<td align="right" style ="padding-left:12px">  Month: </td>
								<td align="left"><input type="number" name="month" value ="0" min="0" max="12"></td>
							</tr>
						</table>
						<h4>What tools/software do you use to analyse data?</h4>
						<textarea 
						name="researchTools" wrap ="soft" class ="researchTools"></textarea>
						<h4>Please describe how familiar you think you are with process mining</h4>
						<textarea class="familiarityWithProcessMining"
						name="familiarityWithProcessMining" wrap ="soft" ></textarea>						
						<h4>How many datasets have you analysed so far?</h4>
						<input type="number" name="datasetAnalysed" class="datasetAnalysed" value ="0" min="0">
						
						
						
						<br><br>
						<input type="submit" value="SEND" />
					</form>
					<p></p>
				</div><!-- end contact -->
			</div> <!-- end content -->                      
			<?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>