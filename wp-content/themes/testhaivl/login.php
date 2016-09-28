<?php

include("include/config.php");
include("include/functions/import.php");

$r = base64_decode($redirect);
STemplate::assign('r',$r);

if ($_SESSION['USERID'] != "" && $redirect != "")
{
	header("Location:$redirect");exit;
}

if($_REQUEST['logsub']!="")
{
	$username = htmlentities(strip_tags($_REQUEST['username']), ENT_COMPAT, "UTF-8");
	$password = htmlentities(strip_tags($_REQUEST['password']), ENT_COMPAT, "UTF-8");
	$user_email = htmlentities(strip_tags($_REQUEST['email']), ENT_COMPAT, "UTF-8");
	
	if($user_email == "")
	{
		if($username=="")
		{
			$error=$lang['4'];
		}
		elseif($password=="")
		{
			$error=$lang['5'];
		}
		else
		{
			if(!verify_valid_email($username))
			{				
				$encryptedpassword = md5($password);
				$query="SELECT status,USERID,email,username,verified,filter,mylang from members WHERE username='".mysql_real_escape_string($username)."' and password='".mysql_real_escape_string($encryptedpassword)."'";
				$result=$conn->execute($query);
				
				if($result->recordcount()<1)
				{
					$error=$lang['26'];
				}
				elseif($result->fields['status']=="0")
				{
					$error = $lang['30'];
				}
		
				if($error=="")
				{
					$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE username='".mysql_real_escape_string($username)."'";
					$conn->execute($query);
					$_SESSION['USERID']=$result->fields['USERID'];
					$_SESSION['EMAIL']=$result->fields['email'];
					$_SESSION['USERNAME']=$result->fields['username'];
					$_SESSION['VERIFIED']=$result->fields['verified'];
					$_SESSION['FILTER']=$result->fields['filter'];
					$setlang = $result->fields['mylang'];
					if($setlang != "")
					{
						$addlang = "?language=".$setlang;	
					}
					if($_REQUEST["rememberme"])
					{
						create_slrememberme();
					}
					
					$redirect = $_SESSION['location'];
					if($redirect == "")
					{
						if ( $config[regredirect] == 1)
						{header("Location:$config[baseurl]/index.php".$addlang);exit;}
						else
						{header("Location:$config[baseurl]/settings".$addlang);exit;}
					}
					else
					{
						header("Location:".$config[baseurl].$redirect);exit;
					}
					$_SESSION['location'] = "";
		
				}
			}
			else
			{
				$encryptedpassword = md5($password);
				$query="SELECT status,USERID,email,username,verified,filter,mylang from members WHERE email='".mysql_real_escape_string($username)."' and password='".mysql_real_escape_string($encryptedpassword)."'";
				$result=$conn->execute($query);
				
				if($result->recordcount()<1)
				{
					$error=$lang['37'];
				}
				elseif($result->fields['status']=="0")
				{
					$error = $lang['30'];
				}
		
				if($error=="")
				{
					$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE username='".mysql_real_escape_string($username)."'";
					$conn->execute($query);
					$_SESSION['USERID']=$result->fields['USERID'];
					$_SESSION['EMAIL']=$result->fields['email'];
					$_SESSION['USERNAME']=$result->fields['username'];
					$_SESSION['VERIFIED']=$result->fields['verified'];
					$_SESSION['FILTER']=$result->fields['filter'];
					$setlang = $result->fields['mylang'];
					if($setlang != "")
					{
						$addlang = "?language=".$setlang;	
					}
					if($_REQUEST["rememberme"])
					{
						create_slrememberme();
					}
					
					$redirect = $_SESSION['location'];
					if($redirect == "")
					{
						if ( $config[regredirect] == 1)
						{header("Location:$config[baseurl]/index.php".$addlang);exit;}
						else
						{header("Location:$config[baseurl]/settings".$addlang);exit;}
					}
					else
					{
						header("Location:".$config[baseurl].$redirect);exit;
					}
					$_SESSION['location'] = "";
		
				}
			}
		}
	}
	else
	{
		$query="SELECT USERID,username,pwd FROM members WHERE email='".mysql_real_escape_string($user_email)."'";
		$result=$conn->execute($query);
		$UID = intval($result->fields['USERID']);
		$pwd = $result->fields['pwd'];
		$un = $result->fields['username'];
		
		if($UID > 0)
		{
			// Send E-Mail Begin
			$sendto = $user_email;
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = $lang['33'];
			$sendmailbody = stripslashes($un).",<br><br>";
			$sendmailbody .= $lang['34']."<br>";
			$sendmailbody .= $lang['35']." $pwd <br><br>";
			$sendmailbody .= $lang['32'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
			// Send E-Mail End
			$error .= $lang['31']; 	
		}
	}
}

$pagetitle = $lang['11'];
STemplate::assign('pagetitle',$pagetitle);
STemplate::assign('error',$error);

//TEMPLATES BEGIN
STemplate::display('login.tpl');
//TEMPLATES END
?>
<script src="/shoutcloud/ShoutCloud.js"></script> 