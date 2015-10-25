<!doctype html> 
<html> 
    <head> 
        <title>Header and Footer Testing 2</title>
		<script type ="text/javascript"
		src="https://code.jquery.com/jquery-1.9.1.min.js">
		</script>
        <link rel="stylesheet" type="text/css" href="MainPage.css"> 
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
					
				?>
				<script type ="text/javascript">
					$(document).ready(function() 
					{
						$("#animatedImage").hover(
						function(){
							//While it is hovered
							var aniamtedImage = document.getElementById("animatedImage").getAttribute("data-animated");
							$(this).attr("src", aniamtedImage);
						},
						function(){
							var stillImage = document.getElementById("animatedImage").getAttribute("data-still");
							//When the mouse goes out
							$(this).attr("src", stillImage);
						});
					});
				</script>
				<?php
					while ($data = mysqli_fetch_array($result)) {
						echo '<h3> Pattern Name: </h3><p>' . $data['PatternName'] . "\n</p>";
						echo "<h3> Description: </h3><p>" . $data['Description'] . "</p>\n";
						echo '<h3> Real Life Example: </h3><p>' . $data['RealLifeExample'] . "</p>\n";
						echo '<h3> Affect: </h3><p>' . $data['Affect'] . "</p>\n";
						echo '<h3> Manifestation: </h3><p>' . $data['Manifestation'] . "</p>\n";
						echo '<h3> Remedy: </h3><p>' . $data['Remedy'] . "</p>\n";
						echo '<h3> SIde Effect: </h3><p>' . $data['SideEffect'] . "</p>\n";
						echo '<h3> Quality Issue Name: </h3><p>' . $data['QualityIssueName'] . "</p>\n";
						echo '<h3> Quality Issue: </h3><p>' . $data['QualityIssue'] . "</p>\n";
					}
				?>   
			</div> <!-- end content -->   
			<?php include("footer.html"); ?><!-- end footer -->          
		</div> <!-- end mainContainer --> 
	</body> 
</html>