<?php

include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);


$pid = intval(cleanit($_REQUEST['PID']));
$action = cleanit($_REQUEST['action']);
$section = cleanit($_REQUEST['section']);
$page = cleanit($_REQUEST['page']);
$SID = intval($_SESSION['USERID']);

$querya = "SELECT count(*) as favorited FROM posts_favorited WHERE USERID=$SID AND PID=$pid";
$executequerya = $conn->Execute($querya);
$queryb = "SELECT count(*) as unfavorited FROM posts_unfavorited WHERE USERID=$SID AND PID=$pid";
$executequeryb = $conn->Execute($queryb);
$favorited = $executequerya->fields['favorited'];
$unfavorited = $executequeryb->fields['unfavorited'];

if(($SID > 0) && ($pid > 0))
{
	$query="SELECT favclicks FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
    $executequery=$conn->execute($query);
    $favclicks = $executequery->fields['favclicks'];
	
	if($action == "L" && $favorited != 1)
	{
		if( $unfavorited == 1)
		{
		$favclicks = $favclicks + 2;
		}
		else
		{
		$favclicks = $favclicks + 1;
		}
		$query="INSERT INTO posts_favorited SET PID='".mysql_real_escape_string($pid)."', USERID='".mysql_real_escape_string($SID)."'";
		$result=$conn->execute($query);
		if( $unfavorited == 1)
		{
		$query="DELETE FROM posts_unfavorited WHERE PID='".mysql_real_escape_string($pid)."' AND USERID='".mysql_real_escape_string($SID)."'";
		$result=$conn->execute($query);
		}
		$query="UPDATE posts SET favclicks=".$favclicks." WHERE PID='".mysql_real_escape_string($pid)."'";
		$result=$conn->execute($query);
	}
	elseif($action == "UL" && $favorited == 1)
	{
		
		$favclicks = $favclicks - 1;
		$query="DELETE FROM posts_favorited WHERE PID='".mysql_real_escape_string($pid)."' AND USERID='".mysql_real_escape_string($SID)."'";
		$result=$conn->execute($query);
		$query="UPDATE posts SET favclicks=".$favclicks." WHERE PID='".mysql_real_escape_string($pid)."'";
		$result=$conn->execute($query);
	}
	elseif($action == "H" && $unfavorited != 1)
	{
		if( $favorited == 1)
		{
		$favclicks = $favclicks - 2;
		}
		else
		{
		$favclicks = $favclicks - 1;
		}
		$query="INSERT INTO posts_unfavorited SET PID='".mysql_real_escape_string($pid)."', USERID='".mysql_real_escape_string($SID)."'";
		$result=$conn->execute($query);
		if( $favorited == 1)
		{
		$query="DELETE FROM posts_favorited WHERE PID='".mysql_real_escape_string($pid)."' AND USERID='".mysql_real_escape_string($SID)."'";
		$result=$conn->execute($query);
		}
		$query="UPDATE posts SET favclicks=".$favclicks." WHERE PID='".mysql_real_escape_string($pid)."'";
		$result=$conn->execute($query);
	}
	elseif($action == "UH" && $unfavorited == 1)
	{
		
		$favclicks = $favclicks + 1;
		$query="DELETE FROM posts_unfavorited WHERE PID='".mysql_real_escape_string($pid)."' AND USERID='".mysql_real_escape_string($SID)."'";
		$result=$conn->execute($query);
		$query="UPDATE posts SET favclicks=".$favclicks." WHERE PID='".mysql_real_escape_string($pid)."'";
		$result=$conn->execute($query);
	}
	$mtrend = $config['mtrend'];
	$mno = $config['mno'];
	$myes = $config['myes'];
	if($favclicks < $mtrend)
	{
		$query="UPDATE posts SET phase='1' WHERE PID='".mysql_real_escape_string($pid)."' AND phase='2'";
		$result=$conn->execute($query);
	}
	
	if($favclicks < $myes)
	{
		$query="UPDATE posts SET phase='0' WHERE PID='".mysql_real_escape_string($pid)."' AND phase='1'";
		$result=$conn->execute($query);
	}
	if($favclicks >= $mtrend)
	{
		$query="UPDATE posts SET phase='2' WHERE PID='".mysql_real_escape_string($pid)."' AND phase='1'";
		$result=$conn->execute($query);
	}
	if($favclicks >= $myes)
	{
		$query="UPDATE posts SET phase='1' WHERE PID='".mysql_real_escape_string($pid)."' AND phase='0'";
		$result=$conn->execute($query);
	}
	elseif($unfavclicks >= $mno)
	{
		delete_post($pid);
	}
if ($section = "view"){
	header("Location:".$mobileurl.$config[postfolder].$pid);exit;
}
else{
	header("Location:".$mobileurl."/".$section."?page=".$page);exit;
}
	
}
?>