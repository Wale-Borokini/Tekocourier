<?php $Page_Title = "Admin Login"; ?>


<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

<?php 

if(isset($_SESSION["UserId"])){
  Redirect_to("admin-demo/admin_dashboard.php");
}

if (isset($_POST["Submit"])) {
  $Username = $_POST["Username"];
  $Password = $_POST["Password"];
  // $hash               = password_hash($Password, PASSWORD_BCRYPT);
  // $Pass_Verify        = password_verify($_POST["Password"], $hash);
  if (empty($Username)||empty($Password)) {
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("admin_login.php");
  }else {
    // code for checking username and password from Database
  
    $Found_Account=Login_Attempt($Username);
    if ($Found_Account && password_verify($_POST["Password"], $Found_Account["Password"])) {

      $_SESSION["UserId"]=$Found_Account["id"];
      $_SESSION["Username"]=$Found_Account["Username"];
      $_SESSION["Admin_name"]=$Found_Account["Admin_name"];
      $_SESSION["Admin_Role"]=$Found_Account["Admin_Role"];
      $_SESSION["SuccessMessage"]= "Welcome ". $_SESSION["Admin_name"]."!";
      if (isset($_SESSION["TrackingURL"])) {
        Redirect_to($_SESSION["TrackingURL"]);
      }else{
      Redirect_to("admin-demo/admin_dashboard.php");
    }
    }else {
      $_SESSION["ErrorMessage"]="Incorrect Username OR Password";
      Redirect_to("admin_login.php");
    }
  }
}

 ?>    
       
               
<!--======================== Header Start =========== -->

<?php include("inc/header.php"); ?>
        
    <section>
        <div class="colored-border"></div>
        <div id="full-page-form">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div class="full-page-title">
                            <h3 class="company-name">Teko</span>Courier</h3>
                            
                        </div><!-- end full-page-title -->
                        
                        <div class="custom-form custom-form-fields">
                            <br>
                            <?php
                               echo ErrorMessage();
                               echo SuccessMessage();
                            ?>
                            <h3>Login</h3>
                            <form action="admin_login.php" method="POST"> 
                                <div class="form-group">
                                     <input type="text" name="Username" class="form-control" placeholder="Username"  required/>
                                     <span><i class="fa fa-user"></i></span>
                                </div>
                                
                                <div class="form-group">
                                     <input type="password" name="Password" class="form-control" placeholder="Password"  required/>
                                     <span><i class="fa fa-lock"></i></span>
                                </div>
            
                                <button type="submit" name="Submit" class="btn btn-orange btn-block">Login</button>
                            </form>
                            
                        </div><!-- end custom-form -->
                        
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end full-page-form -->
        <div class="colored-border"></div>
    </section>
        
         
 
<!-- ============ Footer Start================ -->

<?php include("inc/footer.php"); ?>

<!-- Foter End -->       
        
        
        
        
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