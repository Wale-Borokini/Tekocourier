<?php require_once("../inc/db.php"); ?>
<?php require_once("../inc/functions.php"); ?>
<?php require_once("../inc/sessions.php"); ?>

<?php

$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
Confirm_Login(); 

?>

<?php 
if ( $_SESSION["Admin_Role"] == 'Administrator' ) {

 ?>

	<!doctype html>
	<html lang="en">

	<head>
		<title>Delete Admin</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="images/favicon.png" type="image/x-icon">



		<!-- Framework Stylesheets Start-->

		<!-- Bootstrap Stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min4.2.1.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot4.2.1.css">

		<!-- Data Tables Stylesheet -->
		<link rel="stylesheet" type="text/css" href="vendors/datatables/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom.datatables.css">


		<!-- Framework Stylesheets End-->



		<!-- Font Awsome Stylesheet -->
		<link rel="stylesheet" href="vendors/fontawesome5.7.2/css/all.min.css">

		<!-- Custom Stylesheet Start-->

		<link rel="stylesheet" type="text/css" href="css/style.css">

		<link rel="stylesheet" type="text/css" href="css/responsive.css">

		<!-- Custom Stylesheet End-->




	</head>

	<body>

		<!-- ===========wrapper============= -->
		<div class="wrapper">	

			<!-- ===========Top-Bar============= -->
		    <?php include ("../inc/top_bar_admin.php"); ?>
		    <!-- End top-bar -->

		    

			<!-- =========== sidebar-left ============= -->
			<?php include("../inc/sidebar_admin_left.php");?>
			<!-- End sidebar-left -->

			<!-- ===========Innerpage-wrapper============= -->
			<section>
				<div class="content booking-content">
					<div class="in-content-wrapper">
						<div class="row no-gutters">

							<div class="col">
								<div class="heading-messages text-center">
									<h3>Existing Admins</h3>
									<br>
					                  <?php
					                   echo ErrorMessage();
					                   echo SuccessMessage();
					                  ?>
								</div><!-- End heading-messages -->
							</div><!-- End column -->
						</div><!-- End row -->


						<div class="bo">

							<div class="row no-gutters">
								<div class="col">
									<table id="example" class="display table-hover table-responsive-xl">
										<thead>
											<tr>
												
												<th>Admin ID</th>
												<th>Date & Time</th>
												<th>Admin Username</th>
												<th>Admin Name</th>
												<th>Admin Role</th>
												<th>Added By</th>
												<th>Delete Admin</th>
											</tr>
										</thead>
											<?php
										      global $ConnectingDB;
										      $sql = "SELECT * FROM admins ORDER BY id asc";
										      $Execute =$ConnectingDB->query($sql);
										      $SrNo = 0;
										      while ($DataRows=$Execute->fetch()) {
										        $AdminId 		= $DataRows["id"];
										        $DateTime 		= $DataRows["datetime"];
										        $AdminUsername  = $DataRows["Username"];
										        $AdminName 		= $DataRows["Admin_name"];
										        $Admin_Role 	= $DataRows["Admin_Role"];
										        $AddedBy 		= $DataRows["Added_by"];
										        $SrNo++;
										    ?>
										<tbody>
											<tr>
												<td><?php echo htmlentities($AdminId); ?></td>
												<td><?php echo htmlentities($DateTime); ?></td>
												<td><?php echo htmlentities($AdminUsername); ?></td>
												<td><?php echo htmlentities($AdminName); ?></td>
												<td><?php echo htmlentities($Admin_Role) ?></td>
												<td><?php echo htmlentities($AddedBy); ?></td>
												<td> <a href="delete_admin_from_table.php?id=<?php echo htmlentities($AdminId) ;?>" class="confirmDeleteButton btn btn-danger">Delete</a>  </td>
											</tr>		
										</tbody>
										<?php } ?>
									</table>
								</div><!-- End column -->
							</div><!-- End row -->
						</div><!-- End Box -->
					</div><!-- End in-content-wrapper -->
				</div><!-- End booking-content -->
			</section>
			<!-- ===========End Innerpage-wrapper============= -->

		</div><!-- end wrapper -->

		<!-- Optional JavaScript, Not optional it's need too -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.3.1.min.js"></script>

		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min4.2.1.js"></script>
		<script src="vendors/datatables/datatables.min.js"></script>
		<script src="js/customscriptfile.js"></script>

		<!-- Page Scripts Ends -->


		<script>
			$(document).ready(function () {
				$('#example').DataTable();
			});
		</script>
		<script type="text/javascript">
			$('.confirmDeleteButton').on('click', function () {
		        return confirm('Are You Sure You Want To Delete This Admin?');
		    })   
		</script>
	</body>

	</html>

<?php 
	}else{
		Redirect_to("../error_page.php");
	}

 ?>