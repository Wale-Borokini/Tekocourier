<?php require_once("../inc/db.php"); ?>
<?php require_once("../inc/functions.php"); ?>
<?php require_once("../inc/sessions.php"); ?>

<?php

$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
// echo $_SESSION["TrackingURL"];
Confirm_Login(); 

?>


<?php

if(isset($_POST["Submit"])){
  $Username           = $_POST["Username"];
  $Admin_name         = $_POST["Admin_name"];
  $Admin_Role         = $_POST["Admin_Role"];
  $Password           = $_POST["Password"];
  $Confirm_Password   = $_POST["Confirm_Password"];
  $hash               = password_hash($Password, PASSWORD_BCRYPT);
  $Admin              = $_SESSION["Admin_name"];
  date_default_timezone_set("Africa/Lagos");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %I:%M:%p",$CurrentTime);

  if(empty($Username)||empty($Password)||empty($Confirm_Password)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("manage_admins.php");
  }elseif (strlen($Password)<4) {
    $_SESSION["ErrorMessage"]= "Password should be greater than 3 characters";
    Redirect_to("manage_admins.php");
  }elseif ($Password !== $Confirm_Password) {
    $_SESSION["ErrorMessage"]= "Password and Confirm Password should match";
    Redirect_to("manage_admins.php");
  }elseif (CheckUserNameExistsOrNot($Username)) {
    $_SESSION["ErrorMessage"]= "Username Exists. Try Another One! ";
    Redirect_to("manage_admins.php");
  }else{
    // Query to insert new admin in DB When everything is fine
    global $ConnectingDB;
    $sql = "INSERT INTO admins(datetime, Username, Password, Admin_name, Admin_Role, Added_by)";
    $sql .= "VALUES(:dateTime, :userName, :passworD, :Admin_namE, :Admin_RolE, :adminName)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':userName',$Username);
    $stmt->bindValue(':passworD',$hash);
    $stmt->bindValue(':Admin_namE',$Admin_name);
    $stmt->bindValue(':Admin_RolE', $Admin_Role);
    $stmt->bindValue(':adminName',$Admin);
    $Execute=$stmt->execute();
    if($Execute){
      $_SESSION["SuccessMessage"]="New Admin with the name of ".$Admin_name." added Successfully";
      Redirect_to("manage_admins.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("manage_admins.php");
    }
  }
} //Ending of Submit Button If-Condition


?>


<?php 
  if ($_SESSION["Admin_Role"] == 'Administrator') {

 ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Manage Admins</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    

    <!-- Framework Stylesheets Start-->

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min4.2.1.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot4.2.1.css">

    <!-- Data Tables Stylesheet -->
    
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
        <div class="content add-details change-password">
          <div class="in-content-wrapper">
            <div class="row no-gutters">

              <div class="col">
                <div class="heading-messages text-center">
                  <h3>Manage Admins</h3>
                </div> <!-- End heading-messages -->
              </div> <!-- End column -->
            </div><!-- End row -->

            <div class="box">

              <div class="row">
                <div class="col">
                  <div class="details-text">
                    <h4>Add New Admin</h4>
                    <br>
                    <?php
                     echo ErrorMessage();
                     echo SuccessMessage();
                    ?>
                  </div><!-- End details-text -->
                </div><!-- End column -->
              </div><!-- End row -->
              <div class="hotel-listing-form">
                <form action="manage_admins.php" method="POST" class="text-center">
                  <div class="row">
                    <div class="col">
                      <div class="form-row">
                        <div class="col-md">
                          <div class="form-group">
                            <label class="">Username:</label>
                            <input type="text" name="Username" id="Username" class="form-control" required>
                          </div><!-- end form-group -->
                        </div><!-- End column -->
                      </div><!-- End form-row -->
                      <div class="form-row">
                        <div class="col-md">
                          <div class="form-group">
                            <label class="">Admin Name:</label>
                            <input type="text" name="Admin_name" id="Admin_name" class="form-control" required>
                          </div><!-- end form-group -->
                        </div><!-- end column -->
                      </div><!-- end form-row -->
                      <div class="form-row">
                        <div class="col-md">
                          <div class="form-group">
                            <label class="">Admin Role:</label>
                            <select type="text" name="Admin_Role" id="Admin_Role" class="form-control" required>
                              <option>Choose Role</option>
                              <option>Administrator</option>
                              <option>Operator</option>
                            </select>
                          </div><!-- end form-group -->
                        </div><!-- end column -->
                      </div><!-- end form-row -->
                      <div class="form-row">
                        <div class="col-md">
                          <div class="form-group">
                            <label class="">Password:</label>
                            <input type="password" name="Password" id="Password" class="form-control" required>
                          </div><!-- end form-group -->
                        </div><!-- End column -->
                      </div><!-- End form-row -->
                      <div class="form-row">
                        <div class="col-md">
                          <div class="form-group">
                            <label class="">Confirm Password:</label>
                            <input type="password" name="Confirm_Password" id="Confirm_Password" class="form-control" required>
                          </div><!-- end form-group -->
                        </div><!-- End column -->
                      </div><!-- End form-row -->

                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <button type="submit" name="Submit" class="btn">Add Admin</button>
                        </li>
                        <!-- <li class="list-inline-item">
                          <button type="" class="btn">Cancel</button>
                        </li> -->
                      </ul>
                    </div><!-- End column -->
                  </div><!-- End row -->

                </form>
              </div><!-- End hotel-listing-form -->
            </div><!-- End Box -->
          </div><!-- End in-content-wrapper -->
        </div><!-- End change-password -->
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

  </body>

  </html>

<?php }else{
  Redirect_to("../error_page.php");
}

 ?>