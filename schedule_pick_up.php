<?php $Page_Title = "Schedule A Pick-Up"; ?>

<?php require_once("inc/db.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php require_once("inc/sessions.php"); ?>

 
<?php
if (isset($_POST["Submit"])) {
    if (!empty($_POST["Sender_Firstname"])&&!empty($_POST["Sender_Lastname"])
        &&!empty($_POST["Sender_Email"])&&!empty($_POST["Sender_Phonenumber"])
        &&!empty($_POST["Recv_Firstname"])&&!empty($_POST["Recv_Lastname"])
        &&!empty($_POST["Recv_Email"])&&!empty($_POST["Recv_Phonenumber"])
        &&!empty($_POST["Pickup_Address"])&&!empty($_POST["Delivery_Address"])
        &&!empty($_POST["Nr_Pk_Busstop"])&&!empty($_POST["Nr_Dlv_Busstop"])
        &&!empty($_POST["Pk_Date"])&&!empty($_POST["Delv_Date"])
        &&!empty($_POST["Pkg_Content"])&&!empty($_POST["Pkg_Weight"]))
        {

        $Booking_ID = Booking_ID_NUM(10);
        date_default_timezone_set("Africa/Lagos");
        $CurrentTime =  time();
        $DateTime = strftime("%B-%d-%Y at %I:%M:%S:%p",$CurrentTime);
        $Sender_Firstname       = $_POST["Sender_Firstname"];
        $Sender_Lastname        = $_POST["Sender_Lastname"];
        $Sender_Email           = $_POST["Sender_Email"];
        $Sender_Phonenumber     = $_POST["Sender_Phonenumber"];
        $Recv_Firstname         = $_POST["Recv_Firstname"];
        $Recv_Lastname          = $_POST["Recv_Lastname"];
        $Recv_Email             = $_POST["Recv_Email"];
        $Recv_Phonenumber       = $_POST["Recv_Phonenumber"];
        $Pickup_Address         = $_POST["Pickup_Address"];
        $Delivery_Address       = $_POST["Delivery_Address"];
        $Nr_Pk_Busstop          = $_POST["Nr_Pk_Busstop"];
        $Nr_Dlv_Busstop         = $_POST["Nr_Dlv_Busstop"];
        $Pk_State               = $_POST["Pk_State"];
        $Delv_State             = $_POST["Delv_State"];
        $Pk_Date                = $_POST["Pk_Date"];
        $Delv_Date              = $_POST["Delv_Date"];
        $Pkg_Content            = $_POST["Pkg_Content"];
        $Pkg_Weight             = $_POST["Pkg_Weight"];
        $Special_Request        = $_POST["Special_Request"];
        $Delivery_Status        = "Pending";

        // check if Sender FirstName syntax is valid or not
        if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Sender_Firstname)){
        $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
        }
        // check if Sender LastName syntax is valid or not
        if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Sender_Lastname)){
        $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
        }
        // check if Receiver e-mail address syntax is valid or not
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Sender_Email))
        {
        $_SESSION["ErrorMessageForRg"]="Invalid Email Format";
        }
        // check if Sender PhoneNumber syntax is valid or not
        if(!preg_match("/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})/",$Sender_Phonenumber)){
        $_SESSION["ErrorMessageForRg"]="Invalid PhoneNumber Format";
        }
        // check if Receiver FirstName syntax is valid or not
        if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Recv_Firstname)){
        $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
        }
        // check if Receiver LastName syntax is valid or not
        if(!preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Recv_Lastname)){
        $_SESSION["ErrorMessageForRg"]="Invalid Name Format";
        }
        // check if Receiver e-mail address syntax is valid or not
        if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Recv_Email))
        {
        $_SESSION["ErrorMessageForRg"]="Invalid Email Format";
        }
        // check if Receiver PhoneNumber syntax is valid or not
        if(!preg_match("/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})/",$Recv_Phonenumber)){
        $_SESSION["ErrorMessageForRg"]="Invalid PhoneNumber Format";
        }
        // check if Pick-Up address Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pickup_Address)){
        $_SESSION["ErrorMessageForRg"]="Invalid Address format";
        }
        // check if Delivery address Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Delivery_Address)){
        $_SESSION["ErrorMessageForRg"]="Invalid Address format";
        }
        // check if Nearest Pick-Up Bus-Stop Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Nr_Pk_Busstop)){
        $_SESSION["ErrorMessageForRg"]="Invalid Address format";
        }
        // check if Nearest Delivery Bus Stop Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Nr_Dlv_Busstop)){
        $_SESSION["ErrorMessageForRg"]="Invalid Address format";
        }
        // check if Pick-Up State Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pk_State)){
        $_SESSION["ErrorMessageForRg"]="Invalid Address format";
        }
        // check if Delivery State Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Delv_State)){
        $_SESSION["ErrorMessageForRg"]="Invalid Address format";
        }
        // check if Pick-Up Date Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pk_Date)){
        $_SESSION["ErrorMessageForRg"]="Invalid Date format";
        }
        // check if Delivery Date Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Delv_Date)){
        $_SESSION["ErrorMessageForRg"]="Invalid Date format";
        }
         // check if Package Content Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pkg_Content)){
        $_SESSION["ErrorMessageForRg"]="Invalid format";
        }
         // check if Package Weight Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pkg_Weight)){
        $_SESSION["ErrorMessageForRg"]="Invalid format";
        }
         // check if Special Request Syntax is valid or not
        if(!preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Special_Request)){
        $_SESSION["ErrorMessageForRg"]="Invalid format";
        }




        if((preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Sender_Firstname)==true)
            &&(preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Sender_Lastname)==true)
            &&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Sender_Email)==true)
            &&(preg_match("/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})/",$Sender_Phonenumber)==true)
            &&(preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Recv_Firstname)==true)
            &&(preg_match("/^[A-Za-z0-9\.\-\ \'\ ]*$/",$Recv_Lastname)==true)
            &&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Recv_Email)==true)
            &&(preg_match("/\+?([0-9]{2})-?([0-9]{3})-?([0-9]{6,7})/",$Recv_Phonenumber)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pickup_Address)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Delivery_Address)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Nr_Pk_Busstop)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Nr_Dlv_Busstop)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pk_State)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Delv_State)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pk_Date)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Delv_Date)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pkg_Content)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Pkg_Weight)==true)
            &&(preg_match("/[A-Za-z0-9\-\\&\\,.]+/",$Special_Request)==true))
        {

            global $ConnectingDB;
            $sql = "INSERT INTO pickup_schedule(Booking_ID, datetime, Sender_Firstname, Sender_Lastname, Sender_Email, Sender_Phonenumber, Recv_Firstname, Recv_Lastname, Recv_Email, Recv_Phonenumber, Pickup_Address, Delivery_Address, Nr_Pk_Busstop, Nr_Dlv_Busstop, Pk_State, Delv_State, Pk_Date, Delv_Date, Pkg_Content, Pkg_Weight, Special_Request, Delivery_Status)
            VALUES(:BooKing_ID, :dateTime, :Sender_FirstnamE, :Sender_LastnamE, :Sender_EmaiL, :Sender_PhonenumbeR, :Recv_FirstnamE, :Recv_LastnamE, :Recv_EmaiL, :Recv_PhonenumbeR, :Pickup_AddresS, :Delivery_AddresS, :Nr_Pk_BusstoP, :Nr_Dlv_BusstoP, :Pk_StatE, :Delv_StatE, :Pk_DatE, :Delv_DatE, :Pkg_ContenT, :Pkg_WeighT, :Special_RequesT, :Delivery_StatuS)";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':BooKing_ID', $Booking_ID);
            $stmt->bindValue(':dateTime', $DateTime);
            $stmt->bindValue(':Sender_FirstnamE', $Sender_Firstname);
            $stmt->bindValue(':Sender_LastnamE', $Sender_Lastname);
            $stmt->bindValue(':Sender_EmaiL', $Sender_Email);
            $stmt->bindValue(':Sender_PhonenumbeR', $Sender_Phonenumber);
            $stmt->bindValue(':Recv_FirstnamE', $Recv_Firstname);
            $stmt->bindValue(':Recv_LastnamE', $Recv_Lastname);
            $stmt->bindValue(':Recv_EmaiL', $Recv_Email);
            $stmt->bindValue(':Recv_PhonenumbeR', $Recv_Phonenumber);
            $stmt->bindValue(':Pickup_AddresS', $Pickup_Address);
            $stmt->bindValue(':Delivery_AddresS', $Delivery_Address);
            $stmt->bindValue(':Nr_Pk_BusstoP', $Nr_Pk_Busstop);
            $stmt->bindValue(':Nr_Dlv_BusstoP', $Nr_Dlv_Busstop);
            $stmt->bindValue(':Pk_StatE', $Pk_State);
            $stmt->bindValue(':Delv_StatE', $Delv_State);
            $stmt->bindValue(':Pk_DatE', $Pk_Date);
            $stmt->bindValue(':Delv_DatE', $Delv_Date);
            $stmt->bindValue(':Pkg_ContenT', $Pkg_Content);
            $stmt->bindValue(':Pkg_WeighT', $Pkg_Weight);
            $stmt->bindValue(':Special_RequesT', $Special_Request);
            $stmt->bindValue(':Delivery_StatuS', $Delivery_Status);

            // $ToEmail = 'waleborokini@gmail.com';
            // $EmailSubject ='TEKO COURIER (Pick-Up Schedule Information)';
            // $mailheader =  "From: ". 'tekocourier.com' ."\r\n";
            // $mailheader = "Content-type: text/html; charset=iso-8859-1\r\n";
            // $Message_Body = "Booking ID: ".$Booking_ID."";
            // $Message_Body = "Sender's First Name: ".$Sender_Firstname."";
            // mail($ToEmail, $EmailSubject, $Message_Body, $mailheader ) or die ("Failure");


            $Execute = $stmt->execute();
            if ($Execute) {
                $_SESSION["SuccessMessage"]="Your Booking Was Successful !";
            }
        }
    }else {
            $_SESSION["ErrorMessage"]="Please Fill in All Fields Correctly" ;
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
                                <h3>Schedule A Pick Up</h3>
                                <p>Please Fill In All Fields Correctly</p>
                                <br>
                                <?php
                                   echo ErrorMessage();
                                   echo SuccessMessage();
                                   echo ErrorMessageForRg();
                                ?>
                                <form action="schedule_pick_up.php" method="POST">
                                        <!-- <div style="display:none;" class="row">
                                            <div class="col-sm-6 col-md-6 text-center">
                                                <div class="form-group">
                                                     <input name="" id="" type="" class="form-control" placeholder="Booking_ID" value="<?php  ?>">
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 text-center">
                                                <div class="form-group">
                                                     <input name="Delivery_Status" id="" type="text" class="form-control" placeholder="Delivery Status">
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>  
                                        </div> -->
                                        <div class="row">
                                            <div class="text-center schedule-header">
                                                <h4>Sender's Information</h4>
                                            </div>
                                            <div class="col-sm-6 col-md-6 text-center">
                                                <div class="form-group">
                                                     <input name="Sender_Firstname" id="Sender_Firstname" type="text" class="form-control" placeholder="First Name"   autofocus="" />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 text-center">
                                                <div class="form-group">
                                                     <input name="Sender_Lastname" id="Sender_Lastname" type="text" class="form-control" placeholder="Last Name"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Sender_Email" id="Sender_Email" type="" class="form-control" placeholder="Email"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Sender_Phonenumber" id="Sender_Phonenumber" type="text"  class="form-control" placeholder="Phone Number"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="text-center schedule-header">
                                                <h4>Receiver's Information</h4>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Recv_Firstname" id="Recv_Firstname" type="text" class="form-control" placeholder="First Name"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Recv_Lastname" id="Recv_Lastname" type="text" class="form-control" placeholder="Last Name"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Recv_Email" id="Recv_Email" type="text" class="form-control" placeholder="Email"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Recv_Phonenumber" id="Recv_Phonenumber" type="text" class="form-control" placeholder="Phone Number"  />
                                                     <span><i class="fa fa-user"></i></span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="text-center schedule-header">
                                                <h4>Pick Up And Delivery Information</h4>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <textarea name="Pickup_Address"
                                                     id="Pickup_Address" class="form-control" rows="4" placeholder="Pick Up Address"></textarea>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <textarea name="Delivery_Address" id="Delivery_Address" class="form-control" rows="4" placeholder="Delivery Address"></textarea>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Nr_Pk_Busstop" id="Nr_Pk_Busstop" type="text" class="form-control" placeholder="Nearest Pick-Up Bus Stop"></input>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Nr_Dlv_Busstop" id="Nr_Dlv_Busstop" type="text" class="form-control" placeholder="Nearest Delivery Bus Stop"></input>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Pk_State" id="Pk_State" type="text" class="form-control" placeholder="Pick-Up State/City"></input>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Delv_State" id="Delv_State" type="text" class="form-control" placeholder="Delivery State/City"></input>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Pk_Date" id="Pk_Date" type="text" class="form-control dpd1" placeholder="Pick-Up Date"></input>
                                                     <span><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <input name="Delv_Date" id="Delv_Date" type="text" class="form-control dpd2" placeholder="Delivery Date" >
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="text-center schedule-header">
                                                <h4>Package Information</h4>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                     <input name="Pkg_Content" id="Pkg_Content" type="text" class="form-control" placeholder="Pakage Content"></input>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <select name="Pkg_Weight" id="Pkg_Weight" class="form-control">
                                                        <option selected>Weight</option>
                                                        <option>1kg and Below</option>
                                                        <option>2kg</option>
                                                        <option>3kg</option>
                                                        <option>4kg</option>
                                                        <option>5kg</option>
                                                        <option>Above 5kg</option>
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                            <div class="text-center schedule-header">
                                                <h4>Special Request</h4>
                                                <p>indicate if item is fragile, sensitive or requires special handling</p>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                     <textarea name="Special_Request" id="Special_Request" class="form-control" rows="4" placeholder="Special Information"></textarea>
                                                     <span><i class="fa fa-pencil"></i></span>
                                                </div>
                                            </div>  
                                        </div>                                    
                                    
                                    <button type="Submit" name="Submit" class="btn btn-danger btn-block">Send</button>
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