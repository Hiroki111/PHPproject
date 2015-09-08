<?php
	$host = "localhost";
	$user = "root";
	$password = "c53160";
	$dbname = "pattern_table";
	
	$cxn = mysqli_connect($host, $user, $password, $dbname)
	or die("Connection failed" . mysqli_error($cxn));
	$query = "SELECT * FROM pattern_table.patterns;";
	
	$result = mysqli_query($cxn, $query)
	or die("Coudn't execute query. " . mysqli_error($cxn));
?> 	

<div id="menu">           
	<ul>
		<!-- 1st level -->
		<h2><li style = "color:#00FFCC">Sample Header</li></h2>  
		<li><b href="#">Home</b></li>              
		<li><b href="#">Patterns</b>
			<ul>
				<!-- 2nd -->
				<li><b href ="#">Event</b>
					<ul>
						<!-- while, use "if Category is Event", $submenu = Name  -->
						<?php
							while ($data = mysqli_fetch_array($result)) {
								if($data['Category'] == "Event"){
								?>
								<li><a href ="pattern_event.php?Category=Event"><?php echo $data['PatternName']; ?></a></li>
								<?php
								}
							}
						?>						
					</ul>
				</li>
				<li><a href ="pattern_event.php?Category=Case">Case</a></li>
				<li><a href ="pattern_event.php?Category=Log">Log</a></li>
			</ul>                        
		</li>                    
		<li><b href="#">About</b></li>
		<li><b href="#">Links</b></li>
		<li><b href="#">Impact</b></li>
		<li><b href="#">Documentation</b></li>
		<li><b href="#">Contact</b></li>           
	</ul>         
</div>	