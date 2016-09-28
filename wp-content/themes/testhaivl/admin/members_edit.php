<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

$USERID = intval($_REQUEST['USERID']);

if($_POST['submitform'] == "1")
{
	if($USERID > 0)
	{
		$arr = array("username", "email", "fullname", "website", "country", "verified", "status");
		foreach ($arr as $value)
		{
			$sql = "update members set $value='".mysql_real_escape_string($_POST[$value])."' where USERID='".mysql_real_escape_string($USERID)."'";
			$conn->execute($sql);
		}
		
		$sql = "update members set description='".mysql_real_escape_string($_POST[vdescription])."' where USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($sql);
		
		$newpass2 = $_POST['newpass2'];
		if($newpass2 != "")
		{
			$newpass = md5($newpass2);
			$sql = "update members set password='".mysql_real_escape_string($newpass)."', pwd='".mysql_real_escape_string($newpass2)."' where USERID='".mysql_real_escape_string($USERID)."'";
			$conn->execute($sql);
		}
		
		$message = "Member Successfully Edited.";
		Stemplate::assign('message',$message);
	}
}

if($USERID > 0)
{
	$query = $conn->execute("select * from members where USERID='".mysql_real_escape_string($USERID)."' limit 1");
	$member = $query->getrows();
	Stemplate::assign('member', $member[0]);
}

$mainmenu = "7";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/members_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>