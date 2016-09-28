<?php

include("include/config.php");
include("include/functions/import.php");

$SID = $_SESSION['USERID'];
if ($SID != "" && $SID >= 0 && is_numeric($SID))
{	
	$pid = intval($_REQUEST['pid']);
	if (does_post_exist($pid) && $config['fixenabled'] == 1)
	{
		$query = "SELECT PID, story, tags, nsfw, pic FROM posts WHERE PID='".mysql_real_escape_string($pid)."' AND active='1'";
       	$executequery = $conn->execute($query);
       	$parray = $executequery->getarray();
		STemplate::assign('p',$parray[0]);	
		
		$ctime = 24 * 60 * 60;
		$utime = time() - $ctime;
		$query = "select count(*) as total from posts where time_added>='$utime'"; 
		$executequery = $conn->execute($query);
		$myuploads = $executequery->fields['total'];
		$quota = $config['quota'];
		if($myuploads >= $quota)
		{
			$error = $lang['188'];
			$theme = "empty.tpl";
		}
		else
		{
			$theme = "fix.tpl";
			
			$fixsub = cleanit($_REQUEST['fixsub']);
			if($fixsub == "1")
			{
				$nsfw = intval(cleanit($_REQUEST['nsfw']));
				$tags = cleanit($_REQUEST['tags']);
				$title = stripslashes($parray[0]['story'])." [Đã sửa]";
				$uploadedimage = $_FILES['image']['tmp_name'];
				
				if($uploadedimage == "")
				{
					$error = $lang['93'];
				}
				else
				{
					$theimageinfo = getimagesize($uploadedimage);
					if($theimageinfo[2] != 1 && $theimageinfo[2] != 2 && $theimageinfo[2] != 3)
					{
						$error = $lang['94'];
					}
					else
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
						$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', story='".mysql_real_escape_string($title)."', tags='".mysql_real_escape_string($tags)."', nsfw='".mysql_real_escape_string($nsfw)."', fix='".mysql_real_escape_string($pid)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='$active', pip='".$_SERVER['REMOTE_ADDR']."'";
						$result=$conn->execute($query);
						$pid = mysql_insert_id();
						
						if($uploadedimage != "")
						{
							$thepp = $pid;
							if($theimageinfo[2] == 1)
							{
								$thepp .= ".gif";
							}
							elseif($theimageinfo[2] == 2)
							{
								$thepp .= ".jpg";
							}
							elseif($theimageinfo[2] == 3)
							{
								$thepp .= ".png";
							}
							if($error == "")
							{
								$myvideoimgnew=$config['pdir']."/".$thepp;
								if(file_exists($myvideoimgnew))
								{
									unlink($myvideoimgnew);
								}
								$myconvertimg = $_FILES['image']['tmp_name'];
								move_uploaded_file($myconvertimg, $myvideoimgnew);
								do_resize_image($myvideoimgnew, "700", "0", true, $config['pdir']."/t/l-".$thepp);
								do_resize_image($myvideoimgnew, "460", "0", true, $config['pdir']."/t/".$thepp);
								do_resize_image($myvideoimgnew, "215", "0", true, $config['pdir']."/t/s-".$thepp);
								if(file_exists($config['pdir']."/".$thepp))
								{
									$query = "UPDATE posts SET pic='$thepp' WHERE PID='".mysql_real_escape_string($pid)."'";
									$conn->execute($query);
									$up_points = $config['up_points'];
									if($up_points > 0)
									{
									$query = "UPDATE members SET points=points+$up_points WHERE USERID='".mysql_real_escape_string($SID)."'";
									$executequery=$conn->execute($query);
									}
									
									header("Location:$config[baseurl]".$config[postfolder].$pid."?new=1");exit;
								}
							}
						}
					}
				}
			}	
		}
	}
	elseif($config['fixenabled'] == 0){
	$theme = "empty.tpl";
	$error = $lang['263'];
	}
	else
	{
		$theme = "empty.tpl";
		$error = $lang['183'];
	}
}
else
{
	header("Location:$config[baseurl]/login");exit;
}

//TEMPLATES BEGIN
STemplate::assign('pagetitle',$lang['142']);
STemplate::assign('menu',3);
STemplate::assign('error',$error);
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>