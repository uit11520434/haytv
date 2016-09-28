<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

$AID = intval($_REQUEST[AID]);

if($_POST['submitform'] == "1")
{
	$details = $_POST[details];
	$adcode = $_POST[code];
	$active = intval($_POST[active]);
	
	if($AID > 0)
	{
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
			$sql = "UPDATE advertisements set description='".mysql_real_escape_string($details)."', code='".mysql_real_escape_string($adcode)."', active='".mysql_real_escape_string($active)."' WHERE AID='".mysql_real_escape_string($AID)."'";
			$conn->execute($sql);
			$message = "Advertisement Successfully Edited.";
			Stemplate::assign('message',$message);
		}
	}
}

if($AID > 0)
{
	$query = $conn->execute("select * from advertisements where AID='".mysql_real_escape_string($AID)."' limit 1");
	$ad = $query->getrows();
	Stemplate::assign('ad', $ad[0]);
}

$mainmenu = "11";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/ads_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>