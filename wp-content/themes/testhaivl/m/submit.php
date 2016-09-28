<?php

include("config.php");
$mobileurl = $config['mobileurl'];
include($config['basedir']."/include/config.php");
STemplate::assign('mobileurl',$mobileurl);

// The path to the font
$wmfont = $config['basedir']."/include/fonts/".$config['wmfont'];
// The font size 
$fsize = $config['fsize'];
// RGB values for watermark background and text colors
$blackr = $config['blackr'];
$blackb = $config['blackb'];
$blackg = $config['blackg'];
$whiter = $config['whiter'];
$whiteb = $config['whiteb'];
$whiteg = $config['whiteg'];

$SID = $_SESSION['USERID'];
if ($SID != "" && $SID >= 0 && is_numeric($SID))
{	
	$ctime = 24 * 60 * 60;
	$utime = time() - $ctime;
	$query = "select count(*) as total from posts WHERE USERID='".mysql_real_escape_string($SID)."' AND time_added>='$utime'"; 
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
	
		$queryc = "SELECT * FROM channels";
		$executequeryc = $conn->execute($queryc);
		$c =  $executequeryc->getarray();
		STemplate::assign('c',$c);
	
		$t = cleanit($_REQUEST['t']);
		if($t == "v" && $config['vupload'] == 1)
		{
			$post_type = cleanit($_REQUEST['post_type']);
			if($post_type == "Video")
			{
				$nsfw = intval(cleanit($_REQUEST['nsfw']));
				$source = cleanit($_REQUEST['source']);
				$tags = cleanit($_REQUEST['tags']);
				$CID = cleanit($_REQUEST['CID']);
				$title = cleanit($_REQUEST['title']);
				$url = cleanit($_REQUEST['url']);
				
				if($url == "")
				{
					$error = $lang['98'];
				}
				elseif($title == "")
				{
					$error = $lang['95'];
				}
				
				if((!strstr($url, 'youtube.com')))
				{
					$error = $lang['99'];
				}
				
				if($error == "")
				{
					if(strstr($url, 'youtube.com'))
					{
						$youtube_url = $url;
						$youtube_id = getYouTubeIdFromURL($youtube_url);
						$addme = ", youtube_key='".$youtube_id."'";
					}
					$approve_stories = $config['approve_stories'];
					if($approve_stories == "1")
					{
						$active = "0";
					}
					else
					{
						$active = "1";
					}
					
					$queryupdateposts = "SELECT * FROM members WHERE USERID='".mysql_real_escape_string($SID)."'"; 
					$executequeryupdateposts = $conn->execute($queryupdateposts);
					$userposts = $executequeryupdateposts->fields['posts'];
					$updateposts = $userposts+1 ;
					$queryupdateposts2 = "UPDATE members SET posts='$updateposts' WHERE USERID='".mysql_real_escape_string($SID)."'"; 
					$executequeryupdateposts2 = $conn->execute($queryupdateposts2);
					
					$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', story='".mysql_real_escape_string($title)."', tags='".mysql_real_escape_string($tags)."', source='".mysql_real_escape_string($source)."', CID='".mysql_real_escape_string($CID)."', nsfw='".mysql_real_escape_string($nsfw)."', url='".mysql_real_escape_string($url)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='$active', pip='".$_SERVER['REMOTE_ADDR']."' $addme";
					$result=$conn->execute($query);
					$pid = mysql_insert_id();
					
					$up_points = $config['up_points'];
					if($up_points > 0)
					{
					$query = "UPDATE members SET points=points+$up_points WHERE USERID='".mysql_real_escape_string($SID)."'";
					$executequery=$conn->execute($query);
					}
					
					if($config[SEO] == 1)
					{
					header("Location:$mobileurl".$config[postfolder].$pid."/".makeseo($title).".html?new=1");exit;
					}
					else
					{
					header("Location:$mobileurl".$config[postfolder].$pid."/?new=1");exit;
					}
				}
			}
			$theme = "submit2.tpl";
		}
		else
		{
			$dir = date('Y/m/d');
			$config['pdir'] = $config['basedir'].'/pdata'.'/'.date('Y/m/d');
			if (!file_exists($config['pdir'].'/t')) {
				mkdir($config['pdir'].'/t', 0777, true);
			}
			$file = cleanit($_REQUEST['file']);
			if($file == "1")
			{
				$post_type = cleanit($_REQUEST['post_type']);
				if($post_type == "Photo")
				{
					$nsfw = intval(cleanit($_REQUEST['nsfw']));
					$source = cleanit($_REQUEST['source']);
					$tags = cleanit($_REQUEST['tags']);
					$CID = cleanit($_REQUEST['CID']);
					$title = cleanit($_REQUEST['title']);
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
							if($title == "")
							{
								$error = $lang['95'];
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
								$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', story='".mysql_real_escape_string($title)."', tags='".mysql_real_escape_string($tags)."', source='".mysql_real_escape_string($source)."', CID='".mysql_real_escape_string($CID)."', nsfw='".mysql_real_escape_string($nsfw)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='$active', pip='".$_SERVER['REMOTE_ADDR']."'";
								$result=$conn->execute($query);
								$pid = mysql_insert_id();
								
								if($uploadedimage != "")
								{
									$thepp = $pid;
									$thepp3 = $pid;
									if($theimageinfo[2] == 1)
									{
										$thepp .= ".gif";
										$thepp2 = ".gif";
										$thepp3 .= ".jpg";
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
										$myconvertimg = $_FILES['image']['tmp_name'];
										move_uploaded_file($myconvertimg, $myvideoimgnew);
										if($thepp2 != ".gif")
										{
										do_resize_image($myvideoimgnew, "700", "0", true, $config['pdir']."/t/l-".$thepp);
										do_resize_image($myvideoimgnew, "460", "0", true, $config['pdir']."/t/".$thepp);
										do_resize_image($myvideoimgnew, "215", "0", true, $config['pdir']."/t/s-".$thepp);
										}
										else
										{
										imagick_gif_resize($myvideoimgnew, "700", "0", true, $config['pdir']."/t/l-".$thepp, $config['pdir']."/t/z-".$thepp);
										imagick_gif_resize($myvideoimgnew, "460", "0", true, $config['pdir']."/t/".$thepp, $config['pdir']."/t/z-".$thepp);
										do_resize_image($myvideoimgnew, "215", "0", true, $config['pdir']."/t/s-".$thepp);
										$gifurl = $config['imagedir']."/gif.png";
										$gificon = imagecreatefrompng($gifurl);
										$photo = imagecreatefromgif($config['pdir']."/t/".$thepp);
										imagejpeg($photo, $config['pdir']."/t/".$thepp3, 90);
										$photo1 = imagecreatefromjpeg($config['pdir']."/t/".$thepp3);
										$wx = imagesx($photo1)/2 - imagesx($gificon)/2;
										$wy = imagesy($photo1)/2 - imagesy($gificon)/2;
										imagecopy($photo1, $gificon, $wx, $wy, 0, 0, imagesx($gificon), imagesy($gificon));
										imagegif($photo1, $config['pdir']."/t/".$thepp, 90);
										unlink($config['pdir']."/t/z-".$thepp);
										unlink($config['pdir']."/t/".$thepp3);
										}
										if(file_exists($config['pdir']."/".$thepp))
										{

											if($thepp2 == ".png")
												{
													$img=imagecreatefrompng($config['pdir']."/t/l-".$thepp);
												}
												elseif($thepp2 == ".jpg")
												{
													$img=imagecreatefromjpeg($config['pdir']."/t/l-".$thepp);
												}
												else
												{
													$wskip = "1";														
												}
												
												if($wskip != "1")												
												{
												if($config['twm'] == "1")
													{
$watermark = $config['imagedir']."/watermark.png";
$img_width=imagesx($img);
$img_height=imagesy($img);
$watermark=imagecreatefrompng($watermark);
$watermark_width=imagesx($watermark);
$watermark_height=imagesy($watermark);
$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
$image_height=imagesy($image);
$canvas = imagecreatetruecolor($img_width, $watermark_height);
$black = imagecolorallocate($canvas, $blackr, $blackb, $blackg);
$white = imagecolorallocate($canvas, $whiter, $whiteb, $whiteg);
imagefilledrectangle($canvas, 0, 0, $img_width, $watermark_height, $white);
$wmtext = $config['domain'].$config[postfolder].$pid."/";
$box = imagettfbbox($fsize, 0, $wmfont, $wmtext);
$x = 10;
$y = ($watermark_height - ($box[1] - $box[7])) / 2;
$y -= $box[7];
imageTTFText($canvas, $fsize, 0, $x, $y, $black, $wmfont, $wmtext);
imagecopy($image, $canvas, 0, $image_height-$watermark_height, 0, 0, $img_width, $watermark_height);
if($config['lwm'] == "1"){
imagecopy($image, $watermark, $img_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
}
imagejpeg($image, $config['pdir']."/t/l-".$thepp);
imagedestroy($image); 
}
elseif($config['lwm'] == "1")
{	
	$watermark = $config['imagedir']."/watermark.png";												
	$img_width=imagesx($img);
	$img_height=imagesy($img);
	$watermark=imagecreatefrompng($watermark);
	$watermark_width=imagesx($watermark);
	$watermark_height=imagesy($watermark);
	$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
	$white = imagecolorallocate($image, $whiter, $whiteb, $whiteg);
	imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
	$image_width=imagesx($image);
	$image_height=imagesy($image);
	imagefilledrectangle($image, 0, $image_height, $image_width, $image_height - $watermark_height, $white);
	imagecopy($image, $watermark, $image_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
	imagesavealpha($image, true);
	imagejpeg($image, $config['pdir']."/t/l-".$thepp, 90);
}
												
												if($thepp2 == ".png")
												{
													$img=imagecreatefrompng($config['pdir']."/t/".$thepp);
												}
												elseif($thepp2 == ".jpg")
												{
													$img=imagecreatefromjpeg($config['pdir']."/t/".$thepp);
												}
												else
												{
													$wskip = "1";	
												}
												
												if($wskip != "1")
												{		
												if($config['twm'] == "1")
													{
$watermark = $config['imagedir']."/watermark.png";
$img_width=imagesx($img);
$img_height=imagesy($img);
$watermark=imagecreatefrompng($watermark);
$watermark_width=imagesx($watermark);
$watermark_height=imagesy($watermark);
$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
$image_height=imagesy($image);
$canvas = imagecreatetruecolor($img_width, $watermark_height);
$black = imagecolorallocate( $canvas, $blackr, $blackb, $blackg );
$white = imagecolorallocate( $canvas, $whiter, $whiteb, $whiteg );
imagefilledrectangle($canvas, 0, 0, $img_width, $watermark_height, $white);
$wmtext = $config['domain'].$config[postfolder].$pid."/";
$box = imagettfbbox($fsize, 0, $wmfont, $wmtext);
$x = 10;
$y = ($watermark_height - ($box[1] - $box[7])) / 2;
$y -= $box[7];
imageTTFText($canvas, $fsize, 0, $x, $y, $black, $wmfont, $wmtext);
imagecopy($image, $canvas, 0, $image_height-$watermark_height, 0, 0, $img_width, $watermark_height);
if($config['lwm'] == "1"){
imagecopy($image, $watermark, $img_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
}
imagejpeg($image, $config['pdir']."/t/".$thepp);
imagedestroy($image);
}
elseif($config['lwm'] == "1")
{	
	$watermark = $config['imagedir']."/watermark.png";												
	$img_width=imagesx($img);
	$img_height=imagesy($img);
	$watermark=imagecreatefrompng($watermark);
	$watermark_width=imagesx($watermark);
	$watermark_height=imagesy($watermark);
	$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
	$white = imagecolorallocate($image, $whiter, $whiteb, $whiteg);
	imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
	$image_width=imagesx($image);
	$image_height=imagesy($image);
	imagefilledrectangle($image, 0, $image_height, $image_width, $image_height - $watermark_height, $white);
	imagecopy($image, $watermark, $image_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
	imagesavealpha($image, true);
	imagejpeg($image, $config['pdir']."/t/".$thepp, 90);
}								
												}
											}

											$queryupdateposts = "SELECT * FROM members WHERE USERID='".mysql_real_escape_string($SID)."'"; 
											$executequeryupdateposts = $conn->execute($queryupdateposts);
											$userposts = $executequeryupdateposts->fields['posts'];
											$updateposts = $userposts+1 ;
											$queryupdateposts2 = "UPDATE members SET posts='$updateposts' WHERE USERID='".mysql_real_escape_string($SID)."'"; 
											$executequeryupdateposts2 = $conn->execute($queryupdateposts2);
																				
											$query = "UPDATE posts SET pic='$thepp' WHERE PID='".mysql_real_escape_string($pid)."'";
											$conn->execute($query);
											
											$up_points = $config['up_points'];
											if($up_points > 0)
											{
											$query = "UPDATE members SET points=points+$up_points WHERE USERID='".mysql_real_escape_string($SID)."'";
											$executequery=$conn->execute($query);
											}
											
											if($config[SEO] == 1)
											{
											header("Location:$mobileurl".$config[postfolder].$pid."/".makeseo($title).".html?new=1");exit;
											}
											else
											{
											header("Location:$mobileurl".$config[postfolder].$pid."/?new=1");exit;
											}
											}
									}
								}
							}
						}
					}
				}
			}
			else
			{
				$post_type = cleanit($_REQUEST['post_type']);
				if($post_type == "Photo")
				{
					$nsfw = intval(cleanit($_REQUEST['nsfw']));
					$source = cleanit($_REQUEST['source']);
					$tags = cleanit($_REQUEST['tags']);
					$CID = cleanit($_REQUEST['CID']);
					$title = cleanit($_REQUEST['title']);
					$url = cleanit($_REQUEST['url']);
					
					if($url == "")
					{
						$error = $lang['96'];
					}
					elseif($title == "")
					{
						$error = $lang['95'];
					}
					else
					{
						$pos = strrpos($url,".");
						$ph = strtolower(substr($url,$pos+1,strlen($url)-$pos));
						
						if($ph == "jpg" || $ph == "jpeg" || $ph == "png" || $ph == "gif")
						{
							
							$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', story='".mysql_real_escape_string($title)."', tags='".mysql_real_escape_string($tags)."', source='".mysql_real_escape_string($source)."', CID='".mysql_real_escape_string($CID)."', nsfw='".mysql_real_escape_string($nsfw)."', url='".mysql_real_escape_string($url)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='0', pip='".$_SERVER['REMOTE_ADDR']."'";
							$result=$conn->execute($query);
							$pid = mysql_insert_id();
							$uploadedimage = $config['pdir'].'/'.$pid.'-temp.'.$ph;
							if(!download_photo($url, $uploadedimage))
							{
								$error = $lang['97'];
								$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
								$conn->execute($query);
							}
							else
							{							
								$theimageinfo = getimagesize($uploadedimage);
								if($theimageinfo[2] != 1 && $theimageinfo[2] != 2 && $theimageinfo[2] != 3)
								{
									$error = $lang['94'];
									$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
									$conn->execute($query);
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
										$thepp3 = $pid;
										if($theimageinfo[2] == 1)
										{
											$thepp .= ".gif";
											$thepp2 = ".gif";
											$thepp3 .= ".jpg";
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
											if($thepp2 != ".gif")
										{
										do_resize_image($myvideoimgnew, "700", "0", true, $config['pdir']."/t/l-".$thepp);
										do_resize_image($myvideoimgnew, "460", "0", true, $config['pdir']."/t/".$thepp);
										do_resize_image($myvideoimgnew, "215", "0", true, $config['pdir']."/t/s-".$thepp);
										}
										else
										{
										imagick_gif_resize($myvideoimgnew, "700", "0", true, $config['pdir']."/t/l-".$thepp, $config['pdir']."/t/z-".$thepp);
										imagick_gif_resize($myvideoimgnew, "460", "0", true, $config['pdir']."/t/".$thepp, $config['pdir']."/t/z-".$thepp);
										do_resize_image($myvideoimgnew, "215", "0", true, $config['pdir']."/t/s-".$thepp);
										$gifurl = $config['imagedir']."/gif.png";
										$gificon = imagecreatefrompng($gifurl);
										$photo = imagecreatefromgif($config['pdir']."/t/".$thepp);
										imagejpeg($photo, $config['pdir']."/t/".$thepp3, 90);
										$photo1 = imagecreatefromjpeg($config['pdir']."/t/".$thepp3);
										$wx = imagesx($photo1)/2 - imagesx($gificon)/2;
										$wy = imagesy($photo1)/2 - imagesy($gificon)/2;
										imagecopy($photo1, $gificon, $wx, $wy, 0, 0, imagesx($gificon), imagesy($gificon));
										imagegif($photo1, $config['pdir']."/t/".$thepp, 90);
										unlink($config['pdir']."/t/z-".$thepp);
										unlink($config['pdir']."/t/".$thepp3);
										}
											if(file_exists($config['pdir']."/".$thepp))
											{
												
												if($thepp2 == ".png")
												{
													$img=imagecreatefrompng($config['pdir']."/t/l-".$thepp);
												}
												elseif($thepp2 == ".jpg")
												{
													$img=imagecreatefromjpeg($config['pdir']."/t/l-".$thepp);
												}
												else
												{
													$wskip = "1";	
												}
												
												if($wskip != "1")												
												{
												if($config['twm'] == "1")
													{
$watermark = $config['imagedir']."/watermark.png";
$img_width=imagesx($img);
$img_height=imagesy($img);
$watermark=imagecreatefrompng($watermark);
$watermark_width=imagesx($watermark);
$watermark_height=imagesy($watermark);
$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
$image_height=imagesy($image);
$canvas = imagecreatetruecolor($img_width, $watermark_height);
$black = imagecolorallocate( $canvas, $blackr, $blackb, $blackg );
$white = imagecolorallocate( $canvas, $whiter, $whiteb, $whiteg );
imagefilledrectangle($canvas, 0, 0, $img_width, $watermark_height, $white);
$wmtext = $config['domain'].$config[postfolder].$pid."/";
$box = imagettfbbox($fsize, 0, $wmfont, $wmtext);
$x = 10;
$y = ($watermark_height - ($box[1] - $box[7])) / 2;
$y -= $box[7];
imageTTFText($canvas, $fsize, 0, $x, $y, $black, $wmfont, $wmtext);
imagecopy($image, $canvas, 0, $image_height-$watermark_height, 0, 0, $img_width, $watermark_height);
if($config['lwm'] == "1"){
imagecopy($image, $watermark, $img_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
}
imagejpeg($image, $config['pdir']."/t/l-".$thepp);
imagedestroy($image);
}
elseif($config['lwm'] == "1")
{	
	$watermark = $config['imagedir']."/watermark.png";												
	$img_width=imagesx($img);
	$img_height=imagesy($img);
	$watermark=imagecreatefrompng($watermark);
	$watermark_width=imagesx($watermark);
	$watermark_height=imagesy($watermark);
	$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
	$white = imagecolorallocate($image, $whiter, $whiteb, $whiteg);
	imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
	$image_width=imagesx($image);
	$image_height=imagesy($image);
	imagefilledrectangle($image, 0, $image_height, $image_width, $image_height - $watermark_height, $white);
	imagecopy($image, $watermark, $image_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
	imagesavealpha($image, true);
	imagejpeg($image, $config['pdir']."/t/l-".$thepp, 90);
}
												
												if($thepp2 == ".png")
												{
													$img=imagecreatefrompng($config['pdir']."/t/".$thepp);
												}
												elseif($thepp2 == ".jpg")
												{
													$img=imagecreatefromjpeg($config['pdir']."/t/".$thepp);
												}
												else
												{
													$wskip = "1";	
												}
												
												if($wskip != "1")
												{		

												if($config['twm'] == "1")
													{
$watermark = $config['imagedir']."/watermark.png";
$img_width=imagesx($img);
$img_height=imagesy($img);
$watermark=imagecreatefrompng($watermark);
$watermark_width=imagesx($watermark);
$watermark_height=imagesy($watermark);
$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
$image_height=imagesy($image);
$canvas = imagecreatetruecolor($img_width, $watermark_height);
$black = imagecolorallocate( $canvas, $blackr, $blackb, $blackg );
$white = imagecolorallocate( $canvas, $whiter, $whiteb, $whiteg );
imagefilledrectangle($canvas, 0, 0, $img_width, $watermark_height, $white);
$wmtext = $config['domain'].$config[postfolder].$pid."/";
$box = imagettfbbox($fsize, 0, $wmfont, $wmtext);
$x = 10;
$y = ($watermark_height - ($box[1] - $box[7])) / 2;
$y -= $box[7];
imageTTFText($canvas, $fsize, 0, $x, $y, $black, $wmfont, $wmtext);
imagecopy($image, $canvas, 0, $image_height-$watermark_height, 0, 0, $img_width, $watermark_height);
if($config['lwm'] == "1"){
imagecopy($image, $watermark, $img_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
}
imagejpeg($image, $config['pdir']."/t/".$thepp);
imagedestroy($image);
}
elseif($config['lwm'] == "1")
{	
	$watermark = $config['imagedir']."/watermark.png";												
	$img_width=imagesx($img);
	$img_height=imagesy($img);
	$watermark=imagecreatefrompng($watermark);
	$watermark_width=imagesx($watermark);
	$watermark_height=imagesy($watermark);
	$image=imagecreatetruecolor($img_width, $img_height+$watermark_height);
	$white = imagecolorallocate($image, $whiter, $whiteb, $whiteg);
	imagecopy($image, $img, 0, 0, 0, 0, $img_width, $img_height);
	$image_width=imagesx($image);
	$image_height=imagesy($image);
	imagefilledrectangle($image, 0, $image_height, $image_width, $image_height - $watermark_height, $white);
	imagecopy($image, $watermark, $image_width-$watermark_width, $image_height-$watermark_height, 0, 0, $watermark_width, $watermark_height);
	imagesavealpha($image, true);
	imagejpeg($image, $config['pdir']."/t/".$thepp, 90);
}								
												}
											}
											
												$queryupdateposts = "SELECT * FROM members WHERE USERID='".mysql_real_escape_string($SID)."'"; 
												$executequeryupdateposts = $conn->execute($queryupdateposts);
												$userposts = $executequeryupdateposts->fields['posts'];
												$updateposts = $userposts+1 ;
												$queryupdateposts2 = "UPDATE members SET posts='$updateposts' WHERE USERID='".mysql_real_escape_string($SID)."'"; 
												$executequeryupdateposts2 = $conn->execute($queryupdateposts2);
												
												$query = "UPDATE posts SET pic='$thepp', active='$active' WHERE PID='".mysql_real_escape_string($pid)."'";
												$conn->execute($query);
												unlink($uploadedimage);
												
												$up_points = $config['up_points'];
												if($up_points > 0)
												{
												$query = "UPDATE members SET points=points+$up_points WHERE USERID='".mysql_real_escape_string($SID)."'";
												$executequery=$conn->execute($query);
												}
												
												if($config[SEO] == 1)
												{
												header("Location:$mobileurl".$config[postfolder].$pid."/".makeseo($title).".html?new=1");exit;
												}
												else
												{
												header("Location:$mobileurl".$config[postfolder].$pid."/?new=1");exit;
												}
											}
										}
									}	
								}
							}
						}
						else
						{
							$error = $lang['94'];
						}
					}
				}
			}
			$theme = "submit.tpl";
		}
	}
}
else
{
	header("Location:$mobileurl/login");exit;
}

$query5 = "SELECT * FROM channels";
$executequery5 = $conn->Execute($query5);	
$cats = $executequery5->getarray();
STemplate::assign('allchannels',$cats);

$_SESSION['location'] = "/submit";

//TEMPLATES BEGIN
STemplate::setTplDir($config['mobiledir']."/themes");
STemplate::assign('menu',3);
STemplate::assign('error',$error);
STemplate::assign('message',$message);
STemplate::display('header.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>