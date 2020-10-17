<?php
include('lib/common.php');
// written by GTusername4
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit();
}
    // ERROR: demonstrating SQL error handlng, to fix
    // replace 'sex' column with 'gender' below:
$query = "SELECT name,species,sex,alteration_status,age,adopt_status,pet_ID FROM animal WHERE pet_ID NOT IN".
		" (select pet_ID from adopts)";
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
									<td class="heading">Pet_ID</td>
									<td class="heading">Name</td>
									<td class="heading">Species</td>
									<td class="heading">Sex</td>
									<td class="heading">Alteration_status</td>
									<td class="heading">Adoptability_status</td>
									<td class="heading">Age</td>
									<td class="heading">Breed</td>									
								</tr>
						
								<?php
								echo '<td><a href="sort_pet_ID.php">Sort by pet_ID</a></td>';
								echo '<td><a href="sort_name.php">Sort by Name</a></td>';								
								echo '<td><a href="filter_species.php">Filter by Species</a></td>';
								echo '<td><a href="sort_sex.php">Sort by Sex</a></td>';
								echo '<td><a href="sort_alteration_status.php">Sort by Alteration_status</a></td>';
								echo '<td><a href="filter_doptability_status.php">Filter by doptability status</a></td>';
								echo '<td><a href="sort_age.php">Sort by Age</a></td>';
														
								
								?>
										
										
								<?php								
                                    $query1 = "SELECT * FROM animal WHERE pet_ID NOT IN".
										" (select pet_ID from adopts)order by age";
                                             
                                    $result1 = mysqli_query($db, $query1);
                                     if (!empty($result1) && (mysqli_num_rows($result1) == 0) ) {
                                         array_push($error_msg,  "SELECT ERROR: find Animal <br>" . __FILE__ ." line:". __LINE__ );
                                    }
                                    
                                    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                                        print "<tr>";
										
                                        //print "<td>{$row['name']}</td>";
										$name = urlencode($row['name']);
										$pet_ID=urlencode($row['pet_ID']);										
										//header ('Location:View_Animal_Detail.php?id=.$name');								
										print "<td><a href='View_Animal_Detail.php?pet_ID=$pet_ID'>{$row['pet_ID']}</a></td>";
										print "<td>{$row['name']}</td>";
										//echo '<td><a href="View_Animal_Detail.php?name=$name">{$row['name']}</a></td>';		echo not work
										//print "<td><a href='request_friend.php?friend_email=$friend_email'>{$row['last_name']}</a></td>";
                                        //print "<td><a href="View_Animal_Detail.php">{$row['name']}</a></td>";
										//print '<td><a href="view_requests.php?accept_request=' . urlencode($row['email']) . '">Accept</a></td>';
                                        print "<td>{$row['species_type']}</td>";
                                        print "<td>{$row['sex']}</td>";
										if ($row['alteration_status']=='0'){
											print "<td>No</td>";
										}
										else {
											print "<td>Yes</td>";
										}
										//print "<td>{$row['alteration_status']}</td>";
										
										$query4 = "(SELECT vaccine_type FROM vaccination WHERE pet_ID='{$row['pet_ID']}') except".
										"(SELECT vaccine_type FROM needs where species_type='{$row['species_type']})";                                             
										$result4 = mysqli_query($db, $query4);									 
										include('lib/show_queries.php');
										//$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
										if ($row['alteration_status']=='1' and isset($result4)){
												print "<td>Yes</td>";
										}
										else{
											print "<td>No</td>";
										}
										print "<td>{$row['age']}</td>";
										//print "<td>{$row['pet_ID']}</td>";							
                                        //print "</tr>";
										
									$query3 = "SELECT GROUP_CONCAT(breed_type ORDER BY breed_type SEPARATOR '/') AS combination FROM animal_is_breed WHERE pet_ID='{$row['pet_ID']}'";                                                 
                                    $result3 = mysqli_query($db, $query3);									 
									include('lib/show_queries.php');
                                    $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);	
									print "<td>{$row3['combination']}</td>";
									//print "<td>{$row3[0]}</td>";
                                    //print "</tr>";	
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

