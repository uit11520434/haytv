<?php
sss

function insert_get_posts_counts($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts WHERE USERID='".mysql_real_escape_string($var[USERID])."' AND active='1'";
	$executequery=$conn->CacheExecute(20,$query);
	$total = $executequery->fields[total];
	return intval($total);
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
		$executequery = $conn->CacheExecute(20,$query);
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
		$results = $conn->CacheExecute(20,$query);
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
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM members_passcode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM members_verifycode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM posts_favorited WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM posts_unfavorited WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->CacheExecute(20,$query);
	}
}

function delete_post($PID)
{
    global $config,$conn;
	if($PID > 0)
	{
		$query = "select folder,pic from posts where PID='".mysql_real_escape_string($PID)."' limit 1"; 
		$executequery = $conn->CacheExecute(20,$query);
		$thepp = $executequery->fields['pic'];
		$folder = $executequery->fields['folder'];
		if($thepp != "")
		{
			$p1 = $config['pdir']."/t/".$folder."l-".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/t/".$folder."".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
			$p1 = $config['pdir']."/t/".$folder."s-".$thepp;
			if(file_exists($p1))
			{
				@unlink($p1);
			}
		}
		$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM posts_favorited WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM posts_reports WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->CacheExecute(20,$query);
		$query = "DELETE FROM posts_unfavorited WHERE PID='".mysql_real_escape_string($PID)."'";
		$conn->CacheExecute(20,$query);
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

function do_resize_thumb($file, $width = 0, $height = 0, $proportional = false, $output = 'file')
{
	$info = getimagesize($file);
	$image = '';
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
	list($width_old, $height_old) = $info;
	if ($width_old >= $height_old) 
		$rz = $height_old;
	else
		$rz = $width_old;
	
	$image_resized = imagecreatetruecolor(  $width , $height );
	imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $width, $height, $rz, $rz);
	imagejpeg($image_resized, $output, 100);
}

function do_resize_image2($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $temppic)
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

function cleanit($text)
{
	//return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
	$text = str_replace('"','&quot;',$text);
	return strip_tags(stripslashes($text));
}

function insert_get_seo_profile($a)
{
        $uname = $a['username'];
		echo $uname;
}

function get_seo_profile($uname)
{
		return $uname;
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
        $executequery=$conn->CacheExecute(20,$query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function insert_get_advrd($var)
{
        global $conn;
			
		$rand_keys = array_rand($var[AIDS], 1);
				
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AIDS][$rand_keys[0]])."' AND active='1' limit 1";
        $executequery=$conn->CacheExecute(20,$query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function verify_login_admin()
{
        //global $config,$conn;
       /* if($_SESSION['ADMINID'] != "" && is_numeric($_SESSION['ADMINID']) && $_SESSION['ADMINUSERNAME'] != "" && $_SESSION['ADMINPASSWORD'] != "")
        {
			$query="SELECT * FROM administrators WHERE username='".mysql_real_escape_string($_SESSION['ADMINUSERNAME'])."' AND password='".mysql_real_escape_string($_SESSION['ADMINPASSWORD'])."' AND ADMINID='".mysql_real_escape_string($_SESSION['ADMINID'])."'";
        	$executequery=$conn->CacheExecute(20,$query);
			
			if(mysql_affected_rows()==1)
			{
			
			}
			else
			{
				header("location:$config[adminurl]/index.php");
            	exit;
			}
			
        }*/
		if($_SESSION['ADMINLOGIN'] != 1){
					
			header("location:$config[adminurl]/index.php");
            exit;
		}
}

function verify_email_username($usernametocheck)
{
    global $config,$conn;
	$query = "select count(*) as total from members where username='".mysql_real_escape_string($usernametocheck)."' limit 1"; 
	$executequery = $conn->CacheExecute(20,$query);
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

function verify_email_unique($emailtocheck)
{
    global $config,$conn;
	$query = "select count(*) as total from members where email='".mysql_real_escape_string($emailtocheck)."' limit 1"; 
	$executequery = $conn->CacheExecute(20,$query);
	$totalemails = $executequery->fields[total];
	if ($totalemails >= 1)
	{
		return false;
	}
	else
	{
		return true;
	}
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

function insert_get_stripped_phrase($a)
{
	$stripper = $a[details]; 
	$stripper = str_replace("\\n", "<br>", $stripper);
	$stripper = str_replace("\\r", "", $stripper);
	$stripper = str_replace("\\", "", $stripper);
	return $stripper;
}

function insert_get_stripped_phrase2($a)
{
	$stripper = $a[details]; 
	$stripper = str_replace("\\n", "\n", $stripper);
	$stripper = str_replace("\\r", "\r", $stripper);
	return $stripper;
}

function listdays($selected)
{
	$days = "";
    for($i=1;$i<=31;$i++)
    {
    	if($i == $selected)
		{
        	$days .= "<option value=\"$i\" selected>$i</option>";
        }
        else
		{
        	$days .= "<option value=\"$i\">$i</option>";
        }
    }
    return $days;
}

function listmonths($selected)
{
    $months = "";
    $allmonths = array("","January","February","March","April","May","June","July","August","September","October","November","December");
    for($i=1;$i<=12;$i++)
    {
        if($i == $selected)
		{
        	$months .= "<option value=\"$i\" selected>$allmonths[$i]</option>";
        }
        else
		{
        	$months .= "<option value=\"$i\">$allmonths[$i]</option>";
        }
    }
    return $months;
}

function listyears($selected)
{
        $years = "";
        $thisyear = date("Y");
        for($i=$thisyear-100+13;$i<=$thisyear-13;$i++)
        {
                if($i == $selected)
                        $years .= "<option value=\"$i\" selected>$i</option>";
                else
                        $years .= "<option value=\"$i\">$i</option>";
        }
        return $years;
}

function listcountries($selected)
{
    $country="";
    $countries = array("Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antartica","Antigua and Barbuda","Argentina","Armenia","Aruba","Ascension Island","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Botswana","Bouvet Island","Brazil","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde Islands","Cayman Islands","Chad","Chile","China","Christmas Island","Colombia","Comoros","Cook Islands","Costa Rica","Cote d Ivoire","Croatia/Hrvatska","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guernsey","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Ireland","Isle of Man","Israel","Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte Island", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Island", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion Island", "Romania", "Russian Federation", "Rwanda", "Saint Helena", "Saint Lucia", "San Marino", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovak Republic", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "Spain", "Sri Lanka", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga Islands", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Western Sahara", "Western Samoa", "Yemen", "Yugoslavia", "Zambia","Zimbabwe");
    for($i=0;$i<count($countries);$i++)
    {
    	if($selected == $countries[$i])
        {
			$country .="<option value=\"$countries[$i]\" selected>$countries[$i]</option>";
		}
        else
		{
			$country .="<option value=\"$countries[$i]\">$countries[$i]</option>";
		}
	}
    return $country;
}

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
	$executequery=$conn->CacheExecute(20,$query);
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
			$r = "Độc thân";
			break;
		case 1:
			$r = "Đang hẹn hò";
			break;
		case 2:
			$r = "Đã đính hôn";
			break;
		case 4:
			$r = "Đã kết hôn";
			break;
		case 4:
			$r = "Rất phức tạp";
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
	$executequery=$conn->CacheExecute(20,$query);
	$total = $executequery->fields[total];
	return intval($total);
}

function does_post_exist($a)
{
	global $conn, $config;
    $query="SELECT USERID FROM posts WHERE PID='".mysql_real_escape_string($a)."'";
    $executequery=$conn->CacheExecute(20,$query);
    if ($executequery->recordcount()>0)
        return true;
    else
		return false;
}

function update_last_viewed($a)
{
        global $conn;
		$query = "UPDATE posts SET last_viewed='".time()."' WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->CacheExecute(20,$query);
}

function update_your_viewed ($a)
{
        global $conn;
		$query = "UPDATE members SET yourviewed  = yourviewed  + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->CacheExecute(20,$query);
}

function update_you_viewed($a)
{
        global $conn, $config;
		$points_view = $config['points_view'];
		if($points_view > 0)
		{
			$addme = ", points=points+$points_view";
		}
		$query = "UPDATE members SET youviewed = youviewed + 1 $addme WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->CacheExecute(20,$query);
}

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
function insert_get_username_from_userid($var)
{
        global $conn;
        $query="SELECT username FROM members WHERE USERID='".mysql_real_escape_string($var[USERID])."'";
        $executequery=$conn->CacheExecute(20,$query);
        $getusername = $executequery->fields[username];
		return "$getusername";
}

function does_profile_exist($a)
{
	global $conn;
    global $config;
    $query="SELECT username FROM members WHERE USERID='".mysql_real_escape_string($a)."'";
    $executequery=$conn->CacheExecute(20,$query);
    if ($executequery->recordcount()>0)
        return true;
    else
		return false;
}

function update_viewcount_profile($a)
{
        global $conn;
		$query = "UPDATE members SET profileviews = profileviews + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->CacheExecute(20,$query);
}

function insert_get_posts_count($var)
{
        global $conn;
        $query="SELECT count(*) as total FROM posts WHERE USERID='".mysql_real_escape_string($var[USERID])."'";
        $executequery=$conn->CacheExecute(20,$query);
        $results = $executequery->fields[total];
		echo "$results";
}

function insert_get_static($var)
{
        global $conn;
        $query="SELECT $var[sel] FROM static WHERE ID='".mysql_real_escape_string($var[ID])."'";
        $executequery=$conn->CacheExecute(20,$query);
        $returnme = $executequery->fields[$var[sel]];
		$returnme = strip_mq_gpc($returnme);
		echo "$returnme";
}

function insert_strip_special($a)
{
	$text = $a['text'];
	$text = str_replace(",", " ", $text);
	$text = str_replace(".", " ", $text);
	$text=nl2br($text);
	$text = str_replace("\n", " ", $text);
	$text = str_replace("\r", " ", $text);
	$text = str_replace("<br />", " ", $text);
	$text = str_replace("  ", " ", $text);
	$clean = preg_replace("/^[^a-z0-9]?(.*?)[^a-z0-9]?$/i", "$1", $text);
	return $clean;
}

function insert_strip_special2($a)
{
	$text = $a['text'];
	$text = str_replace(",", " ", $text);
	$text = str_replace(".", " ", $text);
	$text=nl2br($text);
	$text = str_replace("\n", " ", $text);
	$text = str_replace("\r", " ", $text);
	$text = str_replace("<br />", " ", $text);
	$text = str_replace("  ", " ", $text);
	$clean = preg_replace("/^[^a-z0-9]?(.*?)[^a-z0-9]?$/i", "$1", $text);
	$clean = stripslashes($clean);
	return $clean;
}

function insert_clickable_link($var)
{
	global $config;
	$text = $var['text'];
	$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
	$ret = ' ' . $text;
	$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
	$ret = substr($ret, 1);
	if($config['short_urls'] == "1")
	{
		preg_match_all("/<a href=\"(.+?)\"/", $ret, $match);
		$result1 = array_unique($match);
		$count = count($result1[0]);
		if($count > 0)
		{
			foreach ($result1 as $val)
			{
				foreach ($val as $item) 
				{
					$item = str_replace('<a href="', '', $item);
					$item = str_replace('"', '', $item);
					$new_item = get_shortexturl($item);
					if($new_item != "")
					{
						$ret = str_replace("<a href=\"$item", "<a href=\"$new_item", $ret);
					}
				}
			}
		}
	}
	return $ret;
}

function get_shortexturl($gagurl)
{
    global $conn, $config;
	if($gagurl != "")
	{
		$takenurl =  file_get_contents("http://www.taken.to/gag.php?url=".$gagurl);
		if($takenurl != "")
		{
			$sshort = str_replace("http://www.taken.to/", "", $takenurl);
			if($sshort != "")
			{
				$rme = 	"http://www.taken.to/".$sshort;
			}
			else
			{
				$rme = 	$gagurl;	
			}
		}
		else
		{
			$rme = 	$gagurl;
		}
		
	}
	else
	{
		$rme = 	"";
	}
	return $rme;
}

function firstDayOfMonth2($uts=null)
{
    $today = is_null($uts) ? getDate() : getDate($uts);
    $first_day = getdate(mktime(0,0,0,$today['mon'],1,$today['year']));
    return $first_day[0];
} 

function firstDayOfYear2($uts=null)
{
    $today = is_null($uts) ? getDate() : getDate($uts);
    $first_day = getdate(mktime(0,0,0,1,1,$today['year']));
    return $first_day[0];
}

function insert_get_short_url($a)
{
    global $conn, $config;
	$SPID = intval($a['PID']);
	$sshort = stripslashes($a['short']);
	$gagurl = $config['baseurl']."/gag/".$SPID;
	if($SPID > 0)
	{
		if($sshort == "")
		{
			$takenurl =  file_get_contents("http://www.taken.to/gag.php?url=".$gagurl);
			if($takenurl != "")
			{
				$sshort = str_replace("http://www.taken.to/", "", $takenurl);
				if($sshort != "")
				{
					$query = "UPDATE posts SET short='".mysql_real_escape_string($sshort)."' WHERE PID='".mysql_real_escape_string($SPID)."'";
					$conn->CacheExecute(20,$query);
					$rme = 	"http://www.taken.to/".$sshort;
				}
				else
				{
					$rme = 	$gagurl;	
				}
			}
			else
			{
				$rme = 	$gagurl;
			}
			
		}
		else
		{
			$rme = 	"http://www.taken.to/".$sshort;
		}
	}
	else
	{
		$rme = 	$gagurl;
	}
	return $rme;
}

function insert_return_youtube($a)
{
    $embedcode = '<object width="540" height="445"><param name="movie" value="http://www.youtube.com/v/AWECDE&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/AWECDE&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="540" height="445"></embed></object>';
	$item = $a[youtube];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}




function insert_return_fod($a)
{
    $embedcode = '<iframe src="http://www.funnyordie.com/embed/AWECDE" width="640" height="400" frameborder="0"></iframe>';
	$item = $a[fod];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}

function insert_return_youtube2($a)
{
    $embedcode = '<object width="450" height="380"><param name="movie" value="http://www.youtube.com/v/AWECDE&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/AWECDE&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="450" height="380"></embed></object>';
	$item = $a[youtube];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}

function insert_return_fod2($a)
{
    $embedcode = '<iframe src="http://www.funnyordie.com/embed/AWECDE" width="450" height="380" frameborder="0"></iframe>';
	$item = $a[fod];
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
		if($dayspassed <= 7)
		{
			return $dayspassed." ".$lang['164'];
		}
		else
		{			
			$date = date_create();
			date_timestamp_set($date, $a[time]);
			return 'ngày '.date_format($date, 'd/m/Y');
		}
	}
}

function insert_country_code_to_country($a)
{
	$code = $a['code'];
    $country = '';
    if( $code == 'AF' ) $country = 'Afghanistan';
    if( $code == 'AX' ) $country = 'Aland Islands';
    if( $code == 'AL' ) $country = 'Albania';
    if( $code == 'DZ' ) $country = 'Algeria';
    if( $code == 'AS' ) $country = 'American Samoa';
    if( $code == 'AD' ) $country = 'Andorra';
    if( $code == 'AO' ) $country = 'Angola';
    if( $code == 'AI' ) $country = 'Anguilla';
    if( $code == 'AQ' ) $country = 'Antarctica';
    if( $code == 'AG' ) $country = 'Antigua and Barbuda';
    if( $code == 'AR' ) $country = 'Argentina';
    if( $code == 'AM' ) $country = 'Armenia';
    if( $code == 'AW' ) $country = 'Aruba';
    if( $code == 'AU' ) $country = 'Australia';
    if( $code == 'AT' ) $country = 'Austria';
    if( $code == 'AZ' ) $country = 'Azerbaijan';
    if( $code == 'BS' ) $country = 'Bahamas the';
    if( $code == 'BH' ) $country = 'Bahrain';
    if( $code == 'BD' ) $country = 'Bangladesh';
    if( $code == 'BB' ) $country = 'Barbados';
    if( $code == 'BY' ) $country = 'Belarus';
    if( $code == 'BE' ) $country = 'Belgium';
    if( $code == 'BZ' ) $country = 'Belize';
    if( $code == 'BJ' ) $country = 'Benin';
    if( $code == 'BM' ) $country = 'Bermuda';
    if( $code == 'BT' ) $country = 'Bhutan';
    if( $code == 'BO' ) $country = 'Bolivia';
    if( $code == 'BA' ) $country = 'Bosnia and Herzegovina';
    if( $code == 'BW' ) $country = 'Botswana';
    if( $code == 'BV' ) $country = 'Bouvet Island (Bouvetoya)';
    if( $code == 'BR' ) $country = 'Brazil';
    if( $code == 'IO' ) $country = 'British Indian Ocean Territory (Chagos Archipelago)';
    if( $code == 'VG' ) $country = 'British Virgin Islands';
    if( $code == 'BN' ) $country = 'Brunei Darussalam';
    if( $code == 'BG' ) $country = 'Bulgaria';
    if( $code == 'BF' ) $country = 'Burkina Faso';
    if( $code == 'BI' ) $country = 'Burundi';
    if( $code == 'KH' ) $country = 'Cambodia';
    if( $code == 'CM' ) $country = 'Cameroon';
    if( $code == 'CA' ) $country = 'Canada';
    if( $code == 'CV' ) $country = 'Cape Verde';
    if( $code == 'KY' ) $country = 'Cayman Islands';
    if( $code == 'CF' ) $country = 'Central African Republic';
    if( $code == 'TD' ) $country = 'Chad';
    if( $code == 'CL' ) $country = 'Chile';
    if( $code == 'CN' ) $country = 'China';
    if( $code == 'CX' ) $country = 'Christmas Island';
    if( $code == 'CC' ) $country = 'Cocos (Keeling) Islands';
    if( $code == 'CO' ) $country = 'Colombia';
    if( $code == 'KM' ) $country = 'Comoros the';
    if( $code == 'CD' ) $country = 'Congo';
    if( $code == 'CG' ) $country = 'Congo the';
    if( $code == 'CK' ) $country = 'Cook Islands';
    if( $code == 'CR' ) $country = 'Costa Rica';
    if( $code == 'CI' ) $country = 'Cote d\'Ivoire';
    if( $code == 'HR' ) $country = 'Croatia';
    if( $code == 'CU' ) $country = 'Cuba';
    if( $code == 'CY' ) $country = 'Cyprus';
    if( $code == 'CZ' ) $country = 'Czech Republic';
    if( $code == 'DK' ) $country = 'Denmark';
    if( $code == 'DJ' ) $country = 'Djibouti';
    if( $code == 'DM' ) $country = 'Dominica';
    if( $code == 'DO' ) $country = 'Dominican Republic';
    if( $code == 'EC' ) $country = 'Ecuador';
    if( $code == 'EG' ) $country = 'Egypt';
    if( $code == 'SV' ) $country = 'El Salvador';
    if( $code == 'GQ' ) $country = 'Equatorial Guinea';
    if( $code == 'ER' ) $country = 'Eritrea';
    if( $code == 'EE' ) $country = 'Estonia';
    if( $code == 'ET' ) $country = 'Ethiopia';
    if( $code == 'FO' ) $country = 'Faroe Islands';
    if( $code == 'FK' ) $country = 'Falkland Islands (Malvinas)';
    if( $code == 'FJ' ) $country = 'Fiji the Fiji Islands';
    if( $code == 'FI' ) $country = 'Finland';
    if( $code == 'FR' ) $country = 'France, French Republic';
    if( $code == 'GF' ) $country = 'French Guiana';
    if( $code == 'PF' ) $country = 'French Polynesia';
    if( $code == 'TF' ) $country = 'French Southern Territories';
    if( $code == 'GA' ) $country = 'Gabon';
    if( $code == 'GM' ) $country = 'Gambia the';
    if( $code == 'GE' ) $country = 'Georgia';
    if( $code == 'DE' ) $country = 'Germany';
    if( $code == 'GH' ) $country = 'Ghana';
    if( $code == 'GI' ) $country = 'Gibraltar';
    if( $code == 'GR' ) $country = 'Greece';
    if( $code == 'GL' ) $country = 'Greenland';
    if( $code == 'GD' ) $country = 'Grenada';
    if( $code == 'GP' ) $country = 'Guadeloupe';
    if( $code == 'GU' ) $country = 'Guam';
    if( $code == 'GT' ) $country = 'Guatemala';
    if( $code == 'GG' ) $country = 'Guernsey';
    if( $code == 'GN' ) $country = 'Guinea';
    if( $code == 'GW' ) $country = 'Guinea-Bissau';
    if( $code == 'GY' ) $country = 'Guyana';
    if( $code == 'HT' ) $country = 'Haiti';
    if( $code == 'HM' ) $country = 'Heard Island and McDonald Islands';
    if( $code == 'VA' ) $country = 'Holy See (Vatican City State)';
    if( $code == 'HN' ) $country = 'Honduras';
    if( $code == 'HK' ) $country = 'Hong Kong';
    if( $code == 'HU' ) $country = 'Hungary';
    if( $code == 'IS' ) $country = 'Iceland';
    if( $code == 'IN' ) $country = 'India';
    if( $code == 'ID' ) $country = 'Indonesia';
    if( $code == 'IR' ) $country = 'Iran';
    if( $code == 'IQ' ) $country = 'Iraq';
    if( $code == 'IE' ) $country = 'Ireland';
    if( $code == 'IM' ) $country = 'Isle of Man';
    if( $code == 'IL' ) $country = 'Israel';
    if( $code == 'IT' ) $country = 'Italy';
    if( $code == 'JM' ) $country = 'Jamaica';
    if( $code == 'JP' ) $country = 'Japan';
    if( $code == 'JE' ) $country = 'Jersey';
    if( $code == 'JO' ) $country = 'Jordan';
    if( $code == 'KZ' ) $country = 'Kazakhstan';
    if( $code == 'KE' ) $country = 'Kenya';
    if( $code == 'KI' ) $country = 'Kiribati';
    if( $code == 'KP' ) $country = 'Korea';
    if( $code == 'KR' ) $country = 'Korea';
    if( $code == 'KW' ) $country = 'Kuwait';
    if( $code == 'KG' ) $country = 'Kyrgyz Republic';
    if( $code == 'LA' ) $country = 'Lao';
    if( $code == 'LV' ) $country = 'Latvia';
    if( $code == 'LB' ) $country = 'Lebanon';
    if( $code == 'LS' ) $country = 'Lesotho';
    if( $code == 'LR' ) $country = 'Liberia';
    if( $code == 'LY' ) $country = 'Libyan Arab Jamahiriya';
    if( $code == 'LI' ) $country = 'Liechtenstein';
    if( $code == 'LT' ) $country = 'Lithuania';
    if( $code == 'LU' ) $country = 'Luxembourg';
    if( $code == 'MO' ) $country = 'Macao';
    if( $code == 'MK' ) $country = 'Macedonia';
    if( $code == 'MG' ) $country = 'Madagascar';
    if( $code == 'MW' ) $country = 'Malawi';
    if( $code == 'MY' ) $country = 'Malaysia';
    if( $code == 'MV' ) $country = 'Maldives';
    if( $code == 'ML' ) $country = 'Mali';
    if( $code == 'MT' ) $country = 'Malta';
    if( $code == 'MH' ) $country = 'Marshall Islands';
    if( $code == 'MQ' ) $country = 'Martinique';
    if( $code == 'MR' ) $country = 'Mauritania';
    if( $code == 'MU' ) $country = 'Mauritius';
    if( $code == 'YT' ) $country = 'Mayotte';
    if( $code == 'MX' ) $country = 'Mexico';
    if( $code == 'FM' ) $country = 'Micronesia';
    if( $code == 'MD' ) $country = 'Moldova';
    if( $code == 'MC' ) $country = 'Monaco';
    if( $code == 'MN' ) $country = 'Mongolia';
    if( $code == 'ME' ) $country = 'Montenegro';
    if( $code == 'MS' ) $country = 'Montserrat';
    if( $code == 'MA' ) $country = 'Morocco';
    if( $code == 'MZ' ) $country = 'Mozambique';
    if( $code == 'MM' ) $country = 'Myanmar';
    if( $code == 'NA' ) $country = 'Namibia';
    if( $code == 'NR' ) $country = 'Nauru';
    if( $code == 'NP' ) $country = 'Nepal';
    if( $code == 'AN' ) $country = 'Netherlands Antilles';
    if( $code == 'NL' ) $country = 'Netherlands the';
    if( $code == 'NC' ) $country = 'New Caledonia';
    if( $code == 'NZ' ) $country = 'New Zealand';
    if( $code == 'NI' ) $country = 'Nicaragua';
    if( $code == 'NE' ) $country = 'Niger';
    if( $code == 'NG' ) $country = 'Nigeria';
    if( $code == 'NU' ) $country = 'Niue';
    if( $code == 'NF' ) $country = 'Norfolk Island';
    if( $code == 'MP' ) $country = 'Northern Mariana Islands';
    if( $code == 'NO' ) $country = 'Norway';
    if( $code == 'OM' ) $country = 'Oman';
    if( $code == 'PK' ) $country = 'Pakistan';
    if( $code == 'PW' ) $country = 'Palau';
    if( $code == 'PS' ) $country = 'Palestinian Territory';
    if( $code == 'PA' ) $country = 'Panama';
    if( $code == 'PG' ) $country = 'Papua New Guinea';
    if( $code == 'PY' ) $country = 'Paraguay';
    if( $code == 'PE' ) $country = 'Peru';
    if( $code == 'PH' ) $country = 'Philippines';
    if( $code == 'PN' ) $country = 'Pitcairn Islands';
    if( $code == 'PL' ) $country = 'Poland';
    if( $code == 'PT' ) $country = 'Portugal, Portuguese Republic';
    if( $code == 'PR' ) $country = 'Puerto Rico';
    if( $code == 'QA' ) $country = 'Qatar';
    if( $code == 'RE' ) $country = 'Reunion';
    if( $code == 'RO' ) $country = 'Romania';
    if( $code == 'RU' ) $country = 'Russian Federation';
    if( $code == 'RW' ) $country = 'Rwanda';
    if( $code == 'BL' ) $country = 'Saint Barthelemy';
    if( $code == 'SH' ) $country = 'Saint Helena';
    if( $code == 'KN' ) $country = 'Saint Kitts and Nevis';
    if( $code == 'LC' ) $country = 'Saint Lucia';
    if( $code == 'MF' ) $country = 'Saint Martin';
    if( $code == 'PM' ) $country = 'Saint Pierre and Miquelon';
    if( $code == 'VC' ) $country = 'Saint Vincent and the Grenadines';
    if( $code == 'WS' ) $country = 'Samoa';
    if( $code == 'SM' ) $country = 'San Marino';
    if( $code == 'ST' ) $country = 'Sao Tome and Principe';
    if( $code == 'SA' ) $country = 'Saudi Arabia';
    if( $code == 'SN' ) $country = 'Senegal';
    if( $code == 'RS' ) $country = 'Serbia';
    if( $code == 'SC' ) $country = 'Seychelles';
    if( $code == 'SL' ) $country = 'Sierra Leone';
    if( $code == 'SG' ) $country = 'Singapore';
    if( $code == 'SK' ) $country = 'Slovakia (Slovak Republic)';
    if( $code == 'SI' ) $country = 'Slovenia';
    if( $code == 'SB' ) $country = 'Solomon Islands';
    if( $code == 'SO' ) $country = 'Somalia, Somali Republic';
    if( $code == 'ZA' ) $country = 'South Africa';
    if( $code == 'GS' ) $country = 'South Georgia and the South Sandwich Islands';
    if( $code == 'ES' ) $country = 'Spain';
    if( $code == 'LK' ) $country = 'Sri Lanka';
    if( $code == 'SD' ) $country = 'Sudan';
    if( $code == 'SR' ) $country = 'Suriname';
    if( $code == 'SJ' ) $country = 'Svalbard & Jan Mayen Islands';
    if( $code == 'SZ' ) $country = 'Swaziland';
    if( $code == 'SE' ) $country = 'Sweden';
    if( $code == 'CH' ) $country = 'Switzerland, Swiss Confederation';
    if( $code == 'SY' ) $country = 'Syrian Arab Republic';
    if( $code == 'TW' ) $country = 'Taiwan';
    if( $code == 'TJ' ) $country = 'Tajikistan';
    if( $code == 'TZ' ) $country = 'Tanzania';
    if( $code == 'TH' ) $country = 'Thailand';
    if( $code == 'TL' ) $country = 'Timor-Leste';
    if( $code == 'TG' ) $country = 'Togo';
    if( $code == 'TK' ) $country = 'Tokelau';
    if( $code == 'TO' ) $country = 'Tonga';
    if( $code == 'TT' ) $country = 'Trinidad and Tobago';
    if( $code == 'TN' ) $country = 'Tunisia';
    if( $code == 'TR' ) $country = 'Turkey';
    if( $code == 'TM' ) $country = 'Turkmenistan';
    if( $code == 'TC' ) $country = 'Turks and Caicos Islands';
    if( $code == 'TV' ) $country = 'Tuvalu';
    if( $code == 'UG' ) $country = 'Uganda';
    if( $code == 'UA' ) $country = 'Ukraine';
    if( $code == 'AE' ) $country = 'United Arab Emirates';
    if( $code == 'GB' ) $country = 'United Kingdom';
    if( $code == 'US' ) $country = 'United States of America';
    if( $code == 'UM' ) $country = 'United States Minor Outlying Islands';
    if( $code == 'VI' ) $country = 'United States Virgin Islands';
    if( $code == 'UY' ) $country = 'Uruguay, Eastern Republic of';
    if( $code == 'UZ' ) $country = 'Uzbekistan';
    if( $code == 'VU' ) $country = 'Vanuatu';
    if( $code == 'VE' ) $country = 'Venezuela';
    if( $code == 'VN' ) $country = 'Vietnam';
    if( $code == 'WF' ) $country = 'Wallis and Futuna';
    if( $code == 'EH' ) $country = 'Western Sahara';
    if( $code == 'YE' ) $country = 'Yemen';
    if( $code == 'ZM' ) $country = 'Zambia';
    if( $code == 'ZW' ) $country = 'Zimbabwe';
    if( $country == '') $country = $code;
    return $country;
}

function get_folder($dir)
{
	
  	$qry= mysql_query("select * from folders");
	$row = mysql_fetch_array($qry);
	if ($row['con_count'] >= 500){
		$executeqry=mysql_query("UPDATE folders SET con=con+1,goc_count=goc_count+1,con_count=0");
		$con = $row['con']+1;
		mkdir($dir.'/t/'.$row['goc'].'/'.$con);
		chmod($dir.'/t/'.$row['goc'].'/'.$con, 0777);
		
	};
	if ($row['goc_count'] >= 500){
		$executeqry=mysql_query("UPDATE folders SET goc=goc+1,goc_count=0");
		$goc = $row['goc']+1;
		mkdir($dir.'/t/'.$goc);
		chmod($dir.'/t/'.$goc, 0777);
	};
	
	$qry= mysql_query("select * from folders");
	$row = mysql_fetch_array($qry);
	$folder = $row['goc'].'/'.$row['con'].'/';	
	
	return $folder;
}
?>