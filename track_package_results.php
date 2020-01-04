<?php $Page_Title = "Track Package Results"; ?>

<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<?php Confirm_Booking_Id() ?>

<!--======================== Header Start =========== -->

<?php include("inc/header.php"); ?>
        
<!--================= Header End ============== -->  

 
 

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="payment-success" class="section-padding">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <div class="payment-success-text">
                            <h2>Package Information</h2>
                            <!-- <p>Your payment of $700 has been processed successfully</p> -->
                            
                            <!-- <span><i class="fa fa-check-circle"></i></span> -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <!-- <tr>
                                            <td class="text-center">Delivery Information</td>
                                        </tr> -->
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Booking ID</th>
                                            <td><?php echo $_SESSION["Booking_ID"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date & Time</th>
                                            <td><?php echo $_SESSION["dateTime"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sender's First Name</th>
                                            <td><?php echo $_SESSION["Sender_Firstname"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Receiver's First Name</th>
                                            <td><?php echo $_SESSION["Recv_Firstname"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nearest Pick-Up Bus Stop</th>
                                            <td><?php echo $_SESSION["Nr_Pk_Busstop"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nearest Delivery Bus Stop</th>
                                            <td><?php echo $_SESSION["Nr_Dlv_Busstop"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pick-Up Date</th>
                                            <td><?php echo $_SESSION["Pk_Date"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Date</th>
                                            <td><?php echo $_SESSION["Delv_Date"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Package Content</th>
                                            <td><?php echo $_SESSION["Pkg_Content"] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Status</th>
                                            <td><?php echo $_SESSION["Delivery_Status"] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>Booking details has been send to your email id. Kindly check your email in order to confirm the transaction.</p>
                        </div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end coming-soon-text -->
    </section><!-- end innerpage-wrapper -->


       
        
        
<!-- ============ Footer Start================ -->

<?php include("inc/footer.php"); ?>

<!-- ================= Foter End=============== -->  
        
        <!-- Page Scripts Starts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.colorpanel.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom-navigation.js"></script>
        <!-- Page Scripts Ends -->
    </body>

</html>
