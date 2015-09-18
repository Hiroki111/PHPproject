<!doctype html> 
<html> 
    <head> 
        <title>Header and Footer Testing 2</title> 
        <link rel="stylesheet" type="text/css" href="HeaderTestCSS.css"> 
	</head> 
	
    <body>
        <?php
			include("MySQL_AccountInformation.php");
			$PatternName = $_GET['PatternName'];
		?> 	
        <?php include("menu.php"); ?>
        <div id="mainContainer">
            <div id="content">             
                <?php
					$cxn = mysqli_connect($host, $user, $password, $dbname)
					or die("Connection failed" . mysqli_error($cxn));
					$query = "SELECT * FROM pattern_table.patterns where PatternName = '$PatternName';";
					
					$result = mysqli_query($cxn, $query)
					or die("Coudn't execute query. " . mysqli_error($cxn));
					
					//echo '<a href = "html5.gif">TEST</a>';
					//echo '<img src ="html5.gif">'; 
					
					while ($data = mysqli_fetch_array($result)) {
						echo '<h3> Pattern Name: </h3><p>' . $data['PatternName'] . " (ID: " . $data['Id'] . ")\n</p>";
						echo "<h3> Description: </h3><p>" . $data['Description'] . "</p>\n";
						echo '<h3> Real Life Example: </h3><p>' . $data['RealLifeExample'] . "</p>\n";
						echo '<h3> Affect: </h3><p>' . $data['Affect'] . "</p>\n";
						echo '<h3> Manifestation: </h3><p>' . $data['Manifestation'] . "</p>\n";
						echo '<h3> Remedy: </h3><p>' . $data['Remedy'] . "</p>\n";
						echo '<h3> SIde Effect: </h3><p>' . $data['SideEffect'] . "</p>\n";
						echo '<h3> Quality Issue Name: </h3><p>' . $data['QualityIssueName'] . "</p>\n";
						
					}
				?>   
			</div> <!-- end content -->   
			<?php include("footer.html"); ?> 
			<!-- end footer -->          
		</div> <!-- end mainContainer --> 
        <!--</div> <!-- end container -->
	</body> 
</html>