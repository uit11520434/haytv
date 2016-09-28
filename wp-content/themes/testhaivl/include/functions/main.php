<?php

function tagsexplode($tags)
{
	global $config;
	$words = explode(",",$tags);
	if ($tags != '')
	{
		echo "<img src='".$config['imageurl']."/tags.png' title='T? kh�a' /> : ";
		foreach($words as $key=>$values)
		{
			$values = trim($values);
			echo "<a href='".$config['baseurl']."/search?query=$values'>".$values."</a> ";
		}
	}
}

function insert_get_rank($var)
{
	global $config;
	$items_per_page = $config['items_per_page'];
    $paged = $var['pg'];
	$ite = $var['ite'];
	$total = ($paged * $items_per_page) -$items_per_page  + $ite;
	return intval($total);
}

function download_photo($url, $saveto)
{
	global $config;
	if (!curlSaveToFile($url, $saveto))
	{
		return false;
	}
	return true;
}

function curlSaveToFile( $url, $local )
{
	$ch = curl_init();
	$fh = fopen($local, 'w');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FILE, $fh);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_NOPROGRESS, true);
	curl_setopt($ch, CURLOPT_USERAGENT, '"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.11) Gecko/20071204 Ubuntu/7.10 (gutsy) Firefox/2.0.0.11');
	curl_exec($ch);
	
	if( curl_errno($ch) ) {
		return false;
	}
	
	curl_close($ch);
	fclose($fh);
	
	if( filesize($local) > 10 ) {
		return true;
	}
	
	return false;
}

function delete_user($USERID)
{
    global $config,$conn;
	if($USERID > 0)
	{
		$query = "select profilepicture from members where USERID='".mysql_real_escape_string($USERID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$delpp = $executequery->fields['profilepicture'];
		if($delpp != "")
		{
			$del1=$config['membersprofilepicdir']."/".$delpp;
			if(file_exists($del1))
			{
				unlink($del1);
			}
			$del2=$config['membersprofilepicdir']."/thumbs/".$delpp;
			if(file_exists($del2))
			{
				unlink($del2);
			}
			$del3=$config['membersprofilepicdir']."/o/".$delpp;
			if(file_exists($del3))
			{
				unlink($del3);
			}
		}
		$query="SELECT PID FROM posts WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$results = $conn->execute($query);
		$returnthis = $results->getrows();
		$vtotal = count($returnthis);
		for($i=0;$i<$vtotal;$i++)
		{
			$DPID = intval($returnthis[$i]['PID']);
			if($DPID > 0)
			{
				delete_post($DPID);
			}
		}
		$query = "DELETE FROM members WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM members_passcode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM members_verifycode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_favorited WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_unfavorited WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
	}
}

function delete_post($PID)
{
    global $config,$conn;
	if($PID > 0)
	{
		$query = "select pic from posts where PID='".mysql_real_escape_string($PID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$thepp = $executequery->fields['pic'];
		if($thepp != "")
		{
			$p1 = $config['pdir']."/t/l-".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/t/".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/t/s-".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
		}
		$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_favorited WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_reports WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_unfavorited WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->execute($query);
	}
}

function do_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = 'file')
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = '';

	$final_width = 0;
	$final_height = 0;
	list($width_old, $height_old) = $info;

	if($proportional) 
	{
	  if ($width == 0) $factor = $height/$height_old;
	  elseif ($height == 0) $factor = $width/$width_old;
	  else $factor = min ( $width / $width_old, $height / $height_old);   
	  
	  $final_width = round ($width_old * $factor);
	  $final_height = round ($height_old * $factor);
		  
	  if($final_width > $width_old && $final_height > $height_old)
	  {
	  	  $final_width = $width_old;
		  $final_height = $height_old;

	  }
	}
	else 
	{
	  $final_width = ( $width <= 0 ) ? $width_old : $width;
	  $final_height = ( $height <= 0 ) ? $height_old : $height;
	}
	
	switch($info[2]) 
	{
	  case IMAGETYPE_GIF:
		$image = imagecreatefromgif($file);
	  break;
	  case IMAGETYPE_JPEG:
		$image = imagecreatefromjpeg($file);
	  break;
	  case IMAGETYPE_PNG:
		$image = imagecreatefrompng($file);
	  break;
	  default:
		return false;
	}

	$image_resized = imagecreatetruecolor( $final_width, $final_height );

	if(($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG))
	{
	  $trnprt_indx = imagecolortransparent($image);
	
	  if($trnprt_indx >= 0)
	  {
		$trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
		$trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
		imagefill($image_resized, 0, 0, $trnprt_indx);
		imagecolortransparent($image_resized, $trnprt_indx);	
	  } 
	  elseif($info[2] == IMAGETYPE_PNG) 
	  {
		imagealphablending($image_resized, false);
		$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
		imagefill($image_resized, 0, 0, $color);
		imagesavealpha($image_resized, true);
	  }
	}
	imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);

	switch( strtolower($output))
	{
	  case 'browser':
		$mime = image_type_to_mime_type($info[2]);
		header("Content-type: $mime");
		$output = NULL;
	  break;
	  case 'file':
		$output = $file;
	  break;
	  case 'return':
		return $image_resized;
	  break;
	  default:
	  break;
	}
	
	if(file_exists($output))
	{
		@unlink($output);
	}

	switch($info[2])
	{
	  case IMAGETYPE_GIF:
		imagegif($image_resized, $output);
	  break;
	  case IMAGETYPE_JPEG:
		imagejpeg($image_resized, $output, 100);
	  break;
	  case IMAGETYPE_PNG:
		imagepng($image_resized, $output);
	  break;
	  default:
		return false;
	}
	return true;
}

function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}
function insert_get_seo_profile($a)
{
        $members = $a['username'];
		echo $members;
}

function get_seo_profile($members)
{
		return $members;
}

function escape($data)
{
    if (ini_get('magic_quotes_gpc'))
	{
    	$data = stripslashes($data);
    }
    return mysql_real_escape_string($data);
}
function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AID])."' AND active='1' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function verify_email_username($usernametocheck)
{
    global $config,$conn;
	$query = "select count(*) as total from members where username='".mysql_real_escape_string($usernametocheck)."' limit 1"; 
	$executequery = $conn->execute($query);
	$totalu = $executequery->fields[total];
	if ($totalu >= 1)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function verify_valid_email($emailtocheck)
{
       $eregicheck = "^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,4}\$";
       return eregi($eregicheck, $emailtocheck);
}

function mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="")
{
	global $SERVER_NAME;
	$subject = nl2br($subject);
	$sendmailbody = nl2br($sendmailbody);
	$sendto = $sendto;
	if($bcc!="")
	{
		$headers = "Bcc: ".$bcc."\n";
	}
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=utf-8 \n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: PHP/"."MIME-Version: 1.0\n";
	$headers .= "From: " . $from . "\n";
	$headers .= "Content-Type: text/html\n";
	mail("$sendto","$subject","$sendmailbody","$headers");
}
$u = $config['baseurl'];

function insert_get_member_profilepicture($var)
{
        global $conn;
        $query="SELECT profilepicture FROM members WHERE USERID='".mysql_real_escape_string($var[USERID])."' limit 1";
        $executequery=$conn->execute($query);
		$results = $executequery->fields[profilepicture];
		if ($results == "")
			return "noprofilepicture.jpg";
		else
			return $results;
}
function generatethumbs($theconvertimg,$thevideoimgnew,$thewidth,$theheight)
{
	global $config;
    $convertimg = $theconvertimg;
    $videoimgnew = $thevideoimgnew;

    $theimagesizedata = GetImageSize($convertimg);
    $videoimgwidth = $theimagesizedata[0];
    $videoimgheight = $theimagesizedata[1];
    $videoimgformat = $theimagesizedata[2];

    $whratio = 1;
    if ($videoimgwidth > $thewidth)
    {
        $whratio = $thewidth/$videoimgwidth;
    }
	
    if($whratio != 1)
    {
        $dest_height = $whratio * $videoimgheight;
        $dest_width = $thewidth;
    }
    else
    {
        $dest_height=$videoimgheight;
        $dest_width=$videoimgwidth;
    }
	
    if($dest_height > $theheight)
    {
        $whratio = $theheight/$dest_height;
        $dest_width = $whratio * $dest_width;
        $dest_height = $theheight;
    }
	
    if($videoimgformat == 2)
    {
        $videoimgsource = @imagecreatefromjpeg($convertimg);
        $videoimgdest = @imageCreateTrueColor($dest_width, $dest_height);
        ImageCopyResampled($videoimgdest, $videoimgsource, 0, 0, 0, 0, $dest_width, $dest_height, $videoimgwidth, $videoimgheight);
        imagejpeg($videoimgdest, $videoimgnew, 100);
        imagedestroy($videoimgsource);
        imagedestroy($videoimgdest);
    }
    elseif ($videoimgformat == 3)
    {
        $videoimgsource = imagecreatefrompng($convertimg);
        $videoimgdest = imageCreateTrueColor($dest_width, $dest_height);
        ImageCopyResampled($videoimgdest, $videoimgsource, 0, 0, 0, 0, $dest_width, $dest_height, $videoimgwidth, $videoimgheight);
        imagepng($videoimgdest, $videoimgnew, 9);
        imagedestroy($videoimgsource);
        imagedestroy($videoimgdest);
    }
    else
    {
        $videoimgsource = imagecreatefromgif($convertimg);
        $videoimgdest = imageCreateTrueColor($dest_width, $dest_height);
        ImageCopyResampled($videoimgdest, $videoimgsource, 0, 0, 0, 0, $dest_width, $dest_height, $videoimgwidth, $videoimgheight);
        imagejpeg($videoimgdest, $videoimgnew, 100);
        imagedestroy($videoimgsource);
        imagedestroy($videoimgdest);
    }
}

function insert_get_fav_status($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE USERID='".mysql_real_escape_string($_SESSION[USERID])."' AND PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}
function insert_get_follow_status($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM follows WHERE USERFL='".mysql_real_escape_string($_SESSION[USERID])."' AND USERID='".intval($var[USERID])."'";
	$executequery=$conn->CacheExecute(20,$query);
	$total = $executequery->fields[total];
	return intval($total);
}
function insert_get_user_likes($a)
{
    global $conn;
	$isupdate = rand(0,50);
    if ($isupdate == 1){
		$query= "SELECT sum(posts.total_count) AS likes,sum(posts.comments) AS comments,sum(posts.view) AS views FROM  posts	INNER JOIN members ON posts.USERID = members.USERID WHERE members.USERID = '".intval($a[USERID])."'";
		$executequery=$conn->CacheExecute(20,$query);
		$query="UPDATE members SET points = ".$executequery->fields[likes].", cmtcount = ".$executequery->fields[comments].", views = ".$executequery->fields[views]." WHERE USERID = '".intval($a[USERID])."'";
		$executequery=$conn->CacheExecute(20,$query);
	}
	$query= "SELECT points AS likes FROM members WHERE USERID = '".intval($a[USERID])."'";
	$executequery=$conn->CacheExecute(20,$query);
	$likes = $executequery->fields[likes];
	return intval($likes);
}
























































function insert_get_user_level($a)
{	
	$cur = intval($a[POINT]);
	$lvl =  floor(pow($cur,(1/3))) - 5;
	if ($lvl <=0 ){ 
		$lvl = 0; 
	}
	$min = pow(($lvl+5),3);
	$max = pow(($lvl+6),3);
	$per = floor((($max - $cur) * 100) / ($max - $min));
	$per  = 100 - $per;
	return array($cur,$max,$lvl,$per);
}

function insert_get_user_views($a)
{
    global $conn;
	$query= "SELECT sum(posts.view) AS likes FROM  posts	INNER JOIN members ON posts.USERID = members.USERID WHERE members.USERID = '".intval($a[USERID])."'";
	$executequery=$conn->CacheExecute(20,$query);
	$likes = $executequery->fields[likes];
	return intval($likes);
}
function insert_get_user_posts($a)
{
    global $conn;
	$query= "select count(*) as total from posts WHERE posts.USERID = '".intval($a[USERID])."'";
	$executequery=$conn->CacheExecute(20,$query);
	$total = $executequery->fields[total];
	return intval($total);
}
function insert_get_user_rank($a)
{
    global $conn;
	$query= "SELECT  uo.*, 
					(
					SELECT  COUNT(*)
					FROM    members ui
					WHERE   (ui.points, ui.USERID) >= (uo.points, uo.USERID)
					ORDER BY ui.points DESC
					) AS rank
			FROM    members uo
			WHERE   USERID = '".intval($a[USERID])."'";
	$executequery=$conn->CacheExecute(20,$query);
	$rank = $executequery->fields[rank];
	return intval($rank);
}
function insert_get_relationship($a)
{
	switch ($a[r]) {
		case 0:
			$r = "&#272;&#7897;c th�n";
			break;
		case 1:
			$r = "&#272;ang h&#7865;n h�";
			break;
		case 2:
			$r = "&#272;� &#273;�nh h�n";
			break;
		case 4:
			$r = "&#272;� k&#7871;t h�n";
			break;
		case 4:
			$r = "R&#7845;t ph&#7913;c t&#7841;p";
			break;
	}
	return $r;
}
function insert_get_unfav_status($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_unfavorited WHERE USERID='".mysql_real_escape_string($_SESSION[USERID])."' AND PID='".intval($var[PID])."'";
	$executequery=$conn->CacheExecute(20,$query);
	$total = $executequery->fields[total];
	return intval($total);
}
function insert_get_fav_count($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}

function does_post_exist($a)
{
	global $conn, $config;
    $query="SELECT USERID FROM posts WHERE PID='".mysql_real_escape_string($a)."'";
    $executequery=$conn->execute($query);
    if ($executequery->recordcount()>0)
        return true;
    else
		return false;
}

function update_last_viewed($a)
{
        global $conn;
		$query = "UPDATE posts SET last_viewed='".time()."' WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_your_viewed ($a)
{
        global $conn;
		$query = "UPDATE members SET yourviewed  = yourviewed  + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_post_viewed ($a)
{
        global $conn;
		$query = "UPDATE posts SET postviewed = postviewed + 1 WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_you_viewed($a)
{
        global $conn, $config;
		$view_points = $config['view_points'];
		if($view_points > 0)
		{
			$addme = ", points=points+$view_points";
		}
		$query = "UPDATE members SET youviewed = youviewed + 10 $addme WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}
//$l = $config['license'];

function session_verification()
{
    if ($_SESSION[USERID] != "")
	{
		if (is_numeric($_SESSION[USERID]))
		{
        	return true;
		}
    }
	else
		return false;
}

function insert_get_static($var)
{
        global $conn;
        $query="SELECT $var[sel] FROM static WHERE ID='".mysql_real_escape_string($var[ID])."'";
        $executequery=$conn->execute($query);
        $returnme = $executequery->fields[$var[sel]];
		$returnme = strip_mq_gpc($returnme);
		echo "$returnme";
}

function script_status($var1,$var2)
{
$t = $var1;
$e0 = md5($t."qwerty");
$e1 = substr($e0, -32, 8);
$r1 = substr($e1, -3);
$e2 = md5($e1."qwerty");
$r2 = substr($e2, -32, 8);
$e3 = md5($e2."qwerty");
$r3 = substr($e3, -32, 8);
$e4 = md5($e3."qwerty");
$r4 = substr($e4, -32, 8);
$l1 = $r1."-".$r2."-".$r3."-".$r4;
$youtube_url = $var2;
$position       = 5;
$remove_length  = strlen($youtube_url)-$position;
$video_id       = substr($youtube_url, -$remove_length, 35);
/*if ($l1 != $video_id)
{
halt();
}*/
}

script_status($u,$l);

function verify_login_admin()
{
        global $config,$conn;
        if($_SESSION['ADMINID'] != "" && is_numeric($_SESSION['ADMINID']) && $_SESSION['ADMINUSERNAME'] != "" && $_SESSION['ADMINPASSWORD'] != "")
        {
			$query="SELECT * FROM administrators WHERE username='".mysql_real_escape_string($_SESSION['ADMINUSERNAME'])."' AND password='".mysql_real_escape_string($_SESSION['ADMINPASSWORD'])."' AND ADMINID='".mysql_real_escape_string($_SESSION['ADMINID'])."'";
        	$executequery=$conn->execute($query);
			
			if(mysql_affected_rows()==1)
			{
			
			}
			else
			{
				header("location:$config[adminurl]/index.php");
            	exit;
			}
			
        }
		else
		{
			header("location:$config[adminurl]/index.php");
            exit;
		}
$t = $config['baseurl'];
$e0 = md5($t."qwerty");
$e1 = substr($e0, -32, 8);
$r1 = substr($e1, -3);
$e2 = md5($e1."qwerty");
$r2 = substr($e2, -32, 8);
$e3 = md5($e2."qwerty");
$r3 = substr($e3, -32, 8);
$e4 = md5($e3."qwerty");
$r4 = substr($e4, -32, 8);
$l1 = $r1."-".$r2."-".$r3."-".$r4;
//$youtube_url = $config['license'];
$position       = 5;
$remove_length  = strlen($youtube_url)-$position;
$video_id       = substr($youtube_url, -$remove_length, 35);
//if ($l1 != $video_id)
//{
//header("Location:http://tinyurl.com/lr4ovnu");exit;
//}
}

function insert_return_youtube($a)
{
    $embedcode = '<iframe width="640" height="360" src="//www.youtube.com/embed/AWECDE?showinfo=0&modestbranding=1&nologo=1&rel=0" frameborder="0" allowfullscreen="1"></iframe>';
	$item = $a[youtube];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}

function insert_get_time_to_days_ago($a)
{
	global $lang;
	$currenttime = time();
	$timediff = $currenttime - $a[time];
	$oneday = 60 * 60 * 24;
	$dayspassed = floor($timediff/$oneday);
	if ($dayspassed == "0")
	{
		$mins = floor($timediff/60);
		if($mins == "0")
		{
			$secs = floor($timediff);
			if($secs == "1")
			{
				return $lang['157'];
			}
			else
			{
				return $secs." ".$lang['158'];
			}
		}
		elseif($mins == "1")
		{
			return $lang['159'];
		}
		elseif($mins < "60")
		{
			return $mins." ".$lang['160'];
		}
		elseif($mins == "60")
		{
			return $lang['161'];
		}
		else
		{
			$hours = floor($mins/60);
			return "$hours ".$lang['162'];
		}
	}
	else
	{
		if($dayspassed == "1")
		{
			return $dayspassed." ".$lang['163'];
		}
		else
		{
			return $dayspassed." ".$lang['164'];
		}
	}
}

function imagick_gif_resize($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $temppic)
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = '';

	$final_width = 0;
	$final_height = 0;
	list($width_old, $height_old) = $info;

	if($proportional) 
	{
	  if ($width == 0) $factor = $height/$height_old;
	  elseif ($height == 0) $factor = $width/$width_old;
	  else $factor = min ( $width / $width_old, $height / $height_old);   
	  
	  $final_width = round ($width_old * $factor);
	  $final_height = round ($height_old * $factor);
		  
	  if($final_width > $width_old && $final_height > $height_old)
	  {
	  	  $final_width = $width_old;
		  $final_height = $height_old;

	  }
	}
	else 
	{
	  $final_width = ( $width <= 0 ) ? $width_old : $width;
	  $final_height = ( $height <= 0 ) ? $height_old : $height;
	}
	
	$owh = $width_old."x".$height_old;
	$nwh = $final_width."x".$final_height;
	if(!file_exists($temppic))
	{
		$runinbg = "convert ".$file." -coalesce ".$temppic;
		$runconvert = exec("$runinbg");
	}
	$runinbg = "convert -size ".$owh." ".$temppic." -resize ".$nwh." ".$output;
	$runconvert = exec("$runinbg");
	return true;
}

function halt()
{
//header("Location:http://tinyurl.com/lr4ovnu");exit;
}

function makeseo($str,$separator = 'dash',$lowercase = TRUE)
{
//decode html entities
$str = html_entity_decode($str,ENT_QUOTES,'UTF-8');

//make lowercase
$str = mb_strtolower($str, 'UTF-8');

//replace special chars, for UTF8 encoding it needs to be defined as array
$trans = array(
'o'=>'o',
'O'=>'o',
'�'=>'o',
'�'=>'o',
'�'=>'o',
'�'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'�'=>'o',
'�'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'�'=>'o',
'�'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'?'=>'o',
'�'=>'u',
'�'=>'u',
'�'=>'u',
'�'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'u'=>'u',
'U'=>'u',
'u'=>'u',
'U'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'u~'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'?'=>'u',
'�'=>'a',
'�'=>'a',
'�'=>'a',
'�'=>'a',
'�'=>'a',
'�'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'�'=>'a',
'�'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'a?'=>'a',
'o`'=>'o',
'?'=>'a',
'?'=>'�',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'a'=>'a',
'A'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'a',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'�'=>'e',
'�'=>'e',
'�'=>'e',
'�'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'?'=>'e',
'�'=>'e',
'�'=>'e',
'�'=>'i',
'�'=>'i',
'�'=>'i',
'�'=>'i',
'?'=>'i',
'?'=>'i',
'i'=>'i',
'I'=>'i',
'?'=>'i',
'?'=>'i',
'�'=>'y',
'�'=>'y',
'?'=>'y',
'?'=>'y',
'?'=>'y',
'?'=>'y',
'?'=>'y',
'?'=>'y',
'?'=>'y',
'?'=>'y',
'd'=>'d',
'�'=>'d',
'['=>'',
']'=>'',
';'=>'',
'^'=>'',
'@'=>'',
'$'=>'',
'>'=>'',
'<'=>'',
'~'=>'',
'{'=>'',
'}'=>'',
'�'=>'',
'�'=>'',
'�'=>'',
'?'=>'a',
'"'=>'',
'�`'=>'o',
'�'=>'a',
'o�'=>'o',
'y�'=>'y',
'?'=>'a',
'a?'=>'a',
'�'=>'e',
'i`'=>'i',
'a?'=>'a',
'*'=>' ',
'o�'=>'o',
'�?'=>'e',
'´'=>'a',
'�?'=>'a',
'�?'=>'o',
'a`'=>'a',
'o?'=>'o',
'�?'=>'e',
'`'=>'',
'&gt;'=>'',
'&lt;'=>'',
'&quot;'=>'',
'&amp;'=>'',
'%'=>'',
'a�'=>'a',
'�`'=>'a',
'|'=>'',
'�'=>'',
'�'=>'',
'�'=>'',
'='=>'',
'a?'=>'a',
'o`'=>'o',
'��'=>'o',
'a�'=>'a',
'y`'=>'y',
'e�'=>'e',
'e?'=>'e',
'u�'=>'u'
);
$str = strtr($str, $trans);

        if ($separator == 'dash')
        {

            $search     = '_';
            $replace    = '-';

        }else
        {

            $search     = '-';
            $replace    = '_';

        }

        $trans = array(
                        '&\#\d+?;'              => '',
                        '&\S+?;'                => '',
                        '\s+'                   => $replace,
                        $replace.'+'            => $replace,
                        $replace.'$'            => $replace,
                        '^'.$replace            => $replace,
                        '\.+$'                  => ''
                        );

        $str = strip_tags($str);
        $str = preg_replace("#\/#ui",'-',$str);

        foreach ($trans AS $key => $val)
        {

            $str = preg_replace("#".$key."#ui", $val, $str);

        }

        if($lowercase === TRUE)
        {

            $str = mb_strtolower($str,'UTF-8');

        }

        return trim(stripslashes($str));
}

function loadallchannels()
{
    global $conn;
	$query5 = "SELECT * FROM channels";
	$executequery5 = $conn->Execute($query5);	
	$cats = $executequery5->getarray();
	return $cats;
}

function loadtopchannels($cats)
{
    global $conn;
	$ccount = count($cats);
	$ctotal = array();
	$chname = array();
	for ($i = 0; $i < $ccount; $i++) {
		$j = $cats[$i]['CID'];
		$query3 = "SELECT count(*) as total from posts A, channels B where B.CID=$j AND A.CID=B.CID";
		$executequery3 = $conn->Execute($query3);
		if ($executequery3->fields['total'] >= 0) {
			array_push($ctotal, $executequery3->fields['total']);
			$query4 = "SELECT cname from channels where CID=$j";
			$executequery4 = $conn->Execute($query4);
			array_push($chname, $executequery4->fields['cname']);
		}
	}
	array_multisort($ctotal,SORT_DESC, $chname);
	$ctotalcount = count($ctotal);
	for ($i = 0; $i < $ccount; $i++) {
		$c[$i]["ctotal"] = $ctotal[$i];
		$c[$i]["chname"] = $chname[$i];
	}
	return $c;
}

function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}
function create_text_watermark($img,$pid,$thepp,$thepp2,$type)
{
    global $config;
    // The path to the font
    $wmfont = $config['basedir']."/include/fonts/".$config['wmfont'];
    // The font size
    $fsize = $config['fsize'];
    // The watermark hieght in pixels
    $wmhieght = $config['wmhieght'];
    if($type == 1){$add2dir = "/t/l-";}
    else{$add2dir = "/t/";}
    $watermark = $config['imagedir']."/watermark.jpg";
    $img_width=imagesx($img);
    $img_height=imagesy($img);
    $watermark=imagecreatefromjpeg($watermark);
    $watermark_width=imagesx($watermark);
    $watermark_height=imagesy($watermark);
    $image=imagecreatetruecolor($watermark_width, $watermark_height);
    imagealphablending($image, false);
    // Create the canvas
    $canvas = imagecreate( $img_width, $wmhieght );
    // Define the colours to use
    $black = imagecolorallocate( $canvas, $config['blackr'], $config['blackb'], $config['blackg'] );
    $white = imagecolorallocate( $canvas, $config['whiter'], $config['whiteb'], $config['whiteg'] );
    // Create a rectangle and fill it white
    imagefilledrectangle( $canvas, 0, 0, $img_width, $wmhieght, $white );
    // The text to use
    //$wmtext = $config['domain'].$config['postfolder'].$pid."/";
    //magicvn just domain
    $wmtext = $config['domain'];
    // Set the path to the image to watermark
    $input_image = $config['pdir'].$add2dir.$thepp;
    // Calculate the size of the text
    // If php has been setup without ttf support this will not work.
    $box = imagettfbbox( $fsize, 0, $wmfont, $wmtext );
    $x = 10;
    $y = ($wmhieght - ($box[1] - $box[7])) / 2;
    $y -= $box[7];
    // Add the text to the image
    imageTTFText( $canvas, $fsize, 0, $x, $y, $black, $wmfont, $wmtext );
    // Adding the logo watermark
    if($config['lwm'] == "1"){
        $dest_x2=$img_width-$watermark_width-5;
        $dest_y2=$wmhieght-$watermark_height-5;
        imagecopy($canvas, $watermark, $dest_x2, $dest_y2, 0, 0, $watermark_width, $watermark_height);
    }
    // Make white transparent
    //imagecolortransparent ( $canvas, $white );
    // Save the text image as temp.png
    imagepng( $canvas, $config['basedir']."/temporary/".$pid."_wm_temp.png" );
    // Cleanup the tempory image canvas.png
    ImageDestroy( $canvas );

    // Create the canvas2
    $canvas2 = imagecreatetruecolor( $img_width, $img_height + $wmhieght );
    // Define the colours to use
    $black = imagecolorallocate( $canvas2, $blackr, $blackb, $blackg );
    $white = imagecolorallocate( $canvas2, $whiter, $whiteb, $whiteg );
    // Create a rectangle and fill it white
    imagefilledrectangle( $canvas2, 0, 0, $img_width, $img_height + $wmhieght, $white );
    $dest_x3=0;
    $dest_y3=0;
    if($thepp2 == ".png"){$input_image=imagecreatefrompng( $input_image );}
    else{$input_image=imagecreatefromjpeg( $input_image );}
    imagealphablending($canvas2, false);
    imagecopy($canvas2, $input_image, $dest_x3, $dest_y3, 0, 0, $img_width, $img_height);
    imagepng( $canvas2, $config['basedir']."/temporary/".$pid."_temp.png" );
    ImageDestroy( $canvas2 );
    $input_image2 = $config['basedir']."/temporary/".$pid."_temp.png";

    // Read in the text watermark image
    $watermark2 = imagecreatefrompng( $config['basedir']."/temporary/".$pid."_wm_temp.png" );
    // Returns the width of the given image resource
    $watermark_width2 = imagesx( $watermark2 );
    //Returns the height of the given image resource
    $watermark_height2 = imagesy( $watermark2 );
    $image2 = imagecreatetruecolor( $watermark_width2, $watermark_height2 );
    $image2 = imagecreatefrompng( $input_image2 );
    // Find the size of the original image and read it into an array
    $size = getimagesize( $input_image2 );
    // Set the positions of the watermark on the image
    $dest_x = $img_width-150;
    $dest_y = $img_height;
    //imagecopymerge($image2, $watermark2, $dest_x, $dest_y, 0, 0, $watermark_width2, $watermark_height2, 100);
    imagecopymerge($image2, $watermark2, $dest_x, $dest_y-$watermark_height2, 0, 0, $watermark_width2, $watermark_height2, 100);
    // Save the watermarked image as watermarked.jpg
    imagejpeg( $image2, $config['pdir'].$add2dir.$thepp );
    // Clear the memory of the tempory image
    imagedestroy( $image2 );
    imagedestroy( $watermark2 );
    // Delete the text watermark image
    unlink( $config['basedir']."/temporary/".$pid."_wm_temp.png");
    unlink( $config['basedir']."/temporary/".$pid."_temp.png");
}
function create_logo_watermark($img,$thepp,$type,$watermarkPos=1)
{
    global $config;
    if($type == 1){$add2dir = "/t/l-";}
    else{$add2dir = "/t/";}
    $watermark = $config['imagedir']."/watermark.png";
    $img_width=imagesx($img);
    $img_height=imagesy($img);
    $watermark=imagecreatefrompng($watermark);
    $watermark_width=imagesx($watermark);
    $watermark_height=imagesy($watermark);
    $image=imagecreatetruecolor($watermark_width, $watermark_height);
    imagealphablending($image, false);

    if ($watermarkPos == 1){
        //Pos=5 - Top Left
        $dest_x=5;
        $dest_y=5;
    }elseif($watermarkPos == 2){
        //Pos - Top Right
        $dest_x=$img_width-$watermark_width-5;
        $dest_y=5;
    }elseif($watermarkPos == 3){
        //Pos - Center
        $dest_x=$img_width/2-$watermark_width/2;
        $dest_y=$img_height/2-$watermark_height/2;
    }elseif($watermarkPos == 4){
        //Pos - Bottom Left
        $dest_x=5;
        $dest_y=$img_height-$watermark_height-5;
    }else{
        //Pos=5 - Bottom Right
        $dest_x=$img_width-$watermark_width-5;
        $dest_y=$img_height-$watermark_height-5;
    }


    imagecopy($img, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
    imagesavealpha($img, true);
    imagejpeg($img, $config['pdir'].$add2dir.$thepp, 90);
}

?>