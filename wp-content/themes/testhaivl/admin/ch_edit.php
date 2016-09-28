<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

$CID = intval($_REQUEST[CID]);

if($_POST['submitform'] == "1")
{
	$cname = $_POST[cname];
	if($CID > 0)
	{
		if($cname == "")
		{
			$error = "Error: Please enter a channel name.";
		}
		else
		{
			$sql = "UPDATE channels set cname='".mysql_real_escape_string($cname)."' WHERE CID='".mysql_real_escape_string($CID)."'";
			$conn->execute($sql);
			$message = "Channel Successfully Edited.";
			Stemplate::assign('message',$message);
		}
	}
}

if($CID > 0)
{
	$query = $conn->execute("select * from channels where CID='".mysql_real_escape_string($CID)."' limit 1");
	$c = $query->getrows();
	Stemplate::assign('c', $c[0]);
}

$mainmenu = "6";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/ch_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>