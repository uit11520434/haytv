<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

if($_POST['submitform'] == "1")
{
	$arr = array("site_name", "site_email", "items_per_page", "quota", "mtrend", "approve_stories", "myes", "mno", "twitter", "TC", "TWITTER_APP_ID", "TWITTER_APP_SECRET", "FACEBOOK_APP_ID", "FACEBOOK_SECRET", "FACEBOOK_PROFILE", "FACEBOOK_ADMIN", "lwm", "twm", "wmfont", "fsize", "AUTOSCROLL", "displaywm", "thumbs", "safemode", "ganalytics", "vupload", "tupload", "RSS", "fixenabled", "topgags", "trendingenabled", "voteforvisitor", "SEO", "truncate", "recommended", "channels", "rhome", "mobilemode", "m_url", "mobile_per_page", "blackr", "blackb", "blackg", "whiter", "whiteb", "whiteg", "regredirect", "index", "postfolder", "up_points", "view_points", "share1", "share2", "NSFWADS", "topposts", "populargags");
	foreach ($arr as $value)
	{
		$sql = "update config set value='".mysql_real_escape_string($_POST[$value])."' where setting='$value'";
		$conn->execute($sql);
		Stemplate::assign($value,strip_mq_gpc($_POST[$value]));
	}
	$message = "General Settings Successfully Saved.";
	Stemplate::assign('message',$message);
}

$mainmenu = "2";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/settings_general.tpl");
STemplate::display("administrator/global_footer.tpl");
?>