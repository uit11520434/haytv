<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

function insert_get_all_users()
{
    global $config,$conn;
	$query = "select USERID,username from members order by username asc"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

$PID = intval($_REQUEST['PID']);

if($_POST['submitform'] == "1")
{
	if($PID > 0)
	{
		$arr = array("USERID", "story", "tags", "source", "CID", "nsfw", "phase", "favclicks", "postviewed", "unfavclicks", "active");
		foreach ($arr as $value)
		{
			$sql = "update posts set $value='".mysql_real_escape_string($_POST[$value])."' where PID='".mysql_real_escape_string($PID)."'";
			$conn->execute($sql);
		}
		$message = "Gag Successfully Edited.";
		Stemplate::assign('message',$message);
	}
}

if($PID > 0)
{
	$queryc = "SELECT * FROM channels";
	$executequeryc = $conn->execute($queryc);
	$c =  $executequeryc->getarray();
	STemplate::assign('c',$c);
	
	$query = $conn->execute("select * from posts where PID='".mysql_real_escape_string($PID)."' limit 1");
	$story = $query->getrows();
	Stemplate::assign('story', $story[0]);
	if (strpos($story[0]['date_added'], '2013') !== false) {
			$purl1 = $config['baseurl'].'/pdata';
							
		} else {
			$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/','/^\s*{(\w+)}\s*=/');
			$replace = array ('\1\2/\3/\4', '$\1 =');
			$date1 = preg_replace($patterns, $replace, $story[0]['date_added']);
			$purl1 = $config['baseurl'].'/pdata'.'/'.$date1;
		}
		STemplate::assign('purl', $purl1);
}

$mainmenu = "4";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/stories_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>