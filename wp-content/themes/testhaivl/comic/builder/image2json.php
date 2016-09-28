<?php

	$path = $_REQUEST[imageUrl];
	$type = pathinfo($path, PATHINFO_EXTENSION);


			$crl = curl_init();
			$timeout = 2;
			curl_setopt($crl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			curl_setopt ($crl, CURLOPT_URL,$path);
			curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
			$data = curl_exec($crl);
			curl_close($crl);

	//$data = file_get_contents($path);
       
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	echo $base64;
?>