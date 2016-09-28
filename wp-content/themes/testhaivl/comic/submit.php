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

include("../include/config.php");
include("../include/function/import.php");

$SID = $_SESSION['USERID'];
if ($SID != "" && $SID >= 0 && is_numeric($SID))
{	

	//wm user
	$text = 'myfancy.org';
	$font_file = '../GOTHIC.TTF';

	$query = "select status from members where USERID = $SID"; 
	$executequery = $conn->CacheExecute(20,$query);
	$status = $executequery->fields['status'];
	
	if($status == 0)
	{	
		$error = 'Bạn không thể thực hiện chức năng này';
		$theme = "empty.tpl";
	}
	else
	{	
			$dir = date('Y/m/d');
			$config['pdir'] = $config['basedir'].'/pdata'.'/'.date('Y/m/d');
			if (!file_exists($config['pdir'].'/t')) {
				mkdir($config['pdir'].'/t', 0777, true);
			}
			$file = cleanit($_REQUEST['file']);
		$folder = get_folder($config['pdir']);
	
		$nsfw = 0;
		$source = "Tự Làm";
		$tags = "Chế ảnh";
		$title = $_REQUEST['title'];
		$imageData = $_REQUEST['imageData'];
		$url = "";
	
		$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', story='".mysql_real_escape_string($title)."',  tags='".mysql_real_escape_string($tags)."', source='".mysql_real_escape_string($source)."', nsfw='".mysql_real_escape_string($nsfw)."', url='".mysql_real_escape_string($url)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='0', pip='".$_SERVER['REMOTE_ADDR']."'";
		$result=$conn->CacheExecute(20,$query);
		$pid = mysql_insert_id();
		
		$uploadedimage = $config['pdir'].'/'.$pid.'-temp.png';
		
		$imageData = str_replace('data:image/png;base64,', '', $imageData);
		$imageData = str_replace(' ', '+', $imageData);
		$data = base64_decode($imageData);
		$success = file_put_contents($uploadedimage, $data);
		
		$theimageinfo = getimagesize($uploadedimage);
		if($theimageinfo[2] != 1 && $theimageinfo[2] != 2 && $theimageinfo[2] != 3)
		{
			$error = $lang['94'];
			$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
			$conn->CacheExecute(20,$query);
			unlink($uploadedimage);
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
			
			if($uploadedimage != "")
			{
														
				$thepp = $pid;
				if($theimageinfo[2] == 1)
				{
					$thepp .= ".gif";
					$thepp2 = ".gif";
					$processgif = "1";
				}
				elseif($theimageinfo[2] == 2)
				{
					$thepp .= ".jpg";
					$thepp2 = ".jpg";
				}
				elseif($theimageinfo[2] == 3)
				{
					$thepp .= ".png";
					$thepp2 = ".png";
				}
				if($error == "")
				{
					$myvideoimgnew=$config['pdir']."/".$thepp;
					if(file_exists($myvideoimgnew))
					{
						unlink($myvideoimgnew);
					}
					copy ($uploadedimage , $myvideoimgnew);
					if($processgif == "1")
					{
						do_resize_image2($myvideoimgnew, "700", "5000", true, $config['pdir']."/t/l-".$thepp, $config['pdir']."/t/z-".$thepp);
						do_resize_image2($myvideoimgnew, "460", "3000", true, $config['pdir']."/t/".$thepp, $config['pdir']."/t/z-".$thepp);
						do_resize_image2($myvideoimgnew, "220", "220", true, $config['pdir']."/t/s-".$thepp, $config['pdir']."/t/z-".$thepp);
					}
					else
					{
						do_resize_image($myvideoimgnew, "700", "5000", true, $config['pdir']."/t/l-".$thepp);
						do_resize_image($myvideoimgnew, "460", "3000", true, $config['pdir']."/t/".$thepp);
						do_resize_image($myvideoimgnew, "220", "220", true, $config['pdir']."/t/s-".$thepp);
					}	
					if(file_exists($config['pdir']."/".$thepp))
					{
						
						if($config['wm'] == "1")
						{
							$watermark = $config['imagedir']."/wm/".rand(1,5).".png";												
							if($thepp2 == ".png")
							{
								$img=imagecreatefrompng($config['pdir']."/t/".$folder."l-".$thepp);
							}
							elseif($thepp2 == ".jpg")
							{
								$img=imagecreatefromjpeg($config['pdir']."/t/".$folder."l-".$thepp);
							}									
							else
							{
								$wskip = "1";	
							}
							
							if($wskip != "1")
							{		
								$img_width=imagesx($img);
								$img_height=imagesy($img);
								if ($wmright) {
									$wmr = $img_width - 30;
								}

								$font_size = 10;
								$box = @ImageTTFBBox($font_size,0,$font_file,$text) ;
								$text_width = abs($box[4]) + 10;
								$text_height = abs($box[5]) + 6;
								$pos_height = $img_height/2 - $text_width/2;
								$imu = imagecreatetruecolor($text_width, $text_height);
								$font_color = ImageColorAllocate($img,255,255,255) ;
								ImageCopyMerge($img, $imu, 8 + $wmr, $pos_height, 0, 0, $text_height, $text_width, 40);
								imagettftext($img, $font_size, -90, 8 + 4 + $wmr,  $pos_height + 4, $font_color, $font_file, $text);
								
		
								$watermark=imagecreatefrompng($watermark);  
								$watermark_width=imagesx($watermark);  
								$watermark_height=imagesy($watermark); 
								$im = imagecreatetruecolor($img_width, $img_height+$watermark_height);
								imagecopy($im, $img,0,0, 0, 0, $img_width, $img_height);
							//	$image=imagecreatetruecolor($watermark_width, $watermark_height);  
							//	imagealphablending($image, false);			
								imagecopy($im, $watermark, 0, $img_height, 0, 0, $watermark_width, $watermark_height);
								imagesavealpha($im , true);
								imagejpeg($im, $config['pdir']."/t/".$folder."l-".$thepp, 100);	
								
							}
							
							if($thepp2 == ".png")
							{
								$img=imagecreatefrompng($config['pdir']."/t/".$folder.$thepp);
							}
							elseif($thepp2 == ".jpg")
							{
								$img=imagecreatefromjpeg($config['pdir']."/t/".$folder.$thepp);
							}
							elseif($thepp2 == ".gif")
							{
								$img=imagecreatefromjpeg($config['pdir']."/t/".$folder.$thepp);
							}
							else
							{
								$wskip = "1";	
							}
							
							if($wskip != "1")
							{		
								$img_width=imagesx($img);
								$img_height=imagesy($img);
								if ($wmright) {
									$wmr = $img_width - 30;
								}
								$font_size = 10;
								$box = @ImageTTFBBox($font_size,0,$font_file,$text) ;
								$text_width = abs($box[4]) + 10;
								$text_height = abs($box[5]) + 6;
								$pos_height = $img_height/2 - $text_width/2;
								$imu = imagecreatetruecolor($text_width, $text_height);
								$font_color = ImageColorAllocate($img,255,255,255) ;
								ImageCopyMerge($img, $imu, 8 + $wmr, $pos_height, 0, 0, $text_height, $text_width, 40);
								imagettftext($img, $font_size, -90, 8 + 4 + $wmr,  $pos_height + 4, $font_color, $font_file, $text);
							//	$image=imagecreatetruecolor($watermark_width, $watermark_height); 
								$im = imagecreatetruecolor($img_width, $img_height+$watermark_height);
								imagecopy($im, $img,0,0, 0, 0, $img_width, $img_height);
							//	imagealphablending($image, false);													
								imagecopy($im, $watermark, 0, $img_height, 0, 0, $watermark_width, $watermark_height);
								imagesavealpha($im, true);
								imagejpeg($im, $config['pdir']."/t/".$folder.$thepp, 90);
							}
						}
						
						//do_resize_thumb($config['pdir']."/t/".$folder.$thepp, "200", "200", true, $config['pdir']."/t/".$folder."s-".$thepp);
					
						$query = "UPDATE posts SET pic='$thepp', active='$active' WHERE PID='".mysql_real_escape_string($pid)."'";
						$conn->CacheExecute(20,$query);
						unlink($uploadedimage);
						/*
						$query = "UPDATE folders SET con_count=con_count+1";
						$executequery=$conn->CacheExecute(20,$query);
						*/
						unlink($config['pdir']."/".$thepp);
						
						$points_gag = $config['points_gag'];
						if($points_gag > 0)
						{
							$query = "UPDATE members SET points=points+$points_gag WHERE USERID='".mysql_real_escape_string($SID)."'";
							$executequery=$conn->CacheExecute(20,$query);
							
						}
						

						echo $config[baseurl]."/post/".$pid;exit;
					}
				}
			}	
		}
	}
}
else
{ 
	echo $config[baseurl]."/login";exit;
}

?>