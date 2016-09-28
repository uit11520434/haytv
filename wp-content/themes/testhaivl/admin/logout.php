<?php

include("../include/config.php");
$_SESSION['ADMINID'] = "";
$_SESSION['ADMINUSERNAME'] = "";
$_SESSION['ADMINPASSWORD'] = "";
session_destroy();
header("location: index.php");
?>
