<?php

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];
$PID = intval($_POST['pid']);
$query="SELECT PID ,story, pic FROM posts WHERE active='1' AND nsfw='0' AND pic!='' AND PID>".$PID." order by PID ASC limit 1";
$executequery=$conn->execute($query);
$PID = intval($executequery->fields['PID']);
$title = html_entity_decode(stripslashes($executequery->fields['story']), ENT_COMPAT, "UTF-8");
if ($PID == 0)
{
$query="SELECT PID, story, pic FROM posts WHERE active='1' AND nsfw='0' AND pic!='' order by PID ASC limit 1";
$executequery=$conn->execute($query);
$PID = intval($executequery->fields['PID']);
$title = html_entity_decode(stripslashes($executequery->fields['story']), ENT_COMPAT, "UTF-8");
}
if($config[SEO] == 1)
{
$titleseo = makeseo($title).".html";
}
else
{
$titleseo = "";
}
$image = cleanit($executequery->fields['pic']);
		
$arr = array('PID' => $PID, 'title' => $title, 'titleseo' => $titleseo, 'image' => $image);
echo json_encode($arr);
?>