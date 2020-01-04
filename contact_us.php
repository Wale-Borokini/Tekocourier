<?php $Page_Title = "Contact Us"; ?>

<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>



<?php

if(isset($_POST["Submit"])){
  $Contact_name         = $_POST["Contact_name"];
  $Contact_email        = $_POST["Contact_email"];
  $Contact_subject      = $_POST["Contact_subject"];
  $Contact_message      = $_POST["Contact_message"];
  date_default_timezone_set("Africa/Lagos");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S:%p",$CurrentTime);

  


  if(empty($Contact_name)||empty($Contact_email)||empty($Contact_subject)||empty($Contact_message)){
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("contact_us.php");
    }else{


    // check if Name syntax is valid or not
    if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Contact_name)){
    $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
    Redirect_to("contact_us.php");
    }
    // check if e-mail address syntax is valid or not
    if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Contact_email)){
    $_SESSION["ErrorMessageForRg"]="Invalid Email Format";
    }
    // check if Special Request Syntax is valid or not
    if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Contact_subject)){
    $_SESSION["ErrorMessageForRg"]="Invalid Subject format";
    }
    // check if Special Request Syntax is valid or not
    if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Contact_message)){
    $_SESSION["ErrorMessageForRg"]="Invalid Message format";
    }




    if((preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Contact_name)==true)
        &&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Contact_email)==true)
        &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Contact_subject)==true)
        &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Contact_message)==true))
    {



    // Query to send contact message in DB When everything is fine
    global $ConnectingDB;
    $sql = "INSERT INTO Contact_Form_Messages(datetime,Contact_name,Contact_email,Contact_subject,Contact_message)";
    $sql .= "VALUES(:dateTime,:Contact_naMe,:Contact_emaIl,:Contact_subjeCt,:Contact_messAge)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':Contact_naMe',$Contact_name);
    $stmt->bindValue(':Contact_emaIl',$Contact_email);
    $stmt->bindValue(':Contact_subjeCt',$Contact_subject);
    $stmt->bindValue(':Contact_messAge',$Contact_message);
    $Execute=$stmt->execute();
    if($Execute){
      $_SESSION["SuccessMessage"]="Your Message has been sent Successfully";
      Redirect_to("contact_us.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("contact_us.php");
    }
  }
} //Ending of Submit Button If-Condition
}



?>





<!--======================== Header Start =========== -->

<?php include("inc/header.php"); ?>
        
<!--================= Header End ============== --> 

                        <br>
                        <?php
                        echo ErrorMessage();
                        echo SuccessMessage();
                        echo ErrorMessageForRg();
                        ?>       
        
    	<section class="innerpage-wrapper">
            <div id="contact-us-2">

                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15853.765094390512!2d3.2808190769862144!3d6.591947023723811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b90488c731c27%3A0xc88e6801883c6494!2sEgbeda%2C+Lagos!5e0!3m2!1sen!2sng!4v1566255656407!5m2!1sen!2sng" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div><!-- end map -->
        
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-4"> 
                                    <div class="contact-block-2">  
                                        <span class="border-shape-top"></span>                       
                                        <span><i class="fa fa-map-marker"></i></span>
                                        <h4>Find us at</h4>
                                        <p>Lagos, Nigeria.</p>
                                        <span class="border-shape-bot"></span>
                                    </div><!-- end contact-block-2 -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-4"> 
                                    <div class="contact-block-2">   
                                        <span class="border-shape-top"></span>                      
                                        <span><i class="fa fa-envelope"></i></span>
                                        <h4>Email us at</h4>
                                        <p>tekocourier.com</p>
                                        <span class="border-shape-bot"></span>
                                    </div><!-- end contact-block-2 -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-4"> 
                                    <div class="contact-block-2">          
                                        <span class="border-shape-top"></span>               
                                        <span><i class="fa fa-phone"></i></span>
                                        <h4>Call us at</h4>
                                        <p>+234 12345 3456</p>
                                        <span class="border-shape-bot"></span>
                                    </div><!-- end contact-block-2 -->
                                </div><!-- end columns -->
                            </div><!-- end row -->
                            
                            <div id="contact-form-2" class="innerpage-section-padding">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-10 col-lg-offset-1">
                                        <div class="page-heading">
                                            <h2>Contact Us</h2>
                                            <hr class="heading-line" />
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                            
                                                <form action="contact_us.php" method="POST">
                                                    
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group">
                                                                 <input type="text" name="Contact_name" id="Contact_name" class="form-control" placeholder="Name" required/>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group">
                                                                 <input type="email" name="Contact_email" id="Contact_email" class="form-control" placeholder="Email" required/>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                         <input type="text" name="Contact_subject" id="Contact_subject" class="form-control" placeholder="Subject" required/>
                                                    </div>
                    
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="4" name="Contact_message" id="Contact_message" placeholder="Your Message" required></textarea>
                                                    </div>
                                                    
                                                    <div class="text-center">
                                                        <button type="submit" name="Submit" class="btn btn-orange">Send</button>
                                                    </div>
                                                </form>
                                            
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
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