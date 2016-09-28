<?php

include("include/config.php");
include("include/functions/import.php");

$pagetitle = $lang['9'];
STemplate::assign('pagetitle',$pagetitle);

STemplate::assign('message',$message);
STemplate::assign('error',$error);

//TEMPLATES BEGIN
STemplate::display('signup.tpl');
//TEMPLATES END
?>