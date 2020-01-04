<?php require_once("../inc/db.php"); ?>
<?php require_once("../inc/functions.php"); ?>
<?php require_once("../inc/sessions.php"); ?>

<?php

$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
//echo $_SESSION["TrackingURL"];
Confirm_Login(); 

?>







<!DOCTYPE html>
<html lang="en">


<head>
  <title>Single Page View</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="" type="image/x-icon">
  

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
      
      <!-- End top-bar -->

    <!-- =========== sidebar-left ============= -->
    
    <!-- End sidebar-left -->


    <!-- ===========Innerpage-wrapper============= -->
    <section>
      <div class="content booking-content">
        <div class="in-content-wrapper">
          <div class="row no-gutters">
            
          </div><!-- End row -->

          <div class="bo">

            <div class="row no-gutters">
              <div class="co">
                <div class="heading-messages text-center">
                  
                </div><!-- End heading-messages -->
                <table style="margin-left:150px; " id="example" class="display table-hover table-responsive-xl">
                  <?php
                    $SearchQueryParameter = $_GET["id"];
                    global $ConnectingDB;
                   $sql ="SELECT * FROM pickup_schedule WHERE id='$SearchQueryParameter'";
                   $stmt = $ConnectingDB->query($sql);
                   while ($DataRows=$stmt->fetch()) {
                        $id                   = $DataRows["id"];
                        $Booking_ID           = $DataRows["Booking_ID"];
                        $DateTime             = $DataRows["datetime"];
                        $Sender_Firstname     = $DataRows["Sender_Firstname"];
                        $Sender_Lastname      = $DataRows["Sender_Lastname"];
                        $Sender_Email         = $DataRows["Sender_Email"];
                        $Sender_Phonenumber   = $DataRows["Sender_Phonenumber"];
                        $Recv_Firstname       = $DataRows["Recv_Firstname"];
                        $Recv_Lastname        = $DataRows["Recv_Lastname"];
                        $Recv_Email           = $DataRows["Recv_Email"];
                        $Recv_Phonenumber     = $DataRows["Recv_Phonenumber"];
                        $Pickup_Address       = $DataRows["Pickup_Address"];
                        $Delivery_Address     = $DataRows["Delivery_Address"];
                        $Nr_Pk_Busstop        = $DataRows["Nr_Pk_Busstop"];
                        $Nr_Dlv_Busstop       = $DataRows["Nr_Dlv_Busstop"];
                        $Pk_State             = $DataRows["Pk_State"];
                        $Delv_State           = $DataRows["Delv_State"];
                        $Pk_Date              = $DataRows["Pk_Date"];
                        $Delv_Date            = $DataRows["Delv_Date"];
                        $Pkg_Content          = $DataRows["Pkg_Content"];
                        $Pkg_Weight           = $DataRows["Pkg_Weight"];
                        $Special_Request      = $DataRows["Special_Request"];
                        $Delivery_Status      = $DataRows["Delivery_Status"];
                   ?>


                    <tr class="text-center">
                      <th><h3>TEKO COURIER</h3></th>
                      <td><h3>BOOKING INFORMATION</h3></td>
                    </tr>
                    <tr>
                      <th><strong>Booking ID</strong></th>
                      <td><?php echo htmlentities($Booking_ID); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Date & Time</strong></th>
                      <td><?php echo htmlentities($DateTime); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Sender's First Name</strong></th>
                      <td><?php echo htmlentities($Sender_Firstname); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Sender's Last Name</strong></th>
                      <td><?php echo htmlentities($Sender_Lastname); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Sender's Email</strong></th>
                      <td><?php echo htmlentities($Sender_Email); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Sender's Phone Number</strong></th>
                      <td><?php echo htmlentities($Sender_Phonenumber); ?></td>
                    </tr> 
                    <tr>
                      <th><strong>Receiver's First Name</strong></th>
                      <td><?php echo htmlentities($Recv_Firstname); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Receiver's Last Name</strong></th>
                      <td><?php echo htmlentities($Recv_Lastname); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Receiver's Email</strong></th>
                      <td><?php echo htmlentities($Sender_Email); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Receiver's Phone Number</strong></th>
                      <td><?php echo htmlentities($Recv_Phonenumber); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Pick-Up Address</strong></th>
                      <td><?php echo htmlentities($Pickup_Address); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Delivery Address</strong></th>
                      <td><?php echo htmlentities($Delivery_Address); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Nearest Pick Up Bus-Stop</strong></th>
                      <td><?php echo htmlentities($Nr_Pk_Busstop); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Nearest Delivery Bus-Stop</strong></th>
                      <td><?php echo htmlentities($Nr_Dlv_Busstop); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Pick-Up State</strong></th>
                      <td><?php echo htmlentities($Pk_State); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Delivery State</strong></th>
                      <td><?php echo htmlentities($Delv_State);?></td>
                    </tr>
                    <tr>
                      <th><strong>Pick-Up Date</strong></th>
                      <td><?php echo htmlentities($Pk_Date); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Delivery Date</strong></th>
                      <td><?php echo htmlentities($Delv_Date); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Package Content</strong></th>
                      <td><?php echo htmlentities($Pkg_Content); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Package Weight</strong></th>
                      <td><?php echo htmlentities($Pkg_Weight); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Special Request</strong></th>
                      <td><?php echo htmlentities($Special_Request); ?></td>
                    </tr>
                    <tr>
                      <th><strong>Delivery Status</strong></th>
                      <td><?php echo htmlentities($Delivery_Status); ?></td>
                    </tr>            
          
                    <?php 

                  } ?>
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