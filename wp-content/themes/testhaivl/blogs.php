<?php
/**************************************************************************************************
| 9Gag Clone Script
| http://www.9gagclonescript.com
| webmaster@9gagclonescript.com
|
|**************************************************************************************************
|
| By using this software you agree that you have read and acknowledged our End-User License 
| Agreement available at http://www.9gagclonescript.com/eula.html and to be bound by it.
|
| Copyright (c) 9GagCloneScript.com. All rights reserved.
|**************************************************************************************************/

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

$page = intval($_REQUEST['page']);
$items_per_page = 10;
if($page=="")
{
	$page = "1";
}
$currentpage = $page;

if ($page >=2)
{
	$pagingstart = ($page-1)*$items_per_page;
}
else
{
	$pagingstart = "0";
}

$show = cleanit($_REQUEST['show']);
 
$query1 = "SELECT count(*) as total from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.type='1' AND A.blogtype='0' order by A.time_added DESC limit $config[maximum_results]";
$query2 = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.type='1' AND A.blogtype='0'  order by A.time_added DESC limit $pagingstart, $items_per_page";
$executequery1 = $conn->CacheExecute(20,$query1);
$totalvideos = $executequery1->fields['total'];

$infinity_paging = 0;//$config['infinity_paging'];
if($show == "thumbs")
{
	$infinity_paging = "0";
	$grid = "1";
}
if($infinity_paging == "1")
{
	$templateselect = "trending.tpl";
	if ($totalvideos > 0)
	{
		if($executequery1->fields['total']<=$config['maximum_results'])
		{
			$total = $executequery1->fields['total'];
		}
		else
		{
			$total = $config['maximum_results'];
		}
		
		$toppage = ceil($total/$items_per_page);
		if($toppage==0)
		{
			$xpage=$toppage+1;
		}
		else
		{
			$xpage = $toppage;
		}
		
		$executequery2 = $conn->CacheExecute(20,$query2);
		$posts = $executequery2->getrows();
		
	}
}
else
{

	$templateselect = "blog_std.tpl";

	if ($totalvideos > 0)
	{
		if($executequery1->fields['total']<=$config['maximum_results'])
		{
			$total = $executequery1->fields['total'];
		}
		else
		{
			$total = $config['maximum_results'];
		}
		
		$toppage = ceil($total/$items_per_page);
		if($toppage==0)
		{
			$xpage=$toppage+1;
		}
		else
		{
			$xpage = $toppage;
		}
		
		$executequery2 = $conn->CacheExecute(20,$query2);
		$posts = $executequery2->getrows();
		$beginning=$pagingstart+1;
		$ending=$pagingstart+$executequery2->recordcount();
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
}



$eurl = base64_encode("/chemgio");
STemplate::assign('eurl',$eurl);
STemplate::assign('posts',$posts);

//TEMPLATES BEGIN
STemplate::assign('pagetitle',"Chia sẻ truyện cười, chém gió, status vui ^_^");
STemplate::assign('menu',2);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>