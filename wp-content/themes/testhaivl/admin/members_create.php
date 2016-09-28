<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

if($_POST['submitform'] == "1")
{
	$username = $_POST[username];
	$password = $_POST[password];
	$email = $_POST[email];
	
	if($username == "")
	{
		$error = "Lỗi: Vui lòng điền tên đăng nhập.";
	}
	elseif($password == "")
	{
		$error = "Lỗi: Vui lòng nhập mật khẩu.";
	}
	elseif($email == "")
	{
		$error = "Lỗi: Vui lòng nhập một e-mail.";
	}
	else
	{
		$sql="select count(*) as total from members WHERE username='".mysql_real_escape_string($username)."'";
		$executequery = $conn->Execute($sql);
		$tmembers = $executequery->fields[total];
		
		if($tmembers == "0")
		{ 
			$sql="select count(*) as total from members WHERE email='".mysql_real_escape_string($email)."'";
			$executequery = $conn->Execute($sql);
			$tmembers = $executequery->fields[total];
			
			if($tmembers == "0")
			{
				$sql = "insert members set username='".mysql_real_escape_string($username)."', password='".md5($password)."', pwd='".mysql_real_escape_string($password)."', email='".mysql_real_escape_string($email)."', addtime='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."'";
				$conn->execute($sql);
				$message = "Tạo thành viên thành công.";
				Stemplate::assign('message',$message);
			}
			else
			{
				$error = "Lỗi: E-mail $email đã được sử dụng.";
			}
		}
		else
		{
			$error = "Lỗi: Tên đăng nhập $username đã được sử dụng.";
		}
	}
}

$mainmenu = "7";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/members_create.tpl");
STemplate::display("administrator/global_footer.tpl");
?>
