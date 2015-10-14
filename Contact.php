<!doctype html> 
<html> 
    <head> 
        <title>Contact</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css"> 
	</head>
	
    <body> 
        <?php 
			include("menu.php");
			include("MySQL_AccountInformation.php");
		?>
        <div id="mainContainer">           
            <div id="content">  
				<div id="contact">
					<h2>Contact Us</h2>     
					
					<form action = "Contact.php" method ="post">
						<h4>Name</h4>
						<input type="text" name="name">
						<h4>Email</h4>
						<input type="text" name="email">
						<h4>Affiliation</h4>
						<input type="text" name="affiliation">		
						<h4>Role</h4>
						<input type="text" name="role">		
						<h4>Purpose of Contact</h4>
						<textarea 
						name="purposeOfContact" wrap ="soft" ></textarea>
						<h4>Reseacrh Experience</h4>
						<table>
							<tr>
								<td align="right" style ="padding-left:10px">  Year: </td>
								<td align="left"><input type="number" name="year" min="0" max="99"> </td>
							</tr>
							<tr>
								<td align="right" style ="padding-left:10px">  Month: </td>
								<td align="left"><input type="number" name="month" min="0" max="12"></td>
							</tr>
						</table>
						<h4>What tools/software do you use to analyse data?</h4>
						<textarea 
						name="purposeOfContact" wrap ="soft" ></textarea>
						
						
						
						<input type ="hidden" name ="host" value ="<?php echo $host ?>">
						<input type ="hidden" name ="user" value ="<?php echo $user ?>">
						<input type ="hidden" name ="password" value ="<?php echo $password ?>">
						<input type ="hidden" name ="dbname" value ="<?php echo $dbname ?>">
						
						<input type="submit" value="SEND" />
					</form>
					<p></p>
				</div id="contact">
			</div> <!-- end content -->                      
			<?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>