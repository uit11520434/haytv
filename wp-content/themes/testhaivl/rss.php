<?php
/**************************************************************************************************
RSS by Hero
|**************************************************************************************************/


$head ='<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel><title><![CDATA[ Ồ Vui - Vui hết cỡ]]></title><link><![CDATA[ http://www.myfancy.org/ ]]></link><description><![CDATA[ rss - http://www.myfancy.org ]]></description><ttl>10</ttl><copyright> - Vui cùng my fancy -</copyright><generator>- vui cùng my fancy -</generator><docs>http://www.myfancy.org</docs><image><title>cùng my fancy - Vui hết cỡ - Chia sẻ hình ảnh, video vui và còn nhiều nữa</title><url>http://myfancy.org/images/images.png</url><link>http://myfancy.org</link><width>86</width><height>33</height></image>';
echo trim($head);

include("include/config.php");
include("include/functions/utils.php");

$type = $_REQUEST['t'];
if ($type=="vote"){
        $sql="SELECT * FROM posts A WHERE   A.active='1' AND A.phase = '0' ORDER BY A.time_added desc limit 40";
}else if ($type=="new"){
        $sql="SELECT * FROM posts A WHERE   A.active='1' AND A.phase = '1' ORDER BY A.ttime desc limit 40";
}else if ($type=="hot"){
     $sql="SELECT * FROM posts A WHERE   A.active='1' AND A.phase = '2' ORDER BY A.htime desc limit 40";
}else if ($type=="tag"){
        $sql="SELECT * FROM posts A WHERE   A.active='1' AND A.phase = '1' ORDER BY A.ttime desc limit 40";
}else{
        $sql="SELECT * FROM posts A WHERE   A.active='1' ORDER BY A.time_added desc limit 40";
}

//$sql="SELECT * from posts A, members B where A.active='1' AND A.USERID=B.USERID AND A.phase='0' order by A.PID desc limit $config[maximum_results]";
$executequery = $conn->CacheExecute(20,$sql);
$r = $executequery->getrows();

for ($i = 0; $i < $config['items_per_page']; $i++) {
	$item='<item><title><![CDATA['.htmlspecialchars($r[$i]['story']).']]></title><link><![CDATA['.$config['baseurl'].'/'.vnseo($r[$i]['story'],true).'/'.$r[$i]['PID'].'.html'.']]></link>';
	if ($r[$i]['youtube_key'] != ""){
		$item.= '<description><![CDATA[<img src="http://img.youtube.com/vi/'.$r[$i]['youtube_key'].'/0.jpg"/><br>'.$r[$i]['story'].' Lượt xem:'.$r[$i]['postviewed'].' Điểm:'.$r[$i]['favclicks'].']]></description>';;
	}else{
		$item.= '<description><![CDATA[<img src="'.$config['purl'].'/t/'.$r[$i]['folder'].$r[$i]['pic'].'"/><br>'.$r[$i]['story'].' Lượt xem:'.$r[$i]['postviewed'].' Điểm:'.$r[$i]['favclicks'].']]></description>';;
	}
	$item.= '<pubDate>'.date("Y-m-d H:i:s",$r[$i]['time_added']).'</pubDate></item>';
    echo trim($item);
}

$footer ='</channel></rss>';
echo trim($footer);
?>