<?php

include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);
$mobile_per_page = $config[mobile_per_page];
$config['items_per_page'] = "5";
$page = intval($_REQUEST['page']);
$type = intval($_REQUEST['type']);
STemplate::assign('type',$type);
$order = intval($_REQUEST['order']);
STemplate::assign('order',$order);

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
	if ($type == 1) 
	{
		$stermstr2 = $stermstr."AND A.pic!='' ";
	}
	elseif ($type == 2)
	{
	$stermstr2 = $stermstr."AND A.pic='' AND A.txt='' ";
	}
	elseif ($type == 3)
	{
	$stermstr2 = $stermstr."AND A.txt!='' ";
	}
	else
	{
	$stermstr2 = $stermstr;
	}
	if ($order == 1) 
	{
		$stermstr2 = $stermstr2."order by A.PID desc ";
	}
	elseif ($order == 2)
	{
	$stermstr2 = $stermstr2."order by A.PID ASC ";
	}
	elseif ($order == 3)
	{
	$stermstr2 = $stermstr2."order by A.favclicks desc ";
	}
	else
	{
	$stermstr2 = $stermstr2."order by A.PID desc ";
	}
	$stermstr .= " ";
	$stermstr2 .= " ";
}

$query1 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.USERID=B.USERID $stermstr order by A.favclicks desc limit $config[maximum_results]";
$query2 = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID $stermstr2 limit $pagingstart, $config[items_per_page]";
$query3 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.txt!='' AND A.USERID=B.USERID $stermstr order by A.favclicks desc limit $config[maximum_results]";
$query4 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.txt='' AND A.pic='' AND A.USERID=B.USERID $stermstr order by A.favclicks desc limit $config[maximum_results]";
$query5 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.pic!='' AND A.USERID=B.USERID $stermstr order by A.favclicks desc limit $config[maximum_results]";

$executequery3 = $conn->Execute($query3);
$btotal = $executequery3->fields['total'];
$executequery4 = $conn->Execute($query4);
$vtotal = $executequery4->fields['total'];
$executequery5 = $conn->Execute($query5);
$ptotal = $executequery5->fields['total'];

STemplate::assign('btotal',$btotal);
STemplate::assign('vtotal',$vtotal);
STemplate::assign('ptotal',$ptotal);


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

$SID = $_SESSION['USERID'];
$pcount = count($posts);
for ($i = 0; $i < $pcount ; $i++)
{
$querypid = $posts[$i]['PID'];
$querya = "SELECT count(*) as favorited FROM posts_favorited WHERE USERID=$SID AND PID=$querypid";
$executequerya = $conn->Execute($querya);
$queryb = "SELECT count(*) as unfavorited FROM posts_unfavorited WHERE USERID=$SID AND PID=$querypid";
$executequeryb = $conn->Execute($queryb);
$posts[$i]['favorited'] = $executequerya->fields['favorited'];
$posts[$i]['unfavorited'] = $executequeryb->fields['unfavorited'];
$my_str = $posts[$i]['tags'];
	$tags_arr = explode(',', $my_str);
	$new_arr = array();
		foreach ($tags_arr as  $tag)
		{
			$clean_tag = trim($tag);
			$new_arr[$i] .= ' <a href="'.$mobileurl.'/search?query='.$clean_tag.'">'.$clean_tag.'</a> ';
		}
	$posts[$i]['tags'] = $new_arr[$i];
}

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
//TEMPLATES BEGIN
STemplate::setTplDir($config['mobiledir']."/themes");
STemplate::assign('query',$q);
STemplate::assign('total',$total);
STemplate::assign('posts',$posts);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>