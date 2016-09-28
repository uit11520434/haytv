<?php
$lskip = "1";
include("include/config.php");
destroy_slrememberme($_SESSION['USERNAME']);
$_SESSION['USERID']="";
$_SESSION['EMAIL']="";
$_SESSION['USERNAME']="";
$_SESSION['VERIFIED']="";
$_SESSION['FILTER']="";
$_SESSION['FB']="";
header("location: $config[baseurl]/");
?>
