<?php

require_once('twitteroauth/twitteroauth.php');
include("include/config.php");
include("include/functions/import.php");

$pagetitle = $lang['9'];
STemplate::assign('pagetitle',$pagetitle);

STemplate::assign('message',$message);
STemplate::assign('error',$error);

//TEMPLATES BEGIN
STemplate::display('twitter_signup.tpl');
//TEMPLATES END
?>