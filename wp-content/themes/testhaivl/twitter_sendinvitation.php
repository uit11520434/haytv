<?php

require_once('twitteroauth/twitteroauth.php');
include("include/config.php");
include("include/functions/import.php");

$csrf = htmlentities(strip_tags($_REQUEST['csrf']), ENT_COMPAT, "UTF-8");
$email = htmlentities(strip_tags($_REQUEST['email']), ENT_COMPAT, "UTF-8");
$username = $_SESSION['USERNAME'];
		$pwd = generateCode(5).time();
			$pwd2 = md5($pwd);
			$query = "INSERT INTO members SET username='".$username."', email='".mysql_real_escape_string($email)."', password='".mysql_real_escape_string($pwd2)."', pwd='".mysql_real_escape_string($pwd)."', addtime='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."'";
			$result=$conn->execute($query);
			$query1 = "SELECT * FROM members WHERE username ='".$username."'";  
			$result1 = $conn->execute($query1);
			$_SESSION['USERID']=$result1->fields['USERID'];
			$_SESSION['EMAIL']=$result1->fields['email'];
			$_SESSION['USERNAME']=$result1->fields['username'];
			$_SESSION['VERIFIED']=$result1->fields['verified'];
			$_SESSION['FILTER']=$result1->fields['filter'];
			$setlang = $result1->fields['mylang'];
			$UID = $result1->fields['USERID'];
				// Send E-Mail Begin
				$sendto = $email;
				$sendername = $config['site_name'];
				$from = $config['site_email'];
				$subject = $lang['38'];
				$sendmailbody = $lang['39'].",<br><br>";
				$sendmailbody .= $lang['40']." $pwd <br><br>";
				$sendmailbody .= stripslashes($lang['41']).stripslashes($lang['42'])."<a href='".$config['baseurl']."/login'>".stripslashes($lang['43'])."</a><br><br>";
				$sendmailbody .= $lang['32'].",<br>".stripslashes($sendername);
				mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
				// Send E-Mail End

?>