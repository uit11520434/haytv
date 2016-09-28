<?php
$lskip = "1";
include("include/config.php");
include("include/functions/import.php");

$SID = intval($_SESSION['USERID']);
if($SID > 0)
{
	if($_REQUEST['jlog'] == "1")
	{
		$user_username = cleanit($_REQUEST['username']);
		if($user_username == "")
		{
			$error .= $lang['4'];	
		}
		elseif(strlen($user_username) < 2)
		{
			$error .= $lang['8'];	
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/i",$user_username))
		{
			$error .= $lang['7'];
		}
		elseif(!verify_email_username($user_username))
		{
			$error .= $lang['6'];
		}
		
		if($error == "")
		{
			$query="UPDATE members SET username='".mysql_real_escape_string($user_username)."' WHERE USERID='".mysql_real_escape_string($SID)."'";
			$result=$conn->execute($query);
			$_SESSION['USERNAME']=$user_username;
			header("Location:$config[baseurl]/settings");exit;
		}
	}
}

STemplate::assign('message',$message);
STemplate::assign('error',$error);

//TEMPLATES BEGIN
STemplate::display('selectusername.tpl');
//TEMPLATES END
?>