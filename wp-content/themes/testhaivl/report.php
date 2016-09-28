<?php

include("include/config.php");
include("include/functions/import.php");

$pid = intval(cleanit($_REQUEST['pid']));
$reason = intval(cleanit($_REQUEST['number']));
$repost_link = cleanit($_REQUEST['repost_link']);

if($pid > 0 && $reason > 0)
{
	$query="INSERT INTO posts_reports SET PID='".mysql_real_escape_string($pid)."', reason='".mysql_real_escape_string($reason)."', time='".time()."', ip='".$_SERVER['REMOTE_ADDR']."'";
	$result=$conn->execute($query);
}
?>