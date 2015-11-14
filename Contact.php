<!doctype html> 
<html> 
    <head> 
        <title>Contact</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="./footerFixed.js"></script>
		<script>
			
			function varidateForm(){
				var name = document.forms["contactForm"]["name"].value;
				var email = document.forms["contactForm"]["email"].value;
				var affiliation = document.forms["contactForm"]["affiliation"].value;
				var role = document.forms["contactForm"]["role"].value;
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				var mustFields = [name, email, affiliation, role];
				var filled = true;
				for (i = 0; i < mustFields.length; i++){
				    filled = Boolean(mustFields[i] != null && mustFields[i] != "");
					if(!filled){
						alert("The following fields must be filled\n\nName, Email, Affiliation and Role");
						return false;
					}
				}
				if(!filter.test(email)){
					alert("Your email address is invalid.");
					return false;
				}
				return true;				
			}
		</script>
	</head>
	
    <body>
        <?php 
			include("menu.php");
			
			
		?>
        <div id="mainContainer">           
            <div id="content">  
				<div id="contact">
					<h2>Contact Us</h2>
					<form name="contactForm" onsubmit ="return varidateForm()"
					action = "Contact_sent.php" method ="post">
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
				<!--	<h4>Reseacrh Experience</h4>
						<input type="radio" name ="researchExperience" value="0-1" checked>0 - 1 year
						<br>
						<input type="radio" name ="researchExperience" value="1-2">1 - 2 years
						<br>
						<input type="radio" name ="researchExperience" value="2+">More than 2 years
						<h4>What tools/software do you use to analyse data?</h4>
						<textarea 
						name="researchTools" wrap ="soft" class ="researchTools"></textarea>
						<h4>Your familiarity with process mining</h4>
						<input type ="radio" name ="familiarityWithProcessMining" value ="Very familiar" checked>Very familiar
						<br>
						<input type ="radio" name ="familiarityWithProcessMining" value ="Somewhat familiar">Somewhat familiar
						<br>
						<input type ="radio" name ="familiarityWithProcessMining" value ="Not familiar">Not familiar
						<h4>How many datasets have you analysed so far?</h4>
						<input type="number" name="datasetAnalysed" class="datasetAnalysed" value ="0" min="0">
				-->		<br><br>
						<input type="submit" value="SEND" />
					</form>
					<p></p>
				</div><!-- end contact -->
			</div> <!-- end content -->                      
			<?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>