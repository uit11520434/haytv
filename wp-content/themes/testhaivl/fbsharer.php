<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];
$gagid = intval($_REQUEST['gagid']);
$gagstory = $_REQUEST['gagstory'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="{$lang254}" dir="LTR">
<head prefix="og: http://ogp.me/ns/fb#">
<style type="text/css">
.FBConnectButton {background:#29447e url(../images/connect_sprite.png);background-repeat:no-repeat;cursor:default;display:inline-block;padding:0 0 0 1px;text-decoration:none;outline:none}
.FBConnectButton .FBConnectButton_Text,
 .FBConnectButton_Text{background:#5f78ab url(../images/connect_sprite.png);border-top:solid 1px #879ac0;border-bottom:solid 1px #1a356e;color:#fff;display:block;font-family:"lucida grande",tahoma,verdana,arial,sans-serif;font-weight:bold;padding:2px 6px 4px;margin:1px 1px 0 0;text-shadow:none}
a.FBConnectButton, .FBConnectButton{text-decoration:none}
a.FBConnectButton:active .FBConnectButton_Text,
.FBConnectButton:active .FBConnectButton_Text {border-bottom:solid 1px #29447e;border-top:solid 1px #45619d;background:#4f6aa3;text-shadow:none}
.FBConnectButton_Small{background-position:left -232px;font-size: 10px;line-height:10px; cursor:pointer;}
.FBConnectButton_Small .FBConnectButton_Text{padding:2px 6px 3px;margin-left:17px}
a.FBConnectButton_Small:active , .FBConnectButton_Small:active{background-position:left -250px}
.fb_share_count_wrapper{position:relative;float:left}
.fb_share_count{background:#b0b9ec none repeat scroll 0 0;color:#333;font-family:"lucida grande",tahoma,verdana,arial,sans-serif;text-align:center}
.fb_share_count_inner{background:#e8ebf2;display:block}
.fb_share_count_right{margin-left:-5px;display:inline-block}
.fb_share_count_pad{margin-left:1px;}
.fb_share_count_right .facebook_share_count_inner{border-top:solid 1px #e8ebf2;border-bottom:solid 1px #b0b9ec;margin:1px 1px 0 1px;font-size: 10px;line-height:10px;padding:2px 0;}
.fb_share_count_top{display:block;letter-spacing:-1px;line-height:34px;margin-bottom:7px;font-size: 22px;border:solid 1px #b0b9ec}
.fb_share_count_nub_top{border:none;display:block;position:absolute;left:7px;top:35px;margin:0;padding:0;width:6px;height:7px;background-repeat:no-repeat;background-image:url(../img/nub_top.png)}
.fb_share_count_nub_right{border:none;display:inline-block;padding:0;width:5px;height:10px;background-repeat:no-repeat;background-image:url(../img/nub_right.png);vertical-align:top;background-position:right 5px;z-index:10;left:-1px;margin:0 0 0 0;position:relative}
.fb_share_count_nub_right_pad { left:2px; }
.fb_share_no_count{display:none}
SPAN.fb_share_size_Small { display: inline-block; float: right; padding: 1px 0; overflow:hidden;}
SPAN.fb_share_size_Small .fb_share_count_right .fb_share_count_inner{font-size: 10px; font-weight: bold; cursor:pointer; width: 36px;}

</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"  style="margin:0;">
<div id="fb-root"></div>
<a class="facebook-share-button" name="fb_share" type="button_count" share_url="<?php echo $thebaseurl.$config[postfolder]?><?php echo $gagid ?>/<?php if($config[SEO] == 1){echo makeseo($gagstory).".html";} ?>?ref=fb-share"></a>
<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>
</body>
</html>