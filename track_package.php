<?php $Page_Title = "Track Package"; ?>


<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>


<?php 

if (isset($_POST["Tracking_button"])) {
  $checkBookingId = $_POST["checkBookingId"];
    if (empty($checkBookingId)) {
        $_SESSION["ErrorMessage"]= "Please Enter Your Booking ID";
        Redirect_to("track_package.php");
    }else {
        // code for checking Booking ID from Database
    
        $DataRows = Track_Package_Attempt($checkBookingId);
        if ($DataRows) {

            $_SESSION["Booking_ID"]         = $DataRows["Booking_ID"];
            $_SESSION["dateTime"]           = $DataRows["datetime"];
            $_SESSION["Sender_Firstname"]   = $DataRows["Sender_Firstname"];
            $_SESSION["Recv_Firstname"]     = $DataRows["Recv_Firstname"];
            $_SESSION["Nr_Pk_Busstop"]           = $DataRows["Nr_Pk_Busstop"];
            $_SESSION["Nr_Dlv_Busstop"]           = $DataRows["Nr_Dlv_Busstop"];
            $_SESSION["Pk_Date"]           = $DataRows["Pk_Date"];
            $_SESSION["Delv_Date"]           = $DataRows["Delv_Date"];
            $_SESSION["Pkg_Content"]           = $DataRows["Pkg_Content"];
            $_SESSION["Delivery_Status"]           = $DataRows["Delivery_Status"];

            Redirect_to("track_package_results.php");

        }else {
        $_SESSION["ErrorMessage"]="Invalid Booking ID";
        Redirect_to("track_package.php");
        }
    }   
}
?>



<!--======================== Header Start =========== -->

<?php include("inc/header.php"); ?>
        
<!--================= Header End ============== -->     

        <section class="innerpage-wrapper">
            <div id="contact-us" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 no-pd-r">
                            <div class="custom-form contact-form">
                                <h3>Track Your Package</h3>
                                <p>Please Enter Your Booking ID</p>
                                <br>
                                  <?php
                                   echo ErrorMessage();
                                   echo SuccessMessage();
                                  ?>
                                <form action="track_package.php" method="POST">
                                        <div class="row">
                                            <div class="text-center schedule-header">
                                                <h4>Booking ID</h4>
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <div class="form-group">
                                                     <input name="checkBookingId" id="" type="text" class="form-control" placeholder="Booking ID" />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>  
                                        </div>                                  
                                    
                                    <button type="Submit" name="Tracking_button" class="btn btn-danger btn-block">Check Delivery Status</button>
                                </form>
                            </div><!-- end contact-form -->
                        </div><!-- end columns -->
                        
                        
                    </div><!-- end row -->
                </div><!-- end container -->   
            </div><!-- end contact-us -->
        </section><!-- end innerpage-wrapper -->   
        
    
        
        
<!-- ============ Footer Start================ -->

<?php include("inc/footer.php"); ?>

<!-- ================= Foter End=============== -->                 
                
        
         
        
              
        
        <!-- Page Scripts Starts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.colorpanel.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom-navigation.js"></script>
        <script src="js/custom-flex.js"></script>
        <script src="js/custom-date-picker.js"></script>
        <!-- Page Scripts Ends -->
        
    </body>

</html>