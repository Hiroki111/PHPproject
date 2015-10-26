<!doctype html> 
<html> 
    <head> 
        <title>Top</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css">
		<script type="text/javascript" src="http://blog.webcreativepark.net/sample/js/36/footerFixed.js"></script>
	</head> 
	
    <body> 
       
        <div id="mainContainer">
		 <?php include("menu.php"); ?>
            <div id="content">
			<h2><center>Welcome to the Event Log Imperfections Patterns home page</center></h2>
               <?php
					$cxn = mysqli_connect($host, $user, $password, $dbname)
					or die("Connection failed" . mysqli_error($cxn));
					$query = "SELECT * FROM pattern_table.top;";
					
					$result = mysqli_query($cxn, $query)
					or die("Coudn't execute query. " . mysqli_error($cxn));					
					
					while ($data = mysqli_fetch_array($result)) {
						echo '<p>'. $data['Description'] .'</p>';	
					}
				?>
			</div> <!-- end content -->                      
            <?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>