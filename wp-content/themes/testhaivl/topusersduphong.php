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
include("include/function/import.php");
$thebaseurl = $config['baseurl'];

$page = intval($_REQUEST['page']);

if($page=="0")
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


$query1 = "SELECT count(*) as total from posts A, members B where A.verified='1' AND A.username=B.USERID $addthis order by A.favclicks desc limit $pagingstart, $config[items_per_page]";
if ($_GET["t"]==thang) {
	$query2 = "	SELECT top.USERID, members.username
, members.fullname
					 , count(top.PID) AS TOTAL
					 , sum(top.total_count) AS LIKES
					 , sum(top.view) AS VIEWS
				FROM
				  top
				INNER JOIN members
				ON top.USERID = members.USERID
				WHERE
				posts.date_added >= '$date3' AND posts.date_added <= '$date4'
				GROUP BY
				  top.USERID, members.username
, members.fullname
				ORDER BY
				  LIKES DESC limit $pagingstart, $config[items_per_page]";
	
	$templateselect = "top-thang.tpl";
}
else if ($_GET["t"]==nam) {
	$query2 = "	SELECT top.USERID, members.username
, members.fullname
					 , count(top.PID) AS TOTAL
					 , sum(top.total_count) AS LIKES
					 , sum(top.view) AS VIEWS
				FROM
				  top
				INNER JOIN members
				ON top.USERID = members.USERID
				WHERE
				posts.date_added >= '2013-12-01'
				GROUP BY
				  top.USERID, members.username
, members.fullname
				ORDER BY
				  LIKES DESC limit $pagingstart, $config[items_per_page]";
	
	$templateselect = "top-nam.tpl";
}
else if ($_GET["t"]==all) {
	$query2 = "	SELECT top.USERID, members.username
, members.fullname
					 , count(top.PID) AS TOTAL
					 , sum(top.total_count) AS LIKES
					 , sum(top.view) AS VIEWS
				FROM
				  top
				INNER JOIN members
				ON top.USERID = members.USERID
				GROUP BY
				  top.USERID, members.username
, members.fullname
				ORDER BY
				  LIKES DESC limit $pagingstart, $config[items_per_page]";
	
	$templateselect = "topusers.tpl";
}
else if ($_GET["t"]==baihot) {
$query1 = "SELECT count(*) as total from top A, members B where A.active='1' AND A.USERID=B.USERID $addthis order by A.favclicks desc limit $config[maximum_results]";
	$query2 = "	SELECT top.*, members.username
, members.fullname
				FROM 
				  top
				INNER JOIN members
				ON top.USERID = members.USERID
				WHERE
				  posts.date_added >= '$date1'
				ORDER BY
				   top.total_count DESC
				 , top.view DESC limit $pagingstart, $config[items_per_page]";
	$templateselect = "top-baihot.tpl";
}
else {
	$query2 = "	SELECT top.USERID, members.username
, members.fullname
					 , count(top.PID) AS TOTAL
					 , sum(top.total_count) AS LIKES
					 , sum(top.view) AS VIEWS
				FROM
				  top
				INNER JOIN members
				ON top.USERID = members.USERID
				WHERE
				posts.date_added >= '$date1' AND posts.date_added <= '$date2'
				GROUP BY
				  top.USERID, members.username
, members.fullname
				ORDER BY
				  LIKES DESC limit $pagingstart, $config[items_per_page]";
	
	$templateselect = "top-tuan.tpl";
}
	
$executequery1 = $conn->CacheExecute(20,$query1);

$totalvideos = $executequery1->fields['total'];
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
	
	$toppage = ceil($total/$config['items_per_page']);
	if($toppage==0)
	{
		$xpage=$toppage+1;
	}
	else
	{
		$xpage = $toppage;
	}
	
	$executequery2 = $conn->CacheExecute(20,$query2);
	$top = $executequery2->getrows();
	
	if ($_REQUEST['ajax']==1){
		echo json_encode($top);
		exit;
	}	
	
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
STemplate::assign('page',$page);
STemplate::assign('top',$top);


//TEMPLATES BEGIN
STemplate::assign('pagetitle', $lang['260']);
STemplate::assign('menu',4);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>