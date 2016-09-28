<?php
/**************************************************************************************************
| 9Gag Clone Script
| http://www.9gagclonescript.com
| webmaster@9gagclonescript.com
|
|**************************************************************************************************
|
| By using this software you agree that you have read and acknowledged our End-User License 
| Agreement available at http://www.9gagclonescript.com/eula.html and to be bound by it.
|
| Copyright (c) 9GagCloneScript.com. All rights reserved.
|**************************************************************************************************/

include("include/config.php");
include("include/functions/import.php");

$SID = $_SESSION['USERID'];
if ($SID != "" && $SID >= 0 && is_numeric($SID))
{	
	$SID = intval($_SESSION['USERID']);
	if($_POST['subform'] == "1")
	{
		$fname = cleanit($_REQUEST['fname']);	
		$birthday = cleanit($_REQUEST['birthday']);	
		$gender = cleanit($_REQUEST['gender']);	
		$relationship = cleanit($_REQUEST['relationship']);	
		$user_email = cleanit($_REQUEST['email']);	
		$country = cleanit($_REQUEST['country']);	
		$details = cleanit($_REQUEST['details']);
		$website = cleanit($_REQUEST['website']);
		$pass = cleanit($_REQUEST['new_password']);
		$pass2 = cleanit($_REQUEST['new_password_repeat']);
		$news = intval(cleanit($_REQUEST['news']));
		$showfb = intval(cleanit($_REQUEST['showfb']));
		$color1 = cleanit($_REQUEST['profile_color']);
		$color2 = cleanit($_REQUEST['link_color']);
		$remove_avatar = intval(cleanit($_REQUEST['remove_avatar']));
				
		if($user_email == "")
		{
			$error = $lang['46'];
		}
		elseif(!verify_valid_email($user_email))
		{
			$error = $lang['47'];
		}
		else
		{
			$query = "select count(*) as total from members where email='".mysql_real_escape_string($user_email)."' AND USERID!='".mysql_real_escape_string($SID)."' limit 1"; 
			$executequery = $conn->execute($query);
			$te = $executequery->fields[total]+0;
			if($te > 0)
			{
				$error = $lang['48'];
			}
		}		
		
		if($pass != "" || $pass2 != "")
		{
			if($pass == "")
			{
				$error = $lang['49'];
			}
			elseif($pass2 == "")
			{
				$error = $lang['50'];
			}
			else
			{
				if($pass == $pass2)
				{
					$mp = md5($pass);
					$query = "UPDATE members SET password='".mysql_real_escape_string($mp)."', pwd='".mysql_real_escape_string($pass)."' WHERE USERID='".mysql_real_escape_string($SID)."' AND status='1'";
					$conn->execute($query);
				}
				else
				{
					$error = $lang['51'];
				}
			}
		}
		if($remove_avatar == "1")
		{
			$query = "select profilepicture from members where USERID='".mysql_real_escape_string($SID)."' limit 1"; 
			$executequery = $conn->execute($query);
			$delpp = $executequery->fields['profilepicture'];
			if($delpp != "")
			{
				$del1=$config['membersprofilepicdir']."/".$delpp;
				if(file_exists($del1))
				{
					unlink($del1);
				}
				$query = "UPDATE members SET profilepicture='' WHERE USERID='".mysql_real_escape_string($SID)."' limit 1";
				$conn->execute($query);
			}
		}
		
		if($error == "")
		{			
			$query="UPDATE members SET fullname='".mysql_real_escape_string($fname)."', email='".mysql_real_escape_string($user_email)."', description='".mysql_real_escape_string($details)."', website='".mysql_real_escape_string($website)."', birthday='".mysql_real_escape_string($birthday)."', gender='".mysql_real_escape_string($gender)."', news='".mysql_real_escape_string($news)."', relationship='".mysql_real_escape_string($relationship)."', showfb='".mysql_real_escape_string($showfb)."' WHERE USERID='".mysql_real_escape_string($SID)."' AND status='1'";
			$result=$conn->execute($query);
			$pid = $SID;
			$gstop = "1";
			$gphoto = $_FILES['gphoto']['tmp_name'];
			if($gphoto != "")
			{
				$ext = substr(strrchr($_FILES['gphoto']['name'], '.'), 1);
				$ext2 = strtolower($ext);
				if($ext2 == "jpeg" || $ext2 == "jpg" || $ext2 == "gif" || $ext2 == "png")
				{
					$theimageinfo = getimagesize($gphoto);
					if($theimageinfo[2] != 1 && $theimageinfo[2] != 2 && $theimageinfo[2] != 3)
					{
						$gstop = "1";
					}
					else
					{
						$gstop = "0";	
					}
				}
			}
			if($gstop == "0")
			{
				$thepp = $pid;
				if($theimageinfo[2] == 1)
				{
					$thepp .= ".gif";
				}
				elseif($theimageinfo[2] == 2)
				{
					$thepp .= ".jpg";
				}
				elseif($theimageinfo[2] == 3)
				{
					$thepp .= ".png";
				}
				if($error == "")
				{
					$myvideoimgnew=$config['membersprofilepicdir']."/".$thepp;
					if(file_exists($myvideoimgnew))
					{
						unlink($myvideoimgnew);
					}
					move_uploaded_file($gphoto, $myvideoimgnew);
					$myvideoimgnew2=$config['membersprofilepicdir']."/".$thepp;
					do_resize_image($myvideoimgnew, "160", "160", false, $myvideoimgnew2);
					if(file_exists($config['membersprofilepicdir']."/".$thepp))
					{
						$query = "UPDATE members SET profilepicture='$thepp' WHERE USERID='".mysql_real_escape_string($SID)."'";
						$conn->execute($query);
   
                                              }
		unlink($myvideoimgnew);
				}
			}
			$cstop = "1";
			$coverphoto = $_FILES['coverphoto']['tmp_name'];
			if($coverphoto != "")
			{
				$ext = substr(strrchr($_FILES['coverphoto']['name'], '.'), 1);
				$ext2 = strtolower($ext);
				if($ext2 == "jpeg" || $ext2 == "jpg" || $ext2 == "gif" || $ext2 == "png")
				{
					$theimageinfo = getimagesize($coverphoto);
					if($theimageinfo[2] != 1 && $theimageinfo[2] != 2 && $theimageinfo[2] != 3)
					{
						$cstop = "1";
					}
					else
					{
						$cstop = "0";	
					}
				}
			}
			
			if($cstop == "0")
			{
				$thepp = $pid;
				if($theimageinfo[2] == 1)
				{
					$thepp .= ".gif";
				}
				elseif($theimageinfo[2] == 2)
				{
					$thepp .= ".jpg";
				}
				elseif($theimageinfo[2] == 3)
				{
					$thepp .= ".png";
				}
				if($error == "")
				{
					$myvideoimgnew=$config['membersprofilepicdir']."/cover/".$thepp;
					if(file_exists($myvideoimgnew))
					{
						unlink($myvideoimgnew);
					}
					move_uploaded_file($coverphoto, $myvideoimgnew);
					//$myvideoimgnew2=$config['membersprofilepicdir']."/cover/".$thepp;
					//do_resize_image($myvideoimgnew, "995", "995", false, $myvideoimgnew2);
					//$myvideoimgnew3=$config['membersprofilepicdir']."/thumbs/".$thepp;
					//do_resize_image($myvideoimgnew, "125", "125", false, $myvideoimgnew3);
					if(file_exists($config['membersprofilepicdir']."/cover/".$thepp))
					{
						$query = "UPDATE members SET coverpicture='$thepp' WHERE USERID='".addslashes($SID)."'";
						$conn->Execute($query);
					}
					//unlink($myvideoimgnew);
				}
			}

			if($user_email != $_SESSION['EMAIL'])
			{
				$query = "UPDATE members SET verified='0' WHERE USERID='".mysql_real_escape_string($SID)."' limit 1";
				$conn->execute($query);
				$_SESSION['EMAIL'] = $user_email;
				$_SESSION['VERIFIED'] = 0;
				// Generate Verify Code Begin
				$verifycode = generateCode(5).time();
				$query = "INSERT INTO members_verifycode SET USERID='".mysql_real_escape_string($SUSERID)."', code='$verifycode'";
				$conn->execute($query);
				if(mysql_affected_rows()>=1)
				{
					$proceedtoemail = true;
				}
				else
				{
					$proceedtoemail = false;
				}
				// Generate Verify Code End
				
				// Send E-Mail Begin
				if ($proceedtoemail)
				{
					$sendto = $user_email;
					$sendername = $config['site_name'];
					$from = $config['site_email'];
					$subject = $lang['85'];
					$sendmailbody = stripslashes($_SESSION['USERNAME']).",<br><br>";
					$sendmailbody .= $lang['86'].":<br>";
					$sendmailbody .= "<a href=".$config['baseurl']."/confirmemail?c=$verifycode>".$config['baseurl']."/confirmemail?c=$verifycode</a><br><br>";
					$sendmailbody .= $lang['87'].",<br>".stripslashes($sendername);
					mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
				}
				// Send E-Mail End
			}
			$message = $lang['52'];
		}
	}
	STemplate::assign('pagetitle',$lang['45']);
	$query="SELECT * FROM members WHERE USERID='".mysql_real_escape_string($SID)."' AND status='1'";
	$results=$conn->execute($query);
	$p = $results->getrows();
	STemplate::assign('p',$p[0]);
	
	if ($config['channels'] == 1)
	{
	$cats = loadallchannels();
	STemplate::assign('allchannels',$cats);

	}
}
else
{
	header("Location:$config[baseurl]/login");exit;
}

//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display('settings.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>
<script src="/shoutcloud/ShoutCloud.js"></script> 