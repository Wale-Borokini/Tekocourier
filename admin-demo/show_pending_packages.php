<?php require_once("../inc/db.php"); ?>
<?php require_once("../inc/functions.php"); ?>
<?php require_once("../inc/sessions.php"); ?>

<?php

$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
Confirm_Login(); 

?>

<!doctype html>
<html lang="en">

<head>
	<title>Show Pending Packages</title>
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
								<h3>Pending Packages</h3>
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
											
											<th>ID</th>
											<th>Booking ID</th>
											<th>Date & Time</th>
											<th>Sender's First Name</th>
											<th>Receiver's First Name</th>
											<th>Nearest Pick-Up Bus Stop</th>
											<th>Nearest Delivery Bus Stop</th>
											<th>Pick-Up Date</th>
											<th>Delivery Date</th>
											<th>Package Content</th>
											<th>Delivery Status</th>
											<th>Set To Moving</th>
											<th>Set To Delivered</th>	
										</tr>
									</thead>
									<?php
									 global $ConnectingDB;
									 $sql ="SELECT * FROM pickup_schedule WHERE Delivery_Status='Pending' ORDER BY id desc";
									  $Execute =$ConnectingDB->query($sql);
							          
							          while ($DataRows=$Execute->fetch()) {
									
									 	$id          			= $DataRows["id"];
									 	$Booking_ID				= $DataRows["Booking_ID"];
									 	$DateTime				= $DataRows["datetime"];
										$Sender_Firstname 		= $DataRows["Sender_Firstname"];
								        $Recv_Firstname  		= $DataRows["Recv_Firstname"];
								        $Nr_Pk_Busstop 			= $DataRows["Nr_Pk_Busstop"];
								        $Nr_Dlv_Busstop 		= $DataRows["Nr_Dlv_Busstop"];
								        $Pk_Date 				= $DataRows["Pk_Date"];
								        $Delv_Date 				= $DataRows["Delv_Date"];
								        $Pkg_Content 			= $DataRows["Pkg_Content"];
								        $Delivery_Status		= $DataRows["Delivery_Status"];
								        
									 ?>
									<tbody>
										<tr>
											<td><?php echo htmlentities($id); ?></td>
											<td><?php echo htmlentities($Booking_ID); ?></td>
											<td><?php echo htmlentities($DateTime); ?></td>
											<td><?php echo htmlentities($Sender_Firstname); ?></td>
											<td><?php echo htmlentities($Recv_Firstname); ?></td>
											<td><?php echo htmlentities($Nr_Pk_Busstop); ?></td>
											<td><?php echo htmlentities($Nr_Dlv_Busstop); ?></td>
											<td><?php echo htmlentities($Pk_Date); ?></td>
											<td><?php echo htmlentities($Delv_Date); ?></td>
											<td><?php echo htmlentities($Pkg_Content); ?></td>
											<td><?php echo htmlentities($Delivery_Status); ?></td>
											<td> <a href="set_status_to_moving.php?id=<?php echo $id;?>" class="btn btn-dark">Set To Moving</a></td>
											<td> <a href="set_status_to_delivered.php?id=<?php echo $id;?>" class="btn btn-success">Set To Delivered</a></td>


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
</body>

</html>