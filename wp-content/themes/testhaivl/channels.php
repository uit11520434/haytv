<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

if($_SESSION['viewtype'] == "" && $_REQUEST['view'] == "")
{
$_SESSION['viewtype'] = "list";
}
elseif($_SESSION['viewtype'] == "list" && $_REQUEST['view'] == "")
{
$_SESSION['viewtype'] = "list";
}
elseif($_SESSION['viewtype'] == "thumbs" && $_REQUEST['view'] == "")
{
$_SESSION['viewtype'] = "thumbs";
}
elseif( $_REQUEST['view'] != "")
{
$_SESSION['viewtype'] = $_REQUEST['view'];
}

$page = intval($_REQUEST['page']);

if($page=="")
{
	$page = "1";
}
$currentpage = $page;

if ($page >=2)
{
	$pagingstart = ($page-1)*$config['items_per_page'];
}
else
{
	$pagingstart = "0";
}

	$cname2 = cleanit($_REQUEST['cname']);
	STemplate::assign('cname2',$cname2);

	$query1 = "select * from channels"; 
	$results1=$conn->execute($query1);
	$cnames = $results1->getrows();
	$cnamescount = count($cnames);
	for ($i = 0; $i < $cnamescount; $i++) {
		if ( makeseo($cnames[$i]["cname"]) == $cname2)
		{$CID = $cnames[$i]["CID"];}
	}
	
	$queryc = "select CID, cname from channels where CID='".mysql_real_escape_string($CID)."'"; 
	$resultsc=$conn->execute($queryc);
	$c = $resultsc->getrows();
	STemplate::assign('c',$c[0]);
	$CID = intval($c[0]['CID']);
	$cname = $c[0]['cname'];
	STemplate::assign('CID',$CID);
	STemplate::assign('cname',$cname);

$query1 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.CID=$CID order by A.PID desc limit $config[maximum_results]";
$query2 = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.CID=$CID order by A.PID desc limit $pagingstart, $config[items_per_page]";
	
$executequery1 = $conn->Execute($query1);

$totalvideos = $executequery1->fields['total'];
if ($totalvideos > 0)
{
	if($executequery1->fields['total']<=$config[maximum_results])
	{
		$total = $executequery1->fields['total'];
	}
	else
	{
		$total = $config[maximum_results];
	}
	
	$toppage = ceil($total/$config[items_per_page]);
	if($toppage==0)
	{
		$xpage=$toppage+1;
	}
	else
	{
		$xpage = $toppage;
	}
	
	$executequery2 = $conn->Execute($query2);
	$posts = $executequery2->getrows();


if ($config['rhome'] == 1)
{
$queryr = "SELECT A.*, B.username FROM posts A, members B WHERE A.USERID=B.USERID AND A.PID!='".mysql_real_escape_string($pid)."' AND A.active='1' ORDER BY rand() desc limit 3";
$executequeryr = $conn->execute($queryr);
$r =  $executequeryr->getarray();
STemplate::assign('r',$r);
	$purlArray = array();
	foreach ($r as $value) {
	if (strpos($value['date_added'], '2013') !== false) {
		$purl1 = $config['baseurl'].'/pdata';
	} else {
		$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/','/^\s*{(\w+)}\s*=/');
		$replace = array ('\1\2/\3/\4', '$\1 =');
		$date1 = preg_replace($patterns, $replace, $value['date_added']);
		$purl1 = $config['baseurl'].'/pdata'.'/'.$date1;
	}
	array_push($purlArray, $purl1);
	STemplate::assign('purlR', $purlArray);	
	}
}


	$theprevpage=$currentpage-1;
	$thenextpage=$currentpage+1;
		
	if ($currentpage > 0)
	{
		if($currentpage > 1) 
		{
			STemplate::assign('tpp',$theprevpage);
		}
		$currentposts = $currentpage * $config['items_per_page'];
		
		if($totalvideos > $currentposts) 
		{
			STemplate::assign('tnp',$thenextpage);
		}
	}
}

$eurl = base64_encode("/channels/".$cname2."/?page=".$currentpage);
STemplate::assign('eurl',$eurl);

if ($_SESSION['viewtype'] == "list")
	{
	$templateselect = "channels.tpl";
	}
	else
	{
	$templateselect = "tchannels.tpl";
	}
	
if ($config['topgags'] > 0)
{
	$ctime = 24 * 60 * 60;
	if ($config['topgags'] == 2){$ctime = $ctime * 7;}
	if ($config['topgags'] == 3){$ctime = $ctime * 30;}
	$utime = time() - $ctime;
	$query3 = "SELECT * FROM posts WHERE time_added>='$utime' AND active='1' AND pic!='' AND nsfw='0' order by favclicks desc  limit 5";
	$executequery3 = $conn->execute($query3);
	$topgags = $executequery3->getrows();
}

if ($config['channels'] == 1)
{
$cats = loadallchannels();
STemplate::assign('allchannels',$cats);

$c = loadtopchannels($cats);
STemplate::assign('c',$c);
}

$_SESSION['location'] = "/channels/".$cname2."/?page=".$currentpage;

//TEMPLATES BEGIN
STemplate::assign('menu',5);
STemplate::assign('posts',$posts);
$purlArray = array();
	foreach ($posts as $value) {
	if (strpos($value['date_added'], '2013') !== false) {
		$purl1 = $config['baseurl'].'/pdata';
	} else {
		$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/','/^\s*{(\w+)}\s*=/');
		$replace = array ('\1\2/\3/\4', '$\1 =');
		$date1 = preg_replace($patterns, $replace, $value['date_added']);
		$purl1 = $config['baseurl'].'/pdata'.'/'.$date1;
	}
	array_push($purlArray, $purl1);
	STemplate::assign('purl', $purlArray);	
	}
STemplate::assign('topgags',$topgags);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>