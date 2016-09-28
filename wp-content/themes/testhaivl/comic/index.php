<?php
/**************************************************************************************************
| 9Gag Clone Script
| http://www.9gagclonescript.com
| webmaster@9gagclonescript.com
|
|**************************************************************************************************
|
| By using this software you agree that you have read and acknowledged our End-User License 
| Agreement available at http://www.9gagclonescript.com/eula.html and to be bound by it.
|
| Copyright (c) 9GagCloneScript.com. All rights reserved.
|**************************************************************************************************/
include("../include/config.php");

include("../include/functions/import.php");

$thebaseurl = $config['baseurl'];

$templateselect = "ragecomic.tpl";
$pagetitle = 'Công cụ chế ảnh online';
STemplate::assign('pagetitle',$pagetitle);
STemplate::assign('description','Công cụ chế ảnh online, chế ragecomic, ảnh troll, Doremon chế, Brown và Cony, Hỏi xoáy Đáp xoay');
STemplate::assign('ragepage',1);
STemplate::assign('menu',12);
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header.tpl');
STemplate::display($templateselect);
//TEMPLATES END
?>