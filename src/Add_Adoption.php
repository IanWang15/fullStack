<?php
include('lib/common.php');
// written by GTusername4
$pet_ID = $_GET['pet_ID'];
//$name = $_GET['name'];
//echo $pet_ID;

if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit();
if 	($_SESSION['username']!= 'admin_Inge'){
	header('Location: Animal_Dashboard.php');
	exit();
}
}
    // ERROR: demonstrating SQL error handlng, to fix
    // replace 'sex' column with 'gender' below:
$query = "SELECT * FROM animal WHERE pet_ID = '".$pet_ID."'";
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
		<title>Add Adoption </title>
	</head>

	<body>
        <div id="main_container">
		    <?php include("lib/menu.php"); ?>            
			<div class="center_content">
				<div class="center_left">
					<div class="title_name"></div>          
					
					<div class="features">   	
						<div class="profile_section">
                        	<div class="subtitle">Add Adoption </div>  
							
							<form name="add adoption" action="do_add_adoption.php" method="post">
							<input type="hidden" value="<?php echo $name;?>" name="name"/>	

							<table width ="1000" border="2">
								<tr>
									<td class="heading">pet_ID </td>
									<td class="heading">Applica number</td>									
									<td class="heading">adoption fee</td>
									<td class="heading">Adoption date</td>
																		
								</tr>
						
										
								<?php								
                                    $query = "SELECT * FROM animal WHERE pet_ID = '".$pet_ID."'";
                                             
                                    $result = mysqli_query($db, $query);
                                     if (!empty($result) && (mysqli_num_rows($result) == 0) ) {
                                         array_push($error_msg,  "SELECT ERROR: find animal <br>" . __FILE__ ." line:". __LINE__ );
                                    }
                                    
                                    //while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        //print "<tr>";
										//print "<td>{$row['pet_ID']}</td>";	
                                        //print "<td>{$row['name']}</td>";
										//$applica_number = urlencode($row['applica_number']);										
										//header ('Location:View_Animal_Detail.php?id=.$name');								
										//print "<td>{$row['applica_number']}</td>";										
										//echo '<td><a href="View_Animal_Detail.php?name=$name">{$row['name']}</a></td>';		echo not work
										//print "<td><a href='request_friend.php?friend_email=$friend_email'>{$row['last_name']}</a></td>";
                                        //print "<td><a href="View_Animal_Detail.php">{$row['name']}</a></td>";
										//print '<td><a href="view_requests.php?accept_request=' . urlencode($row['email']) . '">Accept</a></td>';
                                        //print "<td>{$row['email']}</td>";
                                        //print "<td>{$row['date_app']}</td>";										
										//print "<td>{$row['adopt_status']}</td>";
										//rint "<td><a href='change_status.php?applica_number=$applica_number'>change</a></td>";
																
                                       	//print "<td><select name='status'><option value='approved'>{approved}</option></select></td>"
											
										//print "</tr>";	

						
                                    //}									
                                ?>
								<tr>
									<td>
											<input type="text" name="pet_ID" value=<?php echo $pet_ID;?> readonly />
									</td>
									<td>
									<?php 	$applica_number="SELECT applica_number from adoption_application WHERE adopt_status = 1";
											$result = mysqli_query($db, $applica_number);
											$options = "";
											while ($row = mysqli_fetch_array($result))										
										{
											$options = $options."<option>$row[0]</option>";
											//print $options;
										}		
											//print "{$row['applica_number']}";
									?>
											<select name="applica_number">
												
												 <?php echo $options;?>

											</select>
									</td>
									<td>
											<input type="text" name="adoption_fee" required>
									</td>
									<td>			
											<input type="date" name="adoption_date" min="2018-04-01" max="2020-04-20" required>  			
									</td>
									<td>
											<input type="submit" value="Save">
									</td>
								</tr>
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

