<?php require_once("../inc/db.php"); ?>
<?php require_once("../inc/functions.php"); ?>
<?php require_once("../inc/sessions.php"); ?>


<?php
if(isset($_GET["id"])){
  $SearchQueryParameter = $_GET["id"];
  global $ConnectingDB;
  $Admin = $_SESSION["AdminName"];
  $sql = "UPDATE pickup_schedule SET Delivery_Status='Delivered' WHERE id='$SearchQueryParameter'";
  $Execute = $ConnectingDB->query($sql);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="Delivery Status Has Been Changed To (Delivered) ! ";
    Redirect_to("show_delivered_packages.php");
    // code...
  }else {
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
    Redirect_to("show_delivered_packages.php");
  }
}
?>