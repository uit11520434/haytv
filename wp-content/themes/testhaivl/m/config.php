<?php
$mobile = "1";
$config['basedir']   = '/home/myfancy/public_html';
$config['mobiledir'] = '/home/myfancy/public_html/m';
$config['mobileurl'] = 'http://m.myfancy.org';

function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AID])."' AND active='1' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function insert_get_fav_count($var)
{
    global $conn;
	$query="SELECT count(*) as total FROM posts_favorited WHERE PID='".intval($var[PID])."'";
	$executequery=$conn->execute($query);
	$total = $executequery->fields[total];
	return intval($total);
}

function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}

function verify_valid_email($emailtocheck)
{
       $eregicheck = "^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,4}\$";
       return eregi($eregicheck, $emailtocheck);
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

function makeseo($str,$separator = 'dash',$lowercase = TRUE)
{
//decode html entities
$str = html_entity_decode($str,ENT_QUOTES,'UTF-8');

//make lowercase
$str = mb_strtolower($str, 'UTF-8');

//replace special chars, for UTF8 encoding it needs to be defined as array
$trans = array(
'ơ'=>'o',
'Ơ'=>'o',
'ó'=>'o',
'Ó'=>'o',
'ò'=>'o',
'Ò'=>'o',
'ọ'=>'o',
'Ọ'=>'o',
'ỏ'=>'o',
'Ỏ'=>'o',
'õ'=>'o',
'Õ'=>'o',
'ớ'=>'o',
'Ớ'=>'o',
'ờ'=>'o',
'Ờ'=>'o',
'ợ'=>'o',
'Ợ'=>'o',
'ở'=>'o',
'Ở'=>'o',
'ỡ'=>'o',
'Ỡ'=>'o',
'ô'=>'o',
'Ô'=>'o',
'ố'=>'o',
'Ố'=>'o',
'ồ'=>'o',
'Ồ'=>'o',
'ộ'=>'o',
'Ộ'=>'o',
'ổ'=>'o',
'Ổ'=>'o',
'ỗ'=>'o',
'Ỗ'=>'o',
'ú'=>'u',
'Ú'=>'u',
'ù'=>'u',
'Ù'=>'u',
'ụ'=>'u',
'Ụ'=>'u',
'ủ'=>'u',
'Ủ'=>'u',
'ũ'=>'u',
'Ũ'=>'u',
'ư'=>'u',
'Ư'=>'u',
'ứ'=>'u',
'Ứ'=>'u',
'ừ'=>'u',
'Ừ'=>'u',
'ự'=>'u',
'ữ'=>'u',
'Ự'=>'u',
'ử'=>'u',
'Ử'=>'u',
'ữ'=>'u',
'Ữ'=>'u',
'â'=>'a',
'Â'=>'a',
'á'=>'a',
'Á'=>'a',
'à'=>'a',
'À'=>'a',
'ạ'=>'a',
'Ạ'=>'a',
'ả'=>'a',
'Ả'=>'a',
'ã'=>'a',
'Ã'=>'a',
'ấ'=>'a',
'Ấ'=>'a',
'ầ'=>'a',
'Ầ'=>'a',
'ậ'=>'a',
'ạ'=>'a',
'ò'=>'o',
'Ậ'=>'a',
'ẩ'=>'â',
'Ẩ'=>'a',
'ẫ'=>'a',
'Ẫ'=>'a',
'ă'=>'a',
'Ă'=>'a',
'ắ'=>'a',
'Ắ'=>'a',
'ằ'=>'a',
'Ằ'=>'a',
'ặ'=>'a',
'Ặ'=>'a',
'ẳ'=>'a',
'Ẳ'=>'a',
'ẵ'=>'a',
'Ẵ'=>'a',
'ế'=>'e',
'Ế'=>'e',
'ề'=>'e',
'Ề'=>'e',
'ệ'=>'e',
'Ệ'=>'e',
'ể'=>'e',
'Ể'=>'e',
'ễ'=>'e',
'Ễ'=>'e',
'é'=>'e',
'É'=>'e',
'è'=>'e',
'È'=>'e',
'ẹ'=>'e',
'Ẹ'=>'e',
'ẻ'=>'e',
'Ẻ'=>'e',
'ẽ'=>'e',
'Ẽ'=>'e',
'ê'=>'e',
'Ê'=>'e',
'í'=>'i',
'Í'=>'i',
'ì'=>'i',
'Ì'=>'i',
'ỉ'=>'i',
'Ỉ'=>'i',
'ĩ'=>'i',
'Ĩ'=>'i',
'ị'=>'i',
'Ị'=>'i',
'ý'=>'y',
'Ý'=>'y',
'ỳ'=>'y',
'Ỳ'=>'y',
'ỷ'=>'y',
'Ỷ'=>'y',
'ỹ'=>'y',
'Ỹ'=>'y',
'ỵ'=>'y',
'Ỵ'=>'y',
'đ'=>'d',
'Đ'=>'d',
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
'‘'=>'',
'’'=>'',
'…'=>'',
'ẩ'=>'a',
'"'=>'',
'ồ'=>'o',
'ấ'=>'a',
'ớ'=>'o',
'ý'=>'y',
'ậ'=>'a',
'ạ'=>'a',
'ế'=>'e',
'ì'=>'i',
'ả'=>'a',
'*'=>' ',
'ó'=>'o',
'ể'=>'e',
'Ấ'=>'a',
'ậ'=>'a',
'ộ'=>'o',
'à'=>'a',
'ợ'=>'o',
'ệ'=>'e',
'`'=>'',
'&gt;'=>'',
'&lt;'=>'',
'&quot;'=>'',
'&amp;'=>'',
'%'=>'',
'á'=>'a',
'ầ'=>'a',
'|'=>'',
'“'=>'',
'”'=>'',
'–'=>'',
'='=>'',
'ặ'=>'a',
'ờ'=>'o',
'ố'=>'o',
'ắ'=>'a',
'ỳ'=>'y',
'é'=>'e',
'ẹ'=>'e',
'ú'=>'u'
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

function insert_return_youtube($a)
{
    $embedcode = '<object width="100%" height="320"><param name="movie" value="http://www.youtube.com/v/AWECDE&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="wmode" value="opaque" /></param><embed src="http://www.youtube.com/v/AWECDE&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="100%" height="320" wmode="opaque"></embed></object>';
	$item = $a[youtube];
	$embedcode = str_replace("AWECDE", $item, $embedcode);
	return $embedcode;
}

function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}
?>