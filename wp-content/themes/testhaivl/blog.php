<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];
$bid = $_GET['id'];
$query = "SELECT description from advertisements where AID = $bid ";
$executequery = $conn->CacheExecute(20,$query);
$parray = $executequery->getarray();
$pagetitle = $parray[0]['description'];

$templateselect = "blog.tpl";
STemplate::assign('pagetitle',$pagetitle);
STemplate::assign('bid',$bid);
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>