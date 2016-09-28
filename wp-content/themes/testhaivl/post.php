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

$SID = $_SESSION['USERID'];
if ($SID != "" && $SID >= 0 && is_numeric($SID))
{	
	$query = "select points from members where USERID = $SID"; 
	$executequery = $conn->CacheExecute(20,$query);
	$points = $executequery->fields['points'];
	if($points < 200)
	{	
		$error = 'Bạn phải đạt đủ 200 điểm để sử dụng chức năng này ^_^ . số điểm hiện tại của bạn là: '.$points;
		$theme = "empty.tpl";
	}
	else
	{

		$post_type = cleanit($_REQUEST['post_type']);
		if($post_type == "Blog")
		{
			$nsfw = intval(cleanit($_REQUEST['nsfw']));
			$source = cleanit($_REQUEST['source']);
			$tags = cleanit($_REQUEST['tags']);
			$title = cleanit($_REQUEST['title']);
			$title2 = cleanit($_REQUEST['title2']);
			$node = cleanit($_REQUEST['node']);
			$blog_type = cleanit($_REQUEST['blog_type']);
			
			$slxh = slxh($tags,",");
				if($slxh > 2){
					$error = 'Bạn chỉ được sử dụng tối đa 3 thẻ (tag), Nên gắn thẻ đúng nội dung giúp việc phân loại bài chính sác hơn';
				}
			
			if($node == "")
			{
				$error = 'Chưa có nội dung';
			}

			if($error == "")
			{
				$approve_stories = $config['approve_stories'];
				if($approve_stories == "1")
				{
					$active = "0";
				}
				else
				{
					$active = "1";
				}
				
				
				$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', story='".mysql_real_escape_string($title)."',story2='".mysql_real_escape_string($title2)."',node='".mysql_real_escape_string($node)."', tags='".mysql_real_escape_string($tags)."', source='".mysql_real_escape_string($source)."', nsfw='".mysql_real_escape_string($nsfw)."', url='".mysql_real_escape_string($url)."', time_added='".time()."' ,folder='".$folder."', date_added='".date("Y-m-d")."' ,active='$active', type='1',blogtype='".mysql_real_escape_string($blog_type)."', pip='".$_SERVER['REMOTE_ADDR']."' $addme";
				$result=$conn->CacheExecute(20,$query);
				$pid = mysql_insert_id();
				$points_gag = $config['points_gag'];
				if($points_gag > 0)
				{
					$query = "UPDATE members SET points=points+$points_gag WHERE USERID='".mysql_real_escape_string($SID)."'";
					$executequery=$conn->CacheExecute(20,$query);
				}

				
				header("Location:$config[baseurl]/post/".$pid."?new=1");exit;
			}
		}
		if (isset($_GET['t']) && $_GET['t'] == 1) {
			$theme = "post2.tpl";
		}else if (isset($_GET['t']) && $_GET['t'] == 2) {
			$theme = "post3.tpl";
		}else{
			$theme = "post.tpl";
		}
	}
}
else
{ 
	header("Location:$config[baseurl]/login");exit;
}

function slxh($str,$char) {
	$chars=str_split($str);
	$count=0;
	foreach($chars as &$chars)
	{
		if($chars==$char)
		{
	  $count++;
		}
	}
	return $count;
}

//TEMPLATES BEGIN
STemplate::assign('menu',3);
STemplate::assign('error',$error);
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>