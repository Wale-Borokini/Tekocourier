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
	<title>Admin Dashboard</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<!-- Framework Stylesheets Start-->
	<!-- Bootstrap Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min4.2.1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot4.2.1.css">
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
			<div class="content dashbaord">
				<div class="in-content-wrapper">
					<div class="row no-gutters">
						
						<div class="col">
							<div class="heading-messages text-center">
								<h3>Admin Dashboard</h3>
						<?php
				           echo ErrorMessage();
				           echo SuccessMessage();
				        ?>
							</div><!-- End heading-messages -->
						</div><!-- End column -->
					</div><!-- End row -->

					<div class="box">
						<div class="dashboard-wrapper">

							<div class="row">
								<div class="col-xl col-lg-6 col-md-6">
									<div class="dashboard-boxes primary">
										<div class="row no-gutters">
											<div class="col-4">
												<div class="icon">
													<a href="full_view.php"><i class="fas fa-address-book"></i></a>
												</div>
											</div>
											<div class="col">
												<a href="full_view.php">
													<h5><?php TotalPendingBookings(); ?>
													<br>
													 New Bookings</h5>
												</a>
											</div><!-- End column -->
										</div><!-- End row -->
									</div><!-- End dashboard-boxes -->
								</div><!-- End column -->
								<div class="col-xl col-md-6">
									<div class="dashboard-boxes warning">
										<div class="row no-gutters">
											<div class="col-4">
												<div class="icon">
													<a href="show_pending_packages.php"><i class="fas fa-star"></i></a>
												</div>
											</div><!-- End Columns -->
											<div class="col">
												<a href="show_pending_packages.php">
													<h5><?php TotalPendingPackages(); ?>
													<br>
													Pending Packages</h5>
												</a>
											</div><!-- End column -->
										</div><!-- End row -->
									</div><!-- End dashboard-boxes -->
								</div> <!-- End column -->
								<div class="col-xl col-md-6">
									<div class="dashboard-boxes dark">
										<div class="row no-gutters">
											<div class="col-4">
												<div class="icon">
													<a href="show_moving_packages.php"><i class="fas fa-user"></i></a>
												</div>
											</div><!-- End column -->
											<div class="col">
												<a href="show_moving_packages.php">
													<h5><?php TotalMovingPackages(); ?>
													<br>
													Moving Packages</h5>
												</a>
											</div><!-- End column -->
										</div><!-- End row -->
									</div><!-- End dashboard-boxes -->
								</div><!-- End column -->
								<div class="col-xl col-lg-6 col-md-6">
									<div class="dashboard-boxes success">
										<div class="row no-gutters">
											<div class="col-4">
												<div class="icon">
													<a href="show_delivered_packages.php"><i class="fas fa-box"></i></a>
												</div>
											</div><!-- End column -->
											<div class="col">
												<a href="show_delivered_packages.php">
													<h5><?php TotalDeliveredPackages(); ?>
													<br>
													Delivered Packages</h5>
												</a>
											</div><!-- End column -->
										</div><!-- End row -->
									</div><!-- End dashboard-boxes -->
								</div><!-- End column -->
					
							</div><!-- End row -->
						</div><!-- End dashboard-wrapper -->

						<div class="dashboard1-wrapper">
							<div class="row no-gutters">
								<div class="col">
									<div class="dashboard-boxes1 primary">

										<div class="icon">
											<a href="existing_admins.php"><i class="fas fa-user"></i></a>
										</div>


										<a href="existing_admins.php">
											<h5>
												<small>
											<?php TotalAdminOperators(); ?>
												Admin Operator(s)
												</small>
											</h5>
										</a>

									</div><!-- End dashboard-boxes1 -->
								</div><!-- End column -->
							</div><!-- End row -->
						</div><!-- End dashboard1-wrapper -->

					</div><!-- End Box -->
				</div><!-- End in-content-wrapper -->
			</div><!-- End content-dashboard -->
		</section>
		<!-- ===========End Innerpage-wrapper============= -->

	</div><!-- end wrapper -->

	<!-- Optional JavaScript, Not optional it's need too -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min4.2.1.js"></script>
	<script src="js/customscriptfile.js"></script>
	<script src="vendors/chart.js-2.8.0/dist/Chart.min.js"></script>
	<!-- Page Scripts Ends -->
	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["January", "February", "March", "April", "May", "June"],
				datasets: [{
					label: '# of Bookings',
					data: [12, 19, 3, 5, 10, 3],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
						}
					}],
					yAxes: [{
						ticks: {
							// fontSize: 15,
							fontColor: 'black',
						}
					}],
					xAxes: [{
						ticks: {
							// fontSize: 15,
							fontColor: 'black',
							beginAtZero: true,
						}
					}]
				}
			}
		});
	</script>
	<script>
		var ctx = document.getElementById("myChart1");
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["January", "February", "March", "April", "May", "June"],
				datasets: [{
					label: '# of Bookings',
					data: [12, 19, 3, 5, 10, 3],
					backgroundColor: [
						'rgba(260, 103, 134, 0.9)',
						'rgba(59, 166, 237, 0.9)',
						'rgba(260, 210, 88, 0.9)',
						'rgba(80, 196, 194, 0.9)',
						'rgba(158, 106, 257, 0.9)',
						'rgba(260, 163, 66, 0.9)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
						}
					}],
					yAxes: [{
						ticks: {
							// fontSize: 15,
							fontColor: 'black',
						}
					}],
					xAxes: [{
						ticks: {
							// fontSize: 15,
							fontColor: 'black',
							beginAtZero: true,
						}
					}]
				}
			}
		});
	</script>
</body>
</html>