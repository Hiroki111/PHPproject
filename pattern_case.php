<!doctype html> 
<html> 
    <head> 
        <title>Header and Footer Testing 2</title> 
        <link rel="stylesheet" type="text/css" href="HeaderTestCSS.css"> 
	</head> 
	
    <body>
        <?php
			include("MySQL_AccountInformation.php");
			$category = $_GET['Category'];
		?> 	
        <?php include("menu.php"); ?>
        <div id="mainContainer">           
            <div id="content">             
                <?php
					$cxn = mysqli_connect($host, $user, $password, $dbname)
					or die("Connection failed" . mysqli_error($cxn));
					$query = "SELECT * FROM pattern_table.patterns where Category = '$category';";
					
					$result = mysqli_query($cxn, $query)
					or die("Coudn't execute query. " . mysqli_error($cxn));
					
					while ($data = mysqli_fetch_array($result)) {
						echo '<p> ID: ' . $data['Id'] . "</p>\n";
						echo '<p> Description: </p><p>' . $data['Description'] . "</p>\n";
					}
				?>   
			</div> <!-- end content -->   
			<?php include("footer.html"); ?> 
			<!-- end footer -->          
		</div> <!-- end mainContainer --> 
        <!--</div> <!-- end container -->
	</body> 
</html>