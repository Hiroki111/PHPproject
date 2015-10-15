<!doctype html> 
<html> 
    <head> 
        <title>Documentation</title> 
        <link rel="stylesheet" type="text/css" href="MainPage.css"> 
	</head>
	
    <body> 
        <?php include("menu.php"); ?>
        <div id="mainContainer">           
            <div id="content">             
                <h2>Documentation</h2>             
                <!-- contents come here -->
				<?php
					$cxn = mysqli_connect($host, $user, $password, $dbname)
					or die("Connection failed" . mysqli_error($cxn));
					$query = "SELECT * FROM pattern_table.document;";
					
					$result = mysqli_query($cxn, $query)
					or die("Coudn't execute query. " . mysqli_error($cxn));
					
					//It is assumed that there are no same sub section among each section.
					//First, find out what sections there are
					$sections = array();
					//Sedond, find sub sections
					$sub_sections = array();
					$objects = array();
					$section_pair = array();
					while ($data = mysqli_fetch_array($result)) {
						$sections[] = $data['Section'];//This is String
						$sub_sections[] = $data['Sub_section'];//This is String too
						//Create an array value pair of sec-subsec
						$section_pair[] = $data['Section'].$data['Sub_section'];
						$objects[] = $data;
					}
					
					$sections = array_unique($sections);
					$sub_sections = array_unique($sub_sections);
					
					foreach($sections as $section){
						echo '<h3 class="white-textA">'. $section ."</h3>";
						foreach($sub_sections as $sub_section){
							if(in_array($section.$sub_section, $section_pair)){
								echo '<h4 class="white-textB">'. $sub_section ."</h4>";
							}
							
							foreach($objects as $obj){
								if($obj['Section'] == $section && $obj['Sub_section'] == $sub_section){
									echo '<p class="white-textC no-margin";>'. $obj['Author'] ."</p>";
									echo '<a href="'.$obj['URL'].'" class="white-textC no-margin";>'.$obj['Title']."</a>";
									echo '<p class="white-textC no-margin";> Publisher : '. $obj['Publisher'] ."</p>
									<br>";
								}
							}
						}
					}
					
					
				?>
				
			</div> <!-- end content -->                      
            <?php include("footer.html"); ?> 
		</div> <!-- end mainContainer --> 
	</body> 
</html>				