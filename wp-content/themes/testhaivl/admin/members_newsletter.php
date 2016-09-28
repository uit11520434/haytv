<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();
$page = $_REQUEST['pagenumber'];
$adminurl = $config['adminurl'];

if($_POST['submitform1'] == "1")
{
$query = "SELECT username, email from members order by USERID desc";

$members = mysql_query($query) or die(mysql_error());  

while ($member = mysql_fetch_array($members)){  
				// Send E-Mail Begin
				$sendto = $member['email'];
				$sendername = $config['site_name'];
				$from = $config['site_email'];
				$subject = $_POST['title'];
				$sendmailbody = $_POST['value'] ;
				mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
				// Send E-Mail End

}

$message = "News letter has been sent successfully.";
Stemplate::assign('message',$message);

}


$mainmenu = "7";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/members_newsletter.tpl");
STemplate::display("administrator/global_footer.tpl");
?>