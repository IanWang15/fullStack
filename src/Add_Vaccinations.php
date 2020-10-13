<?php

include('lib/common.php');
// written by XUELI MA
include('lib/show_queries.php');
$pet_ID = $_GET['pet_ID'];
//echo $pet_ID;
$username= $_SESSION['username'];
//echo $username;

?>

<?php include("lib/header.php"); ?>
		<title>Add Administerd Vaccination</title>

	<body>
    	<div id="main_container">
        <?php include("lib/menu.php"); ?>

			<div class="center_content">
				<div class="center_left">
					
					<div class="features">

                        <div class="profile_section">
							<div class="subtitle">Add Administerd Vaccination</div>

							<form name="add_administered_vaccine" action="do_Add_Administerd_Vaccination.php" method="post">
							<input type="hidden" value="<?php echo $pet_ID;?>" name="pet_ID"/>
								<table>									
		
									<tr>
									<td class="item_label">User information who entered this:</td>
									</tr>
									<tr>
										<td class="item_label">username:</td>
										<td>
											<input type="text" name="username" value="<?php echo $username; ?>" readonly>
											 
										</td>										
									</tr>
									<tr>
										<td class="item_label">vaccine type:</td>
										<td>											
											<?php 	
												
											$vaccine_type="SELECT vaccine_type from vaccine";  
											$result = mysqli_query($db, $vaccine_type);
											$options = "";
											while ($row = mysqli_fetch_array($result))										
											{
											$options = $options."<option>$row[0]</option>";
											//print $options;
											}										
											?>
											<select name="vaccine_type" required>
											<?php echo $options;?>
											</select>
										</td>										
									</tr>
									<tr>
									<td class="item_label">vaccine number (optional):</td>
										<td>
											<input type="text" name="vaccination_number">
										</td>
									</tr>
							
									
									<tr>
										<td class="item_label">Date Administered:</td>																			
											<td><input type="date" name="administered_date" min="1999-04-01" max="2022-04-20" required></td>
									</tr>
									<tr>
										<td class="item_label">Expiration Date:</td>																			
											<td><input type="date" name="expiration_date" min="1999-04-01" max="2022-04-20" required></td>
									</tr>
									<tr>
									<th></th>
									<th></th>	
									
										<td>
										<input type="submit" value="Save">
										</td>
									</tr>
								</table>

							</form>
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
