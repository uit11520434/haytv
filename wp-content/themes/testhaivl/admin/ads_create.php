<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

if($_POST['submitform'] == "1")
{
	$details = $_POST[details];
	$adcode = $_POST[code];
	$active = intval($_POST[active]);
	
	if($details == "")
	{
		$error = "Error: Please enter a description.";
	}
	elseif($adcode == "")
	{
		$error = "Error: Please enter your advertisement code.";
	}
	else
	{
		$sql = "insert advertisements set description='".mysql_real_escape_string($details)."', code='".mysql_real_escape_string($adcode)."', active='".mysql_real_escape_string($active)."'";
		$conn->execute($sql);
		$message = "Advertisement Successfully Added.";
		Stemplate::assign('message',$message);
	}
}

$mainmenu = "11";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/ads_create.tpl");
STemplate::display("administrator/global_footer.tpl");
?>