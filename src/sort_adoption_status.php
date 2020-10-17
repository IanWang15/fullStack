<?php
include('lib/common.php');
// written by GTusername4
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit();
}
    // ERROR: demonstrating SQL error handlng, to fix
    // replace 'sex' column with 'gender' below:
$query = "SELECT name,species,sex,alteration_status,age,adopt_status,,pet_ID,breed_type1 FROM animal ORDER BY adoption_status";
		// "FROM Animal" .

$result = mysqli_query($db, $query);
include('lib/show_queries.php');

//if (!empty($result) && (mysqli_num_rows($result) > 0) ) {
  //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$count = mysqli_num_rows($result);

//} else {
  //      array_push($error_msg,  "Query ERROR: Failed to get Animals' Details...<br>" . __FILE__ ." line:". __LINE__ );
//}
?>

<?php include("lib/header.php"); ?>
		<title>Animals' Haven </title>
	</head>

	<body>
        <div id="main_container">
		    <?php include("lib/menu.php"); ?>
            
			<div class="center_content">
				<div class="center_left">
					<div class="title_name"></div>          
					
					<div class="features">   	
						<div class="profile_section">
                        	<div class="subtitle">All Animals' Details </div>   
							
							<table width ="1000" border="2">
								<tr>
									<td class="heading">Name</td>
									<td class="heading">Species</td>
									<td class="heading">Sex</td>
									<td class="heading">Alteration_status</td>
									<td class="heading">Adoption_status</td>
									<td class="heading">Age</td>
									<td class="heading">Breed</td>									
								</tr>
						
								<?php
								echo '<td><a href="sort_name.php">Sort by Name</a></td>';
								echo '<td><a href="sort_species.php">Sort by Species</a></td>';
								echo '<td><a href="sort_sex.php">Sort by Sex</a></td>';
								echo '<td><a href="sort_alteration_status.php">Sort by Alteration_status</a></td>';
								echo '<td><a href="sort_adoption_status.php">Sort by Adoption_status</a></td>';
								echo '<td><a href="sort_age.php">Sort by Age</a></td>';
								echo '<td><a href="sort_breed.php">Sort by Breed</a></td>';
								
								
								?>
										
										
								<?php								
                                    $query = "SELECT * FROM animal ORDER BY adopt_status";
                                             
                                    $result = mysqli_query($db, $query);
                                     if (!empty($result) && (mysqli_num_rows($result) == 0) ) {
                                         array_push($error_msg,  "SELECT ERROR: find Friendship <br>" . __FILE__ ." line:". __LINE__ );
                                    }
                                    
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        print "<tr>";
										
                                        print "<td>{$row['name']}</td>";
										//echo '<td>''<a href="View_Animal.Detail.php">'.'$row['name']''</a>''</td>';
                                        //print "<td><a href="View_Animal.Detail.php">{$row['name']}</a></td>";
										//print '<td><a href="view_requests.php?accept_request=' . urlencode($row['email']) . '">Accept</a></td>';
                                        print "<td>{$row['species_type']}</td>";
                                        print "<td>{$row['sex']}</td>";
										print "<td>{$row['alteration_status']}</td>";
										print "<td>{$row['adoption_status']}</td>";
										print "<td>{$row['age']}</td>";
										//echo "<td>{$row['']}</td>";							
                                        print "</tr>";							
                                    }									
                                ?>
							</table>						
						</div>	
					 </div> 
				</div> 
                
                <?php include("lib/error.php"); ?>
                    
				<div class="clear"></div> 
			</div>    

               <?php include("lib/footer.php"); ?>
		 
		</div>
	</body>
</html>

