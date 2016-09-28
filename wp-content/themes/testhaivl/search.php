<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];
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

$q = cleanit($_REQUEST['query']);

if($q != "")
{
	$sterm[] = $q;
	$sterm[0] = str_replace("'", "''", $sterm[0]);
	$sterm[0] = str_replace("  ", "", $sterm[0]);
	$sterm[0] = str_replace("-", "", $sterm[0]);
	$stermsplit = explode(" ",$sterm[0]);
	$stripapos = str_replace("'", "''", $searchterm);
	$stermstr = "";
	if (count($stermsplit)>=1) 
	{
		for($i=0;$i<count($stermsplit);$i++)
		{
			if ($stermsplit[$i] != "" && $stermsplit[$i] != "-" && $stermsplit[$i] != " ")
			{
				$stermstr.="AND (A.story like '%$stermsplit[$i]%' or A.tags like '%$stermsplit[$i]%') ";
			}
		}
	}
	$stermstr .= " ";
}

$query1 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.USERID=B.USERID $stermstr order by A.favclicks desc limit $config[maximum_results]";
$query2 = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID $stermstr order by A.favclicks desc limit $pagingstart, $config[items_per_page]";

$executequery1 = $conn->Execute($query1);
$stotal = $executequery1->fields['total'];
if ($stotal > 0)
{
	if($executequery1->fields['total']<=$config['maximum_results'])
	{
		$total = $executequery1->fields['total'];
	}
	else
	{
		$total = $config['maximum_results'];
	}
	$toppage = ceil($total/$config['items_per_page']);
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
	$beginning=$pagingstart+1;
	$ending=$pagingstart+$executequery2->recordcount();
	$pagelinks="";
	$k=1;
	$theprevpage=$currentpage-1;
	$thenextpage=$currentpage+1;
	
	if ($currentpage > 0)
	{
		if($currentpage > 1) 
		{
			STemplate::assign('tpp',$theprevpage);
		}
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$lowercount++;
			$counter++;
		}		
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			STemplate::assign('tnp',$thenextpage);
		}
	}
}

$templateselect = "search.tpl";
$pagetitle = $q." ".$lang['189'];
STemplate::assign('pagetitle',$pagetitle);

if ($config['channels'] == 1)
{
$cats = loadallchannels();
STemplate::assign('allchannels',$cats);

$c = loadtopchannels($cats);
STemplate::assign('c',$c);
}

//TEMPLATES BEGIN
STemplate::assign('query',$q);
STemplate::assign('total',$total);
STemplate::assign('posts',$posts);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>
<script src="/shoutcloud/ShoutCloud.js"></script> 