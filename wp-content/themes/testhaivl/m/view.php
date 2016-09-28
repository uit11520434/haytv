<?php

include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);
$postfolder = $config['postfolder'];
$SID = $_SESSION['USERID'];
$pid = intval(cleanit($_REQUEST['pid']));
if($pid > 0)
{
	$query = "SELECT * FROM posts WHERE active='1' AND PID='".mysql_real_escape_string($pid)."' limit 1";
	$executequery = $conn->execute($query);
	$parray = $executequery->getarray();
	$querypid = $pid;

$querya = "SELECT count(*) as favorited FROM posts_favorited WHERE USERID=$SID AND PID=$querypid";
$executequerya = $conn->Execute($querya);
$queryb = "SELECT count(*) as unfavorited FROM posts_unfavorited WHERE USERID=$SID AND PID=$querypid";
$executequeryb = $conn->Execute($queryb);
$parray[0]['favorited'] = $executequerya->fields['favorited'];
$parray[0]['unfavorited'] = $executequeryb->fields['unfavorited'];
	
	$eurl = base64_encode($postfolder.$pid);
	STemplate::assign('eurl',$eurl);
	STemplate::assign('p',$parray[0]);
	if (strpos($parray[0]['date_added'], '2013') !== false) {
			$purl1 = $config['baseurl'].'/pdata';
							
		} else {
			$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/','/^\s*{(\w+)}\s*=/');
			$replace = array ('\1\2/\3/\4', '$\1 =');
			$date1 = preg_replace($patterns, $replace, $parray[0]['date_added']);
			$purl1 = $config['baseurl'].'/pdata'.'/'.$date1;
		}
		STemplate::assign('purl', $purl1);	
	$templateselect = "view.tpl";
	$pagetitle = stripslashes($parray[0]['story']);
	STemplate::assign('pagetitle',$pagetitle);
}
//TEMPLATES BEGIN
STemplate::setTplDir($config['mobiledir']."/themes");
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>