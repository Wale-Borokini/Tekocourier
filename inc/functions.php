<?php 
function Booking_ID_NUM($length){
	$token = "TEK";
	$codeAlphabet = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
	
	$max = strlen($codeAlphabet);

		for ($i=0; $i < $length; $i++)
	{
			$token .= $codeAlphabet [random_int(0, $max-1)];
		}

		return $token;

}




function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;
}




function CheckUserNameExistsOrNot($Username){
  global $ConnectingDB;
  $sql    = "SELECT Username FROM admins WHERE Username=:userName";
  $stmt   = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':userName',$Username);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return true;
  }else {
    return false;
  }
}

function Track_Package_Attempt($checkBookingId){
  global $ConnectingDB;
  $sql = "SELECT * FROM pickup_schedule WHERE Booking_ID = '$checkBookingId' LIMIT 1";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':checkBooKingId',$checkBookingId);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return $DataRows=$stmt->fetch();
  }else {
    return null;
  }

}


function Login_Attempt($Username){
  global $ConnectingDB;
  $sql = "SELECT * FROM admins WHERE Username=:UserName LIMIT 1";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':UserName',$Username);
  // $stmt->bindValue(':PassworD',$hash);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result==1) {
    return $Found_Account=$stmt->fetch();
  }else {
    return null;
  }
}

function Confirm_Login(){
if (isset($_SESSION["UserId"])) {
  return true;
}  else {
  $_SESSION["ErrorMessage"]="Login Required !";
  Redirect_to("../admin_login.php");
}
}

function Confirm_Booking_Id(){
if (isset($_SESSION["Booking_ID"])) {
  return true;
}  else {
  $_SESSION["ErrorMessage"]="Please Enter Your Booking ID !";
  Redirect_to("track_package.php");
}
}

function TotalPendingBookings(){
  global $ConnectingDB;
  $sql = "SELECT COUNT(*) FROM pickup_schedule WHERE Delivery_Status='Pending' ";
  $stmt = $ConnectingDB->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalPendingBookings=array_shift($TotalRows);
  echo $TotalPendingBookings;
}

function TotalDeliveredPackages(){
  global $ConnectingDB;
  $sql = "SELECT COUNT(*) FROM pickup_schedule WHERE Delivery_Status='Delivered' ";
  $stmt = $ConnectingDB->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalDeliveredPackages=array_shift($TotalRows);
  echo $TotalDeliveredPackages;
}

function TotalMovingPackages(){
  global $ConnectingDB;
  $sql = "SELECT COUNT(*) FROM pickup_schedule WHERE Delivery_Status='Moving' ";
  $stmt = $ConnectingDB->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalMovingPackages=array_shift($TotalRows);
  echo $TotalMovingPackages;
}

function TotalPendingPackages(){
  global $ConnectingDB;
  $sql = "SELECT COUNT(*) FROM pickup_schedule WHERE Delivery_Status='Pending' ";
  $stmt = $ConnectingDB->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalPendingPackages=array_shift($TotalRows);
  echo $TotalPendingPackages;
}

function TotalContactMessages(){
  global $ConnectingDB;
  $sql = "SELECT COUNT(*) FROM contact_form_messages";
  $stmt = $ConnectingDB->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalContactMessages=array_shift($TotalRows);
  echo $TotalContactMessages;
}

function TotalAdminOperators(){
  global $ConnectingDB;
  $sql = "SELECT COUNT(*) FROM Admins";
  $stmt = $ConnectingDB->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalAdminOperators=array_shift($TotalRows);
  echo $TotalAdminOperators;
}















 ?>