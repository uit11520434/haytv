<?php
include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);
destroy_slrememberme($_SESSION['USERNAME']);
$_SESSION['USERID']="";
$_SESSION['EMAIL']="";
$_SESSION['USERNAME']="";
$_SESSION['VERIFIED']="";
$_SESSION['FILTER']="";
$_SESSION['FB']="";
header("location: $config[baseurl]/m/");
?>
