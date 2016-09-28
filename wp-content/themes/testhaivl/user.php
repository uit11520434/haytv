<?php



include("include/config.php");

include("include/functions/import.php");

$thebaseurl = $config['baseurl'];



$uid = cleanit($_REQUEST['uid']);



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



if($uid != "")

{

	STemplate::assign('uid',$uid);

	$queryp = "select * from members where username='".mysql_real_escape_string($uid)."' AND status='1'"; 

	$resultsp=$conn->CacheExecute(20,$queryp);

	$p = $resultsp->getrows();

	



	

	STemplate::assign('p',$p[0]);

	$USERID = intval($p[0]['USERID']);

	



	if($USERID > 0)

	{

	

		$query1 = "SELECT count(*) as total from posts A where A.active='1' AND A.USERID='".mysql_real_escape_string($USERID)."' limit $config[maximum_results]";

		$executequery1 = $conn->CacheExecute(20,$query1);

		$totalvideos = $executequery1->fields['total'];

		STemplate::assign('ptotal',$totalvideos);

				

		$query1 = "SELECT count(*) as total from members A, follows B where A.USERID=B.USERFL AND B.USERID='".mysql_real_escape_string($USERID)."' limit $config[maximum_results]";

		$executequery1 = $conn->CacheExecute(20,$query1);

		$followers = $executequery1->fields['total'];

		STemplate::assign('followers',$followers);

		

		$query1 = "SELECT count(*) as total from members A, follows B where A.USERID=B.USERID AND B.USERFL='".mysql_real_escape_string($USERID)."' limit $config[maximum_results]";

		$executequery1 = $conn->CacheExecute(20,$query1);

		$following = $executequery1->fields['total'];

		STemplate::assign('following',$following);



		if ($_GET["t"]==followers) {

			$query = "SELECT A.* from members A, follows B where A.USERID=B.USERFL AND B.USERID='".mysql_real_escape_string($USERID)."' order by A.points desc limit $pagingstart, $config[items_per_page]";

			$totalitems = 	$followers;		

			$t = 'followers.tpl';

		}else if ($_GET["t"]==following) {

			$query = "SELECT A.* from members A, follows B where A.USERID=B.USERID AND B.USERFL='".mysql_real_escape_string($USERID)."' order by A.points desc limit $pagingstart, $config[items_per_page]";

			$totalitems = $following;	

			$t = 'following.tpl';

		

		}else{

			$query = "SELECT A.*, B.username from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.USERID='".mysql_real_escape_string($USERID)."' order by A.PID desc limit $pagingstart, $config[items_per_page]";

			$totalitems = 	$totalvideos;	

			$t = 'user.tpl';

		}

		

		

		$results=$conn->CacheExecute(20,$query);

		$posts = $results->getrows();

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

		STemplate::assign('pagetitle',"Trang cá nhân của ".fullname($uid)." - ".$uid);

		$eurl = base64_encode("/user/".$uid);

		STemplate::assign('eurl',$eurl);

		if ($totalitems > 0)

		{

			if($totalitems<=$config['maximum_results'])

			{

				$total = $totalitems;

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

			

			$beginning=$pagingstart+1;

			$ending=$pagingstart+$results->recordcount();

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

	else

	{

		$t = 'empty.tpl';

	}

}

else

{

	$t = 'empty.tpl';

}



//TEMPLATES BEGIN

STemplate::assign('message',$message);

STemplate::display('header.tpl');

STemplate::display($t);

STemplate::display('footer.tpl');

//TEMPLATES END

?>
<script src="/shoutcloud/ShoutCloud.js"></script> 