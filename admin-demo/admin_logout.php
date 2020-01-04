<?php require_once("../inc/functions.php"); ?>
<?php require_once("../inc/sessions.php"); ?>
<?php
$_SESSION["UserId"]=null;
$_SESSION["UserName"]=null;
$_SESSION["AdminName"]=null;
session_destroy();
Redirect_to("../admin_login.php");
?>
