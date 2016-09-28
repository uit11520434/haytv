<?php

function fullname($a)
{
    global $conn;
	$query= "SELECT fullname FROM  members WHERE username = '".$a."'";
	$executequery=$conn->CacheExecute(20,$query);
	$fullname = $executequery->fields[fullname];
	if ($fullname != "") {
		$text = $fullname;
	}else{
		$text = $a;
	}
	
	return $text;
}



function bb($bbtext){
  $bbtags = array(
    '[heading1]' => '<h1>','[/heading1]' => '</h1>',
    '[heading2]' => '<h2>','[/heading2]' => '</h2>',
    '[heading3]' => '<h3>','[/heading3]' => '</h3>',
    '[h1]' => '<h1>','[/h1]' => '</h1>',
    '[h2]' => '<h2>','[/h2]' => '</h2>',
    '[h3]' => '<h3>','[/h3]' => '</h3>',

    '[paragraph]' => '<p>','[/paragraph]' => '</p>',
    '[para]' => '<p>','[/para]' => '</p>',
    '[p]' => '<p>','[/p]' => '</p>',
    '[left]' => '<p style="text-align:left;">','[/left]' => '</p>',
    '[right]' => '<p style="text-align:right;">','[/right]' => '</p>',
    '[center]' => '<p style="text-align:center;">','[/center]' => '</p>',
    '[justify]' => '<p style="text-align:justify;">','[/justify]' => '</p>',

    '[bold]' => '<span style="font-weight:bold;">','[/bold]' => '</span>',
    '[italic]' => '<span style="font-style:italic;">','[/italic]' => '</span>',
    '[underline]' => '<span style="text-decoration:underline;">','[/underline]' => '</span>',
    '[b]' => '<span style="font-weight:bold;">','[/b]' => '</span>',
    '[i]' => '<span style="font-style:italic;">','[/i]' => '</span>',
    '[u]' => '<span style="text-decoration:underline;">','[/u]' => '</span>',
    '[break]' => '<br>',
    '[br]' => '<br>',
    '[newline]' => '<br>',
    '[nl]' => '<br>',
    
    '[unordered_list]' => '<ul>','[/unordered_list]' => '</ul>',
    '[list]' => '<ul>','[/list]' => '</ul>',
    '[ul]' => '<ul>','[/ul]' => '</ul>',
	
    '[ordered_list]' => '<ol>','[/ordered_list]' => '</ol>',
    '[ol]' => '<ol>','[/ol]' => '</ol>',
    '[list_item]' => '<li>','[/list_item]' => '</li>',
    '[li]' => '<li>','[/li]' => '</li>',
	    
    '[*]' => '<li>','[/*]' => '</li>',
    '[code]' => '<code>','[/code]' => '</code>',
    '[preformatted]' => '<pre>','[/preformatted]' => '</pre>',
    '[pre]' => '<pre>','[/pre]' => '</pre>',
	'[quote]' => '<blockquote>','[/quote]' => '</blockquote>',
	'=13px'	=> '','=10px'	=> '','=11px'	=> '','=12px'	=> '','=14px'	=> '','=15px'	=> '','=16px'	=> '','=17px'	=> '','=10px'	=> '',
	'=9px'	=> '','=10pt'	=> '','=13.333333969116211px' => ''
  );
	
  $bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

  $bbextended = array(
    "/\[url](.*?)\[\/url]/is" => "<a href=\"http://$1\" title=\"$1\">$1</a>",
    "/\[url=(.*?)\](.*?)\[\/url\]/is" => "<a href=\"$1\" title=\"$1\">$2</a>",
    "/\[size=(.*?)\](.*?)\[\/size\]/is" => "<span style=\"font-size:$1%;\">$2</span>",
	"/\[color=(.*?)\](.*?)\[\/color\]/is" => "<span style=\"color:$1;\">$2</span>",
    "/\[email=(.*?)\](.*?)\[\/email\]/is" => "<a href=\"mailto:$1\">$2</a>",
    "/\[mail=(.*?)\](.*?)\[\/mail\]/is" => "<a href=\"mailto:$1\">$2</a>",
    "/\[img\]([^[]*)\[\/img\]/is" => "<img  class=\"pic\" src=\"$1\" alt=\" \" />",
	"/\[image\]([^[]*)\[\/image\]/is" => "<img class=\"pic\" src=\"$1\" alt=\" \" />",
    "/\[image_left\]([^[]*)\[\/image_left\]/is" => "<img class=\"pic\" src=\"$1\" alt=\" \" class=\"img_left\" />",
    "/\[image_right\]([^[]*)\[\/image_right\]/is" => "<img class=\"pic\" src=\"$1\" alt=\" \" class=\"img_right\" />",
  );

  foreach($bbextended as $match=>$replacement){
    $bbtext = preg_replace($match, $replacement, $bbtext);
  }
  return nl2br($bbtext);
}
function bbtext($bbtext){
  $bbtags = array(
    '[heading1]' => '','[/heading1]' => '',
    '[heading2]' => '','[/heading2]' => '',
    '[heading3]' => '','[/heading3]' => '',
    '[h1]' => '','[/h1]' => '',
    '[h2]' => '','[/h2]' => '',
    '[h3]' => '','[/h3]' => '',

    '[paragraph]' => '','[/paragraph]' => '',
    '[para]' => '','[/para]' => '',
    '[p]' => '','[/p]' => '',
    '[left]' => '','[/left]' => '',
    '[right]' => '','[/right]' => '',
    '[center]' => '','[/center]' => '',
    '[justify]' => '','[/justify]' => '',

    '[bold]' => '','[/bold]' => '',
    '[italic]' => '','[/italic]' => '',
    '[underline]' => '','[/underline]' => '',
    '[b]' => '','[/b]' => '',
    '[i]' => '','[/i]' => '',
    '[u]' => '','[/u]' => '',
    '[break]' => '',
    '[br]' => '',
    '[newline]' => '',
    '[nl]' => '',
    
    '[unordered_list]' => '','[/unordered_list]' => '',
    '[list]' => '','[/list]' => '',
    '[ul]' => '','[/ul]' => '',
	
    '[ordered_list]' => '','[/ordered_list]' => '',
    '[ol]' => '','[/ol]' => '',
    '[list_item]' => '','[/list_item]' => '',
    '[li]' => '','[/li]' => '',
	    
    '[*]' => '','[/*]' => '',
    '[code]' => '','[/code]' => '',
    '[preformatted]' => '','[/preformatted]' => '',
    '[pre]' => '','[/pre]' => '',
	'[quote]' => '','[/quote]' => '',
	'=13px'	=> '','=10px'	=> '','=11px'	=> '','=12px'	=> '','=14px'	=> '','=15px'	=> '','=16px'	=> '','=17px'	=> '','=10px'	=> '',
	'=9px'	=> '','=10pt'	=> '','=13.333333969116211px' => ''
		
  );
	
  $bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

  $bbextended = array(
    "/\[url](.*?)\[\/url]/is" => "$1",
    "/\[url=(.*?)\](.*?)\[\/url\]/is" => "$2",
    "/\[size=(.*?)\](.*?)\[\/size\]/is" => "$2",
	"/\[color=(.*?)\](.*?)\[\/color\]/is" => "$2",
    "/\[email=(.*?)\](.*?)\[\/email\]/is" => "$2",
    "/\[mail=(.*?)\](.*?)\[\/mail\]/is" => "$2",
    "/\[img\]([^[]*)\[\/img\]/is" => "",
	"/\[image\]([^[]*)\[\/image\]/is" => "",
    "/\[image_left\]([^[]*)\[\/image_left\]/is" => "",
    "/\[image_right\]([^[]*)\[\/image_right\]/is" => "",
  );

  foreach($bbextended as $match=>$replacement){
    $bbtext = preg_replace($match, $replacement, $bbtext);
  }
  return trim($bbtext);
}

function vnseo($q2g ,$link = false  ) {
	$ttk = array(
		'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
		'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
		'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
		'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ỗ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
		'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'd'	=>	array('đ','Đ'),
		''	=>	array('”','“','quot','grave','circ','tilde','acute','~','!','#','$','%','^','&','*','(',')','_','-','+','=','`','{','}','[',']','|','<','>',',','.','?','/','\"','\'',':',';'),
	);
	foreach ($ttk as $key => $arr) {
		foreach ($arr as $val) {
			$q2g = str_replace($val,$key,$q2g);
		}
	}
	$q2g = trim($q2g);
	
	if ($link) {
		$q2g = "xem ".$q2g;
		$q2g = strtolower(str_replace(' ','-',$q2g));
		$q2g = strtolower(str_replace('--','-',$q2g));
		return $q2g;
	}else{
		return $q2g;
	}
}


function truncateHTML($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
	if ($considerHtml) {
		// if the plain text is shorter than the maximum length, return the whole text
		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		// splits all html-tags to scanable lines
		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
		$total_length = strlen($ending);
		$open_tags = array();
		$truncate = '';
		foreach ($lines as $line_matchings) {
			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
			if (!empty($line_matchings[1])) {
				// if it's an "empty element" with or without xhtml-conform closing slash
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					// do nothing
				// if tag is a closing tag
				} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					// delete tag from $open_tags list
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
					unset($open_tags[$pos]);
					}
				// if tag is an opening tag
				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					// add tag to the beginning of $open_tags list
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				// add html-tag to $truncate'd text
				$truncate .= $line_matchings[1];
			}
			// calculate the length of the plain text part of the line; handle entities as one character
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
			if ($total_length+$content_length> $length) {
				// the number of characters which are left
				$left = $length - $total_length;
				$entities_length = 0;
				// search for html entities
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
					// calculate the real length of all entities in the legal range
					foreach ($entities[0] as $entity) {
						if ($entity[1]+1-$entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							// no more characters left
							break;
						}
					}
				}
				$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
				// maximum lenght is reached, so get off the loop
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			// if the maximum length is reached, get off the loop
			if($total_length>= $length) {
				break;
			}
		}
	} else {
		if (strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = substr($text, 0, $length - strlen($ending));
		}
	}
	// if the words shouldn't be cut in the middle...
	if (!$exact) {
		// ...search the last occurance of a space...
		$spacepos = strrpos($truncate, ' ');
		if (isset($spacepos)) {
			// ...and cut the text in this position
			$truncate = substr($truncate, 0, $spacepos);
		}
	}
	// add the defined ending to the text
	$truncate .= $ending;
	if($considerHtml) {
		// close all unclosed html-tags
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
	}
	return $truncate;
}
 
function strTruncate($string, $your_desired_width,$ext = '...') {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);

  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > $your_desired_width) { break; }
  }

  return implode(array_slice($parts, 0, $last_part)).$ext;
}

?> 