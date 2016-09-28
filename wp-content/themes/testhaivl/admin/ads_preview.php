<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

$AID = intval($_REQUEST[AID]);
if($AID > 0)
{
	$query = $conn->execute("select code from advertisements where AID='".mysql_real_escape_string($AID)."' limit 1");
	$ad = $query->getrows();
	Stemplate::assign('ad', $ad[0]);
}

$mainmenu = "11";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/ads_preview.tpl");
STemplate::display("administrator/global_footer.tpl");
?>