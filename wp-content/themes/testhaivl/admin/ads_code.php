<?php

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

$mainmenu = "11";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/ads_code.tpl");
STemplate::display("administrator/global_footer.tpl");
?>