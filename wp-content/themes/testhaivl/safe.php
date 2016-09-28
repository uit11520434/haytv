<?php

include("include/config.php");
include("include/functions/import.php");

$SID = $_SESSION['USERID'];
if ($SID != "" && $SID >= 0 && is_numeric($SID))
{	
	$SID = intval($_SESSION['USERID']);
	$m = cleanit($_REQUEST['m']);
	$o = intval(cleanit($_REQUEST['o']));

	if($o == "1")
	{
		if($SID > 0 && $m != "")
		{
			if($_SESSION['FILTER'] != "1")
			{
				$query = "UPDATE members SET filter='1' WHERE USERID='".mysql_real_escape_string($SID)."' limit 1"; 
				$executequery = $conn->execute($query);
				$_SESSION['FILTER'] = 1;
			}
		}
	}
	else
	{
		if($SID > 0 && $m != "")
		{
			if($_SESSION['FILTER'] != "0")
			{
				$query = "UPDATE members SET filter='0' WHERE USERID='".mysql_real_escape_string($SID)."' limit 1"; 
				$executequery = $conn->execute($query);
				$_SESSION['FILTER'] = 0;
			}
		}
	}	
	
	$goto = base64_decode($m);
	header("Location:$config[baseurl]".$goto);exit;
}
else
{
	header("Location:$config[baseurl]/login");exit;
}
?>