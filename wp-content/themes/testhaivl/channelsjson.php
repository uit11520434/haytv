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
for ($i = 0; $i < $cnamescount-1; $i++) {
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

$eurl = base64_encode("/channels/".$cname2."/");
STemplate::assign('eurl',$eurl);

$templateselect = "channelsjson.tpl";

	


//TEMPLATES BEGIN
STemplate::assign('menu',1);
STemplate::assign('posts',$posts);
STemplate::display($templateselect);
//TEMPLATES END
?>