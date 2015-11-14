<!doctype html> 
<html> 
    <head> 
        <title>Event Log Patterns</title>
		<script type ="text/javascript"
		src="https://code.jquery.com/jquery-1.9.1.min.js">
		</script>
        <link rel="stylesheet" type="text/css" href="MainPage.css"> 
	</head> 
	
    <body>
        <?php
			
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
						$remove = array("‘", "’"); //Both "‘", "’" are often garbled, so they need to be replaced
						echo '<h3> Pattern Name: </h3><p>' . $data['PatternName'] . "\n</p>";
						$description = str_replace($remove,"'", $data['Description']);
						echo "<h3> Description: </h3><p>" . $description . "</p>\n";
						$realLifeExample = str_replace($remove,"'", $data['RealLifeExample']);
						echo '<h3> Real Life Example: </h3><p>' . $realLifeExample . "</p>\n";
						$affect = str_replace($remove,"'", $data['Affect']);
						echo '<h3> Affect: </h3><p>' . $affect . "</p>\n";
						$manifestation = str_replace($remove,"'", $data['Manifestation']);
						echo '<h3> Manifestation: </h3><p>' . $manifestation . "</p>\n";
						$remedy = str_replace($remove,"'", $data['Remedy']);
						echo '<h3> Remedy: </h3><p>' . $remedy . "</p>\n";
						$sideEffect = str_replace($remove,"'", $data['SideEffect']);
						echo '<h3> Side Effect: </h3><p>' . $sideEffect . "</p>\n";
						$qualityIssueName = str_replace($remove,"'", $data['QualityIssueName']);
						echo '<h3> Quality Issue Name: </h3><p>' . $qualityIssueName . "</p>\n";
						$qualityIssue = str_replace($remove,"'", $data['QualityIssue']);
						echo '<h3> Quality Issue: </h3><p>' . $qualityIssue . "</p>\n";
					}
				?>
				
				
					</div> <!-- end content -->   
					<?php include("footer.html"); ?><!-- end footer -->          
		</div> <!-- end mainContainer --> 
	</body> 
</html>