<?php

include("include/configcm.php");
include("include/function/import.php");

$uid = intval(cleanit($_REQUEST['uid']));
$art = cleanit($_REQUEST['art']);
$SID = intval($_SESSION['USERID']);
$SFULLNAME = $_SESSION['FULLNAME'];
$SUSERNAME = $_SESSION['USERNAME'];

if(($SID > 0) && ($uid > 0))
{
	if($art == "1")
	{
		$query="INSERT INTO follows SET USERID='".addslashes($uid)."', USERFL='".addslashes($SID)."'";
		$result=$conn->CacheExecute(20,$query);
		
		$query="DELETE FROM notifications WHERE USERID = '".addslashes($uid)."' AND USERFL='".addslashes($SID)."' AND ntype = 'follow'";
		$result=$conn->CacheExecute(20,$query);
		
		$notification =  "<a target=\"_blank\" href=\"".$config['baseurl']."/user/".$SUSERNAME."\">".$SFULLNAME." (".$SUSERNAME.")</a> đã đăng ký theo dõi bạn.";
		$query="INSERT notifications SET USERID = '".addslashes($uid)."',USERFL = '".addslashes($SID)."',notification = '".addslashes($notification)."', ntype = 'follow', ntime = ".time()."";
		$result=$conn->CacheExecute(20,$query);
		
	}
	elseif($art == "-1")
	{
		$query="DELETE FROM follows WHERE USERID='".addslashes($uid)."' AND USERFL='".addslashes($SID)."'";
		$result=$conn->CacheExecute(20,$query);
		
		$query="DELETE FROM notifications WHERE USERID = '".addslashes($uid)."' AND USERFL='".addslashes($SID)."' AND ntype = 'follow'";
		$result=$conn->CacheExecute(20,$query);
	}
	
		
	$query="SELECT count(*) as total FROM follows WHERE USERID='".addslashes($pid)."'";
	$executequery=$conn->CacheExecute(20,$query);
	$total = $executequery->fields[total];
	echo intval($total);
}
?>