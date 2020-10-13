<?php

include('lib/common.php');
// written by XUELI MA
include('lib/show_queries.php');


?>

<?php include("lib/header.php"); ?>
		<title>Add Adoption Application</title>

	<body>
    	<div id="main_container">
        <?php include("lib/menu.php"); ?>

			<div class="center_content">
				<div class="center_left">
					
					<div class="features">

                        <div class="profile_section">
							<div class="subtitle">Adoption Application</div>

							<form name="add_application" action="do_Add_adoption_Application.php" method="post">
								<table>									
									<tr>
									<td class="item_label">Applicant:</td>
									</tr>
									<tr>
										<td class="item_label">First_Name</td>
										<td>
											<input type="text" name="first_name" required>
										</td>
										<td class="item_label">Last_Name</td>
										<td>
											<input type="text" name="last_name" required>
										</td>
									</tr>
									<tr>
									<td class="item_label">Co_Applicant(Optional):</td>
									</tr>
									<tr>
										<td class="item_label">First_Name</td>
										<td>
											<input type="text" name="co_first_name">
										</td>
										<td class="item_label">Last_Name</td>
										<td>
											<input type="text" name="co_last_name" >
										</td>
									</tr>
									<tr>
									<td class="item_label">Address:</td>
									</tr>
									<tr>
										<td class="item_label">Street</td>
										<td>
											<input type="text" name="street" required>
										</td>
										<td class="item_label">City</td>
										<td>
											<input type="text" name="city" required>
										</td>
										</tr>
										<tr>
										<td class="item_label">State</td>										
										<td>
											<input type="text" name="State" required>
										</td>
										<td class="item_label">Zip Code</td>
										<td>
											<input type="text" name="zip_code" required>
										</td>
									</tr>
									<tr>
									<td class="item_label">Contact Information:</td>
									</tr>
									<tr>
										<td class="item_label">Phone #:</td>
										<td>
											<input type="text" name="phone_number" required>
										</td>
										
									</tr>
									<tr>
										<td class="item_label">Email:</td>
										<td>
											<input type="text" name="email_address" required>
										</td>
										
									</tr>
									<tr>
										<td class="item_label">Date:</td>																			
											<td><input type="date" name="application_date" min="2019-04-01" max="2020-04-20" required></td>
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
