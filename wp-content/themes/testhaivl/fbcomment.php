<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];
$gagid = intval($_REQUEST['gagid']);
$gagstory = $_REQUEST['gagstory'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="en" dir="LTR">
<head prefix="og: http://ogp.me/ns/fb#">
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"  style="margin:0;">
<div id="fb-root"></div>
<script src="http://connect.facebook.net/ar_AR/all.js"></script>
<script>
  FB.init({appId: '<?php echo $config['FACEBOOK_APP_ID'] ?>', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });	  
</script>
<fb:comments href="<?php echo $thebaseurl.$config[postfolder] ?><?php echo $gagid ?>/<?php if($config[SEO] == 1){echo makeseo($gagstory).".html";} ?>" num_posts="10" width="700"></fb:comments>				
<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>
</body>
</html>