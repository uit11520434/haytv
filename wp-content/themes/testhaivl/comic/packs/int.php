<?php
$dir = getcwd();
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
	if ( strlen(strstr($filename,'.')) ==  0 ) {
          $files1[] = $filename;
     }
    
}

//print_r($files1);

while (list($key, $value) = each($files1)) {
	$dh  = opendir($dir.'/'.$value.'/images');
	$files2 = array();
	while (false !== ($filename = readdir($dh))) {
		if ( strlen(strstr($filename,'.')) > 0  && $filename != '.' && $filename != '..' && $filename != 'Thumbs.db') {
			  $files2[$filename] = substr($filename,0,(strlen($filename)-4));   
		 }
	}
	
	$fp = fopen($dir.'/'.$value.'/manifest.json', 'w');
	fwrite($fp, json_encode($files2));
	fclose($fp);
	//print_r($files2);
}

echo "OK";

?>