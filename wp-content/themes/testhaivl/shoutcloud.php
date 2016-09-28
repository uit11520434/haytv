<?php
# ShoutCloud - Flexible PHP Shoutbox
# File: shoutcloud.php
# Author: Big Ross Labs
# Version: 1.2.9 - Modified by Anonymous
# Date: 10/20/2010
# Copyright (c) 2010 Big Ross Labs. All Rights Reserved.
# Part of the ShoutCloud package sold only on codecanyon.net!
# Note: You don't need "shoutcloud-lang.php" to use ShoutCloud anymore!
# SPREAD THIS RELEASE AS MUCH AS POSSIBLE. DON'T PAY FOR CODE!

/* ABOUT THIS FILE:
   -------------------------------------------------------------------------
	This file contains all the elements for displaying a proper shoutbox on
	your website. It handles the inital loading of the shoutbox and AJAX
	communication between Javascript and PHP for loading/storage of messages
	for the shoutbox. Modify this file at your own risk.
   -------------------------------------------------------------------------
*/

#### CONFIGURATION #########################################################
#### Modify the options below to customize ShoutCloud. #####################
############################################################################

## FILES CONFIG ##
## NOTE: These are just the location and the desired name of the files, ShoutCloud creates the files for you! ##

include("include/config.php");
if (isset($_SESSION['USERNAME']) && $_SESSION['USERNAME'] != "" ) {
		if($_SESSION['FULLNAME'] != ""){
			$_SESSION['ShoutCloud-User'] = utf8_encode($_SESSION['FULLNAME']);
		}else{
			$_SESSION['ShoutCloud-User'] = utf8_encode($_SESSION['USERNAME']);
		}
			
}

$shoutFile = 'pdata/shoutcloud/shout.txt'; // Text file that stores the shouts
$banlistFile = 'pdata/shoutcloud/shout-bans.txt'; // Text file that stores the ban list

## SMILIES CONFIG ##
$smiliesFolder = 'shoutcloud/smilies/'; // Path to the folder with the smilies in it
// The configuration for each smilie
// 'smilie shortcut' => 'smilie image'
$smiliesConfig = array(':)' => 'happy.png',
					   ':D' => 'grin.png',
					   '=D' => 'lol.png',
					   ':O' => 'surprise.png',
					   ':p' => 'razz.png',
					   ':(' => 'sad.png',
					   ':}' => 'kitty.png',
					   ';)' => 'wink.png',
					   ':|' => 'neutral.png',
					   '(blush)' => 'blush.png',
					   ':{' => 'confuse.png',
					   'B)' => 'cool.png',
					   ':,(' => 'cry.png',
					   '8|' => 'eek.png',
					   '(evil)' => 'evil.png',
					   '(fat)' => 'fat.png',
					   '(green)' => 'green.png',
					   ':*' => 'kiss.png',
					   '(angry)' => 'mad.png',
					   '(rolleyes)' => 'roll.png',
					   '(zzz)' => 'sleep.png',
					   '(yell)' => 'yell.png',
					   '(zipper)' => 'zipper.png',
					   ':3' => 'fbcurlylips.png',
					   ':v' => 'fbpacman.png',
					    '(y)' => 'fbthumb.png');

## BADWORD FILTER CONFIG ##
// Badwords to strip from shouts
$badwords = array('fuck','fucker','shit','piss','cunt','pussy','dick','asshole','bitch','bitches','whore','nigga','nigger');

## ADMIN CONFIG ##
$admin_username = 'doimat'; // Name of the user who has Admin Access
$admin_password = 'kht201284'; // Password for admin access. (Make it a difficult one!)

## TIME FORMAT CONFIG ##
$timeFormat = 'g:i:sa'; // Time format for shouts based on PHP's date function

############################################################################
#### END CONFIGURATION #####################################################
############################################################################

########################################################################
#### DO NOT EDIT ANYTHING BELOW UNLESS YOU KNOW WHAT YOU ARE DOING! ####
########################################################################

# Check variable(s) to figure out what we are doing
if(!headers_sent()) { session_start(); }
$shoutcloud_com = strip_tags($_POST['sc_com']); 
$shoutcloud_display = strip_tags($_POST['display']); 
$shoutcloud = new ShoutCloud($shoutFile,$banlistFile,$smiliesFolder,$smiliesConfig,$badwords,$timeFormat,$admin_username,$admin_password);

if($shoutcloud_display=='banlist') {
	if((empty($_SESSION['ShoutCloud_Admin_Name'])) && (empty($_SESSION['ShoutCloud_Admin_Loggedin']))) { die($this->jsonEncode(array('error'=>'<strong>You must be an Administration to view the ban list.</strong>'))); }
	$out = '<div id="ShoutCloud-Wrapper-Admin"><div class="ShoutCloud-Title">Ban List</div>';
	$bans = fopen($shoutcloud->bansFile, 'a+'); if(!is_writable($shoutcloud->bansFile)) { chmod($shoutcloud->bansFile, 0666); }
	if(filesize($shoutcloud->bansFile)>0) { $allBans = unserialize(fread($bans, filesize($shoutcloud->bansFile))); fclose($bans);
		if(empty($allBans)) { $out .= '<em>There are no bans in the list...</em>'; } else { $out .= '<div id="ShoutCloud-BanListBox">';
			foreach($allBans as $ip => $user) { $expires = ($user['expire'] > 0) ? $shoutcloud->formatTime($user['expire']) : 'never';
				if($expires===false) { $shoutcloud->unbanUser($ip,'internal'); } else { $expires = ($expires=='never') ? 'never' : 'in '.$expires;
					$out .= '<div class="ShoutCloud-BannedUser" id="'.$ip.'"><div class="ShoutCloud-UnBan" id="'.$ip.'">Remove Ban</div><strong>'.$user['name'].'</strong>
							 - <small>Expires '.$expires.'</small><br /><small>'.$ip.'</small></div>';
				}
			} $out .= '</div>';
		}
	} else { $out .= '<em>There are no bans in the list...</em>'; } die($shoutcloud->jsonEncode(array('content'=>$out.'</div>')));
} elseif($shoutcloud_display=='clear') {
	if((empty($_SESSION['ShoutCloud_Admin_Name'])) && (empty($_SESSION['ShoutCloud_Admin_Loggedin']))) { die($shoutcloud->jsonEncode(array('error'=>'<strong>You must be an Administration to clear messages.</strong>'))); }
	$out = '<div id="ShoutCloud-Wrapper-Admin"><div class="ShoutCloud-Title">Clear All Messages</div>
			<strong>Are you sure you want to clear all of the messages?</strong>
			<div id="ShoutCloud-DoClear">Clear All Messages</div></div>';
	die($shoutcloud->jsonEncode(array('content'=>$out)));
}

if((empty($shoutcloud_com)) || (!isset($shoutcloud_com))) { $shoutcloud->init(); } else {
	switch($shoutcloud_com) {
		case 'ajax': $lastpost=(!empty($_POST['last'])) ? str_ireplace('shoutid-','',$_POST['last']):''; $loadtype=($shoutcloud->isAdmin()===true) ? 'admin':'json'; echo $shoutcloud->loadMessages($loadtype,$lastpost); break;
		case 'admin': $lastpost=(!empty($_POST['last'])) ? str_ireplace('shoutid-','',$_POST['last']):''; $loadtype=($shoutcloud->isAdmin()===true) ? 'admin':'json'; echo $shoutcloud->loadMessages($loadtype,$lastpost); break;
		case 'post': echo $shoutcloud->addMessage($_POST['name'],$_POST['msg'],$_POST['color']); break;
		case 'login': echo $shoutcloud->adminLogin($_POST['name'], $_POST['pass']); break;
		case 'logout': echo $shoutcloud->adminLogout(); break;
		case 'ban-user': echo ($shoutcloud->isAdmin()===true) ? $shoutcloud->banUser($_POST['user'],$_POST['ip'],$_POST['expire']) : $shoutcloud->isAdmin(); break;
		case 'unban-user': echo ($shoutcloud->isAdmin()===true) ? $shoutcloud->unbanUser($_POST['ip']) : $shoutcloud->isAdmin(); break;
		case 'delete': echo ($shoutcloud->isAdmin()===true) ? $shoutcloud->deleteMessage($_POST['sid']) : $shoutcloud->isAdmin(); break;
		case 'clear': echo ($shoutcloud->isAdmin()===true) ? $shoutcloud->clearShoutbox() : $shoutcloud->isAdmin(); break;
	}
}

### ShoutCloud > Main Class ###
class ShoutCloud {
	var $adminUser;   var $adminPass;  var $msgsFile;    var $bansFile;
	var $smiliesPath; var $smilies;    var $badwords;    var $timeFormat;
	
	# ShoutCloud Constructor
	# Sets the admin's username and password
	# Options: [shout file], [banlist file], [smilies path], [smilies config], [badwords config], [time format], [admin username], [admin_password]
	function __construct($shoutFile,$banlistFile,$smiliesPath,$smiliesConfig,$badwords,$timeFormat,$admin_user,$admin_pass) {
		$this->msgsFile=$shoutFile; $this->bansFile=$banlistFile; $this->smiliesPath=$smiliesPath; $this->smilies=$smiliesConfig;
		$this->badwords=$badwords; $this->timeFormat=$timeFormat; $this->adminUser=$admin_user; $this->adminPass=$admin_pass;
	}
	
	# ShoutCloud Initalizer
	# Initalizes and loads the shoutbox
	function init() {
		$allsmilies = ''; foreach($this->smilies as $acii => $img) { $allsmilies .= '<img src="'.$this->smiliesPath.$img.'" class="ShoutCloud-Smilie" id="'.$acii.'" title="'.$acii.'" />'; }
		$username = (!empty($_SESSION['ShoutCloud-User'])) ? $_SESSION['ShoutCloud-User'] : 
		(((!empty($_SESSION['ShoutCloud_Admin_Name'])) && (!empty($_SESSION['ShoutCloud_Admin_Loggedin']))) ? $_SESSION['ShoutCloud_Admin_Name'] : '');
		$loadtype = (!empty($_SESSION['ShoutCloud_Admin_Name'])) && (!empty($_SESSION['ShoutCloud_Admin_Loggedin'])) ? 'adminhtml' : 'html';
		$swatches = ''; $tagColors = array('Pink', 'Purple', 'Blue', 'LightBlue', 'Teal', 'Green', 'DarkGreen', 'Lime', 'Yellow', 'Orange', 'Red', 'Default');
		if(!empty($_SESSION['ShoutCloud_Tag_Color'])) { $tagColor = $_SESSION['ShoutCloud_Tag_Color']; } else { $tagColor = 'Default'; }
		foreach($tagColors as $k=>$color) { $swatches.='<span class="ShoutCloud-Swatch ShoutCloud-Swatch-'.$color.(($color==$tagColor) ? ' sel' : '').'" title="'.$color.'"></span>'; }
		echo '<link type="text/css" rel="stylesheet" href="shoutcloud/ShoutCloud-min.css" media="screen"> <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> <script type="text/javascript" src="shoutcloud/ShoutCloud-min.js"></script> 
		<div id="ShoutCloud-Container">
				  <div id="ShoutCloud-MsgBox">'.$this->loadMessages($loadtype).'</div>
				  <div id="ShoutCloud-InputBox">
				  	  <div id="ShoutCloud-Error"></div>
					  <div id="ShoutCloud-Wrapper">
					  	<div id="ShoutCloud-Smilies-Menu">'.$allsmilies.'</div>
					  	<div class="ShoutCloud-Swatches">'.$swatches.'<div class="clear"></div></div>
					  	<div id="ShoutCloud-Input-Wrapper">
					  	<input type="text" name="ShoutCloud-User" id="ShoutCloud-User" maxlength="25" value="'.utf8_decode($username).'" READONLY />
					  	<span id="ShoutCloud-Color" title="Choose Color"></span>
					  	<input type="text" name="ShoutCloud-Msg" id="ShoutCloud-Msg" value="" /></div>
					  	<input type="button" name="ShoutCloud-Shout" id="ShoutCloud-Shout" value="Shout!" /><div id="ShoutCloud-Counter">0/500 characters</div></div>
					  <div class="clear"></div>
				  </div>
				  '.(((!empty($_SESSION['ShoutCloud_Admin_Name'])) && (!empty($_SESSION['ShoutCloud_Admin_Loggedin']))) ? 
					  '<div id="ShoutCloud-Admin-Panel"><span class="admin-btn shout-on" id="ShoutCloud-InputsPage">Shout</span><span class="admin-btn" id="ShoutCloud-BanList">Bans</span><span class="admin-btn" id="ShoutCloud-ClearChat">Clear All</span><span class="admin-btn" id="ShoutCloud-Admin-Logout">Logout</span></div><div class="clear"></div>' : '').'
			   </div>';
	}
	
	# loadMessages function
	# Loads the messages based on the specified output
	# Options: [output (html, json, admin)]
	function loadMessages($output,$lastpost=-1) {
		$msgs = fopen($this->msgsFile, 'a+'); if(!is_writable($this->msgsFile)) { chmod($this->msgsFile, 0666); }
		if(filesize($this->msgsFile)==0) { fwrite($msgs, serialize((array(0=>array('time' => 0, 'user' => 'Admin', 'msg' => 'Type [!help] for more information.'))))); } 
		fclose($msgs); $contents = unserialize(file_get_contents($this->msgsFile)); $dataout=array();
		if(($output=='admin')||($output=='adminhtml')) {
			foreach($contents as $pos => $data) {
				if($pos > $lastpost) {
					if($data['status']!=='deleted') {
					$adminControls = '<div class="ShoutCloud-Admin-User-Controls" data="ip:\''.$data['ip'].'\',name:\''.$data['user'].'\'">
						  				<span class="shout-user-ip">'.$data['ip'].'</span>
										<span class="shout-ban-opts">
											<b>Ban</b><span class="shout-ban" id="+1 Minute">1 Min</span>
											<span class="shout-ban" id="+10 Minutes">10 Mins</span>
											<span class="shout-ban" id="+1 Hour">1 Hour</span>
											<span class="shout-ban" id="+1 Day">1 Day</span><span class="shout-ban" id="0">Forever</span>
										</span>
										<span class="shout-user-opts"><span class="shout-del">Delete</span><span class="ShoutCloud-Admin-Reply">Reply</span></span>
						  			  </div>';
					$dataout['msgs'] .= '<div class="'.(($data['status']=='deleted') ? 'shout-deleted' : 'shout-msg').'" id="shoutid-'.$pos.'">'.
										((utf8_decode($data['user'])==$this->adminUser) ? '' : $adminControls).'<strong id="'.utf8_decode($data['user']).'" 
										class="'.((!empty($data['color'])) ? ' ShoutCloud-Swatch-'.$data['color'] : '').
										((utf8_decode($data['user'])==$this->adminUser) ? ' shout-admin ShoutCloud-Reply">' : ' shout-admin-user" title="Open Admin User Control">')
										.utf8_decode($data['user']).'</strong>'.(($data['time']==0) ? '' : '<em>'.date('g:i:sa',$data['time'])).'</em>'.$this->formatMessage($data['msg']).'</div>';
				   }
				}
			}
		} else {
			foreach($contents as $pos => $data) {
				if($pos > $lastpost) {
					if($data['status']!=='deleted') {
						$dataout['msgs'] .= '<div class="'.(($data['status']=='deleted') ? 'shout-deleted' : 'shout-msg').'" id="shoutid-'.$pos.'">
										 	 <strong id="'.utf8_decode($data['user']).'"'.(((!empty($_SESSION['ShoutCloud-User'])) && ($_SESSION['ShoutCloud-User']==utf8_decode($data['user']))) ? ' class="' : 
											' title="Reply to '.utf8_decode($data['user']).'" class="ShoutCloud-Reply')
										 	.((!empty($data['color'])) ? ' ShoutCloud-Swatch-'.$data['color'] : '').((utf8_decode($data['user'])==$this->adminUser) ? ' shout-admin">' : '">')
											.utf8_decode($data['user']).'</strong>'.(($data['time']==0) ? '' : '<em>'.date('g:i:sa',$data['time'])).'</em>'.$this->formatMessage($data['msg']).'</div>';
					}
				}
			}
		}
		
		if(($output=='html')||($output=='adminhtml')) { $htmlout=''; foreach($dataout as $k => $v) { $htmlout .= $v; } return $htmlout; 
		} else { if(!empty($dataout)) { return $this->jsonEncode($dataout); } else { return $this->jsonEncode(array('msgs' => '')); }
		}
	}
	
	# formatMessage function 
	# Removes bad words and adds smilies
	# Options: [message]
	function formatMessage($msg) {
		$msg = str_ireplace($this->badwords, '****', $msg); foreach($this->smilies as $acii => $img) { $msg = str_ireplace($acii, '<img src="'.$this->smiliesPath.$img.'" width="16" height="16" align="absmiddle" />', $msg); }
		$patterns = array('/([^\w\/])(www\.[a-z0-9\-]+\.[a-z0-9\-]+)/i','/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i','/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?))/i',
						  '~\[@([^\]]*)\]~','~\[([^\]]*)\]~','~{([^}]*)}~','~_([^_]*)_~','/\s{2}/');
		$replacements = array('$1http://$2','<a href=\"$1\">$1</a>','<a href=\"mailto:$1\">$1</a>','<b class="reply">@\\1</b>','<b>\\1</b>','<i>\\1</i>','<u>\\1</u>','<br />');
		$msg = preg_replace($patterns, $replacements, $msg); return stripslashes(stripslashes(utf8_decode($msg)));
	}
	
	# checkUsername function
	# Removes badwords and cleans up a user's name
	# Options: [user's name]
	function checkUsername($name) {
		$bad_usernames = array('admin','Administrator','administrator','ADMIN'); if((empty($_SESSION['ShoutCloud_Admin_Name'])) && (empty($_SESSION['ShoutCloud_Admin_Loggedin']))) { $bad_usernames[] = $this->adminUser; }
		$name = utf8_encode(strip_tags($name)); foreach($bad_usernames as $k=>$n) { if($name==$n) { return false; } } return str_ireplace($this->badwords,'',$name);
		
	}
	
	# addMessage function
	# Cleans and applies new submitted shout
	# Options: [user], [message], [tag color]
	function addMessage($user, $msg, $color) {
		//$user = $this->checkUsername($user); if($user===false) { return $this->jsonEncode(array('error'=>'You cannot use that name!')); }
		if(strlen(utf8_decode($user)) > 50) { return $this->jsonEncode(array('error'=>'Your name is too long!')); } 
		$msg = utf8_encode(addslashes(strip_tags($msg)));
		$user = utf8_encode(addslashes(strip_tags($user)));
		if(strlen($msg) > 500) { return $this->jsonEncode(array('error'=>'Your message is too long! Limit 500 characters.')); }
		if(strpos($msg,'ttp://') > 0 || strpos($msg,'ttps://') > 0 ) { return $this->jsonEncode(array('error'=>'Không spam link lên chatbox nha thím (_ _")')); }
		if((empty($user)) || ($user=='Your Name')) { return $this->jsonEncode(array('error'=>'Please enter your name!')); }
		if((empty($msg)) || ($user=='Message')) { return $this->jsonEncode(array('error'=>'Please enter a message!')); }
		if($this->isBanned($_SERVER['REMOTE_ADDR'])===true) { return $this->jsonEncode(array('error'=>'You are banned from this ShoutBox.')); }
		if((empty($_SESSION['ShoutCloud-User'])) || (!isset($_SESSION['ShoutCloud-User'])) || ($_SESSION['ShoutCloud-User']!==$user)) { $_SESSION['ShoutCloud-User'] = $user; }
		if((empty($_SESSION['ShoutCloud_Tag_Color'])) || ($_SESSION['ShoutCloud_Tag_Color']!==$color)) { $_SESSION['ShoutCloud_Tag_Color'] = $color; }
		$allMsgs = unserialize(file_get_contents($this->msgsFile)); if(empty($_SESSION['ShoutCloud-User-Flood'])) { $_SESSION['ShoutCloud-User-Flood'] = 0; }
		if($_SESSION['ShoutCloud-User-Flood'] > time()) { return $this->jsonEncode(array('error'=>'Please do not spam the messages! Wait 3 seconds in between posts.')); } $_SESSION['ShoutCloud-User-Flood'] = time() + 3;
		$allMsgs[] = array('time' => time(), 'user' => $user, 'msg' => $msg, 'color' => $color, 'ip' => $_SERVER['REMOTE_ADDR']); $totalMsgs = count($allMsgs);
		if($totalMsgs > 30) { $difference = ($totalMsgs - 30); $i=1; $allMsgs = array_reverse($allMsgs, true); while($i <= $difference) { $remove = array_pop($allMsgs); $i++; } $allMsgs = array_reverse($allMsgs, true);
		} else { $difference = 0; } $msgFile = fopen($this->msgsFile, 'w');
		if(fwrite($msgFile, serialize($allMsgs))) { fclose($msgFile); return $this->jsonEncode(array('status' => 'posted')); } else { fclose($msgFile); 
		return $this->jsonEncode(array('error'=>'Your message could not be posted at this time.')); }
	}
	
	# adminLogin function
	# Handles the checking of admin password
	# Options: [user], [password]
	function adminLogin($user, $pass) {
		$pass = htmlentities(strip_tags($pass)); $user = htmlentities(strip_tags($user));
		if($pass == $this->adminPass)  { $_SESSION['ShoutCloud_Admin_Name'] = $user; $_SESSION['ShoutCloud_Admin_Loggedin'] = 'true'; return $this->jsonEncode(array('status'=>'loggedin'));
		} else { return $this->jsonEncode(array('error'=>'Incorrect Username and/or Password!')); }
	}
	
	# adminLogout function
	# Handles logging out of an admin account
	# Options: none
	function adminLogout() { unset($_SESSION['ShoutCloud_Admin_Name']); unset($_SESSION['ShoutCloud_Admin_Loggedin']); return $this->jsonEncode(array('status'=>'loggedout')); }
	
	# isAdmin function
	# Checks if user is an admin
	# Options: none
	function isAdmin() { if((!empty($_SESSION['ShoutCloud_Admin_Name']))&&(!empty($_SESSION['ShoutCloud_Admin_Loggedin']))) { return true; } else { $this->jsonEncode(array('error'=>'You are not an Administrator!')); } }
	
	# banUser function
	# Handles user bans by admins
	# Options: [user's name], [ip address], [expire time]
	function banUser($name, $ip, $expire) {
		$allBans = file_get_contents($this->bansFile); $bans = fopen($this->bansFile, 'w+'); if(!is_writable($this->bansFile)) { chmod($this->bansFile, 0666); }
		$allBans = (filesize($this->bansFile)==0) ? array() : unserialize($allBans); $expire = ((empty($expire)) || ($expire==0)) ? 0 : strtotime($expire); $allBans[$name] = array('name' => $name, 'expire' => $expire);
		fwrite($bans, serialize($allBans)); fclose($bans); return $this->jsonEncode(array('status'=>'banned'));
	}
	
	# unbanUser function
	# Handles unbanning users
	# Options: [ip address], [type]
	function unbanUser($name,$type='box') {
		$allBans = file_get_contents($this->bansFile); $bans = fopen($this->bansFile, 'w+'); if(!is_writable($this->bansFile)) { chmod($this->bansFile, 0666); }
		$allBans = (filesize($this->bansFile)==0) ? array() : unserialize($allBans); if(array_key_exists($name, $allBans)) { unset($allBans[$name]); }
		fwrite($bans, serialize($allBans)); fclose($bans); if($type == 'box') { return $this->jsonEncode(array('status'=>'removed')); }
	}
	
	# isBanned function
	# Checks if user's IP is banned by an admin
	# Options: [ip address]
	function isBanned($name) {
		$bans = fopen($this->bansFile, 'a+'); if(!is_writable($this->bansFile)) { chmod($this->bansFile, 0666); }
		if(filesize($this->bansFile)>0) { $allBans = unserialize(fread($bans, filesize($this->bansFile))); fclose($bans);
			if(array_key_exists($name, $allBans)) { if(($allBans[$name]['expire'] !== 0) && ($allBans[$name]['expire'] < time())) { $this->unbanUser($name,'internal'); return false; } return true; } else {  return false; }
		}
	}
	
	# deleteMessage function
	# Deletes specific message from the shout box
	# Options: [shout id]
	function deleteMessage($id) {
		$allMsgs = unserialize(file_get_contents($this->msgsFile)); $id = str_ireplace('shoutid-','',$id);
		$allMsgs[$id] = array('time' => time(), 'user' => $user, 'msg' => $msg, 'color' => $color, 'ip' => $_SERVER['REMOTE_ADDR'], 'status' => 'deleted'); $msgFile = fopen($this->msgsFile, 'w');
		if(fwrite($msgFile, serialize($allMsgs))) { fclose($msgFile); return $this->jsonEncode(array('status'=>'deleted')); } else { 
		fclose($msgFile); return $this->jsonEncode(array('error'=>'Unable to delete that message. Please try again.'));
		}
	}
	
	# clearShoutbox function
	# Clears all the messages from the shoutbox
	# Options: none
	function clearShoutbox() {
		$msgFile = fopen($this->msgsFile, 'w+'); fwrite($msgFile, serialize((array(0=>array('time' => 0, 'user' => '', 'msg' => 'Chatbox vá»«a ÄÆ°á»£c dá»n dáº¹p bá»i admin.')))));
		fclose($msgFile); return $this->jsonEncode(array('status'=>'cleared'));
	}
	
	# formatTime function
	# Formats time for the Ban List
	# Options: [timestamp]
	function formatTime($ts) {
		$current = time(); $seconds = $ts-$current; if($seconds < 1) { return false; }
		switch($seconds) {
			case($seconds < 60): $unit=$var=$seconds; $var.=" second"; break;
			case($seconds < 3600): $unit=$var=round($seconds/60); $var.=" minute"; break;
			case($seconds < 86400): $unit=$var=round($seconds/3600); $var.=" hour"; break;
			case($seconds < 2629744): $unit=$var=round($seconds/86400); $var.=" day"; break;
			case($seconds < 31556926): $unit=$var=round($seconds/2629744); $var.=" month"; break;
			default: $unit=$var=round($seconds/31556926); $var.=" year";
		}
		if($unit > 1) {  $var.="s"; } return $var;
	}
	
	function jsonEncode($var) { return json_encode($var); }
	
	
}
?>