<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$uid = cleanit($_REQUEST['uid']);
if($uid != "")
{
	STemplate::assign('uid',$uid);
	$queryp = "select USERID, username, fullname, description, color1, website from members where userid='".mysql_real_escape_string($uid)."' AND status='1'"; 
	$resultsp=$conn->execute($queryp);
	$p = $resultsp->getrows();
	STemplate::assign('p',$p[0]);
	$USERID = intval($p[0]['USERID']);
	$uname = $p[0]['username'];

	if($USERID > 0)
	{
		STemplate::assign('pagetitle',$uname." - ".$lang['194']);
		
		$eurl = base64_encode("/user/".$uid."/messages");
		STemplate::assign('eurl',$eurl);
		
		$query = "select count(*) as total from posts where USERID='".mysql_real_escape_string($USERID)."' AND active='1' limit 1"; 
		$executequery = $conn->execute($query);
		$tl = $executequery->fields['total'];
		STemplate::assign('tl',$tl);
		
		$query = "select count(*) as total from posts_favorited where USERID='".mysql_real_escape_string($USERID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$tf = $executequery->fields['total'];
		STemplate::assign('tf',$tf);
	
		$t = 'messages.tpl';
	}
	else
	{
		$t = 'empty.tpl';
	}
}
else
{
	$t = 'empty.tpl';
}

if ($config['channels'] == 1)
{
$cats = loadallchannels();
STemplate::assign('allchannels',$cats);

$c = loadtopchannels($cats);
STemplate::assign('c',$c);
}

$_SESSION['location'] = "/user/".$uid."/messages?page=".$page;

//TEMPLATES BEGIN
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display($t);
STemplate::display('footer.tpl');
//TEMPLATES END
?>