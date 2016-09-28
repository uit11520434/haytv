<?php

$config = array();

// Bắt đầu cấu hình
$config['basedir']     =  '/home/myfancy/public_html';   //Đường đẫn đến thư mục chứa mã nguồn

$config['baseurl']     =  'http://myfancy.org';   //Liên kết đến thư mục chứa mã nguồn
$config['domain']      =  'http://myfancy.org/';   //Domain của website
$config['license']     =  '15a9bd52-38045634-77d4a4e4-21a221d6';   //Mã đăng ký

$DBTYPE     = 'mysql';
$DBHOST     = 'localhost';   //Tên máy chủ cơ sở dữ liệu
$DBUSER     = 'myfancy_data';   //Tên đăng nhập cơ sở dữ liệu
$DBPASSWORD = 'http://myfancy.org';   //Mật khẩu kết nối cơ sở dữ liệu
$DBNAME     = 'myfancy_data';   //Tên cơ sở dữ liệu

//Tuần
$date1 = date('Y-m-d', strtotime('Last Monday', time()));
$date2 = date('Y-m-d', strtotime('Sunday', time()));

//Tháng
$date3 = date('Y-m', time()).'-1';
$date4 = date('Y-m-t', time());


$default_language = "vi"; //Bạn có thể chọn en
// Kết thúc cấu hình

$config['allowhtml']=false; //--Cho phép nhap ma HTML vao thong diep ko ?
$config['email']='quockiencoltd@gmail.com'; //--Email nguoi nhan thong tin lien he
$config['fields']['fullname']='Họ tên';
$config['fields']['phone']='SĐT';
$config['fields']['address']='Địa chỉ';
//--Có thể thêm field mới tùy ý

session_start();

$config['adminurl']      =  $config['baseurl'].'/admin';
$config['cssurl']      =  $config['baseurl'].'/css';
$config['imagedir']      =  $config['basedir'].'/images';
$config['imageurl']      =  $config['baseurl'].'/images';
$config['membersprofilepicdir']      =  $config['imagedir'].'/avatar';
$config['membersprofilepicurl']      =  $config['imageurl'].'/avatar';
$config['pdir'] = $config['basedir'].'/pdata';
$config['purl'] = $config['baseurl'].'/pdata';
require_once($config['basedir'].'/smarty/libs/Smarty.class.php');
require_once($config['basedir'].'/libraries/mysmarty.class.php');
require_once($config['basedir'].'/libraries/SConfig.php');
require_once($config['basedir'].'/libraries/SError.php');
require_once($config['basedir'].'/libraries/adodb/adodb.inc.php');
require_once($config['basedir'].'/libraries/phpmailer/class.phpmailer.php');
require_once($config['basedir'].'/libraries/SEmail.php');
function strip_mq_gpc($arg)
{
  if (get_magic_quotes_gpc())
  {
  	$arg = str_replace('"',"'",$arg);
  	$arg = stripslashes($arg);
    return $arg;
  }
  else
  {
    $arg = str_replace('"',"'",$arg);
    return $arg;
  }
}
$conn = &ADONewConnection($DBTYPE);
$conn->PConnect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
@mysql_query("SET NAMES 'UTF8'");
$sql = "SELECT * from config";
$rsc = $conn->Execute($sql);
if($rsc){while(!$rsc->EOF)
{
$field = $rsc->fields['setting'];
$config[$field] = $rsc->fields['value'];
STemplate::assign($field, strip_mq_gpc($config[$field]));
@$rsc->MoveNext();
}}
if($config['mobilemode'] == "1" && $config['m_url'] != "")
{
	if($mobile != "1")
	{
		include("mobile.php");
		$mcheck = is_md();
		if($mcheck != "")
		{
			header("Location: ".$config['m_url']);exit;
		}
	}
}
STemplate::assign('baseurl',       $config['baseurl']);
STemplate::assign('basedir',       $config['basedir']);
STemplate::assign('adminurl',       $config['adminurl']);
STemplate::assign('cssurl',       $config['cssurl']);
STemplate::assign('imagedir',        $config['imagedir']);
STemplate::assign('imageurl',        $config['imageurl']);
STemplate::assign('membersprofilepicdir',        $config['membersprofilepicdir']);
STemplate::assign('membersprofilepicurl',        $config['membersprofilepicurl']);
STemplate::assign('pdir', $config['pdir']);
STemplate::assign('purl', $config['purl']);
STemplate::setCompileDir($config['basedir']."/temporary");
$theme = $config['theme'];
STemplate::setTplDir($config['basedir']."/themes");
if ($_REQUEST['language'] != "")
{
	if ($_REQUEST['language'] == "vi")
	{
		$_SESSION['language'] = "vi";
	}
	elseif ($_REQUEST['language'] == "en")
	{
		$_SESSION['language'] = "en";
	}
}
if ($_SESSION['language'] == "")
{
	$_SESSION['language'] = $default_language;
}

if ($_SESSION['language'] == "vi")
{
	include("lang/vi.php");
}
elseif ($_SESSION['language'] == "en")
{
	include("lang/en.php");
}
else
{
	include("lang/".$default_language.".php");
}
for ($i=0; $i<count($lang); $i++)
{
	STemplate::assign('lang'.$i, $lang[$i]);
}
if($sban != "1")
{
	$bquery = "SELECT count(*) as total from bans_ips WHERE ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'";
	$bresult = $conn->execute($bquery);
	$bcount = $bresult->fields['total'];
	if($bcount > "0")
	{
		$brdr = $config['baseurl']."/banned.php";
		header("Location:$brdr");
		exit;
	}
}
function create_slrememberme() {
        $key = md5(uniqid(rand(), true));
        global $conn;
        $sql="update members set remember_me_time='".date('Y-m-d H:i:s')."', remember_me_key='".$key."' WHERE username='".mysql_real_escape_string($_SESSION[USERNAME])."'";
        $conn->execute($sql);
        setcookie('slrememberme', gzcompress(serialize(array($_SESSION[USERNAME], $key)), 9), time()+60*60*24*30);
}
function destroy_slrememberme($username) {
        if (strlen($username) > 0) {
                global $conn;
                $sql="update members set remember_me_time=NULL, remember_me_key=NULL WHERE username='".mysql_real_escape_string($username)."'";
                $conn->execute($sql);
        }
        setcookie ("slrememberme", "", time() - 3600);
}
if (!isset($_SESSION["USERNAME"]) && isset($_COOKIE['slrememberme']))
{
        $sql="update members set remember_me_time=NULL and remember_me_key=NULL WHERE remember_me_time<'".date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")))."'";
        $conn->execute($sql);
        list($username, $key) = @unserialize(gzuncompress(stripslashes($_COOKIE['slrememberme'])));
        if (strlen($username) > 0 && strlen($key) > 0)
		{
        	$sql="SELECT status,USERID,email,username,verified,filter from members WHERE username='".mysql_real_escape_string($username)."' and remember_me_key='".mysql_real_escape_string($key)."'";
          	$rs=$conn->execute($sql);
          	if($rs->recordcount()<1)
			{
				$error=$lang['224'];
			}
		    elseif($rs->fields['status'] == "0")
			{
				$error = $lang['225'];
			}
    		if($error=="")
			{
				SESSION_REGISTER("USERID");$_SESSION[USERID]=$rs->fields['USERID'];
				SESSION_REGISTER("EMAIL");$_SESSION[EMAIL]=$rs->fields['email'];
				SESSION_REGISTER("USERNAME");$_SESSION[USERNAME]=$rs->fields['username'];
				SESSION_REGISTER("VERIFIED");$_SESSION[VERIFIED]=$rs->fields['verified'];
				SESSION_REGISTER("FILTER");$_SESSION[FILTER]=$rs->fields['filter'];
      			create_slrememberme();
        	}
			else
			{
                destroy_slrememberme($username);
        	}
        }
}
function generateCode($length)
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

function smiley($text) {

		$s2 = "<img src='".$config['baseurl']."/images/emo/"; //Path to images folder
		$sm = "' />"; // Extension of the images (All images must be the same extension)
		$array = array(
			  ':))'=>$s2.'21.gif'.$sm
			, ':-SS'=>$s2.'42.gif'.$sm
			, ':-ss'=>$s2.'42.gif'.$sm,
			 ':-Ss'=>$s2.'42.gif'.$sm
			, ':-sS'=>$s2.'42.gif'.$sm
			, '>:p'=>$s2.'47.gif'.$sm
			, '>:P'=>$s2.'47.gif'.$sm
                         , '114'=>$s2.'fight.gif'.$sm
                         , '113'=>$s2.'78.gif'.$sm
                         , '112'=>$s2.'high_five.gif'.$sm
                        , '111'=>$s2.'55.gif'.$sm
                        , '<):)'=>$s2.'48.gif'.$sm
			, ':)]'=>$s2.'100.gif'.$sm
			, '>:D<'=>$s2.'6.gif'.$sm
			, '>:d<'=>$s2.'6.gif'.$sm
			, '>:)'=>$s2.'19.gif'.$sm
			, ':d'=>$s2.'4.gif'.$sm
			, ':D'=>$s2.'4.gif'.$sm
			, '=))'=>$s2.'24.gif'.$sm
			, ';;)'=>$s2.'5.gif'.$sm
			, '/:)'=>$s2.'23.gif'.$sm
			, ':)'=>$s2.'1.gif'.$sm
			, ':(('=>$s2.'20.gif'.$sm
			, ':P'=>$s2.'10.gif'.$sm
			, ':p'=>$s2.'10.gif'.$sm
			, ':('=>$s2.'2.gif'.$sm
			, ';))'=>$s2.'71.gif'.$sm
			, ' ;) '=>$s2.'3.gif'.$sm
			, ':-/'=>$s2.'7.gif'.$sm
			, ':">'=>$s2.'9.gif'.$sm
			, ':")'=>$s2.'9.gif'.$sm
			, ':X'=>$s2.'8.gif'.$sm
			, ':x'=>$s2.'8.gif'.$sm
			, ':-*'=>$s2.'11.gif'.$sm
			, '=(('=>$s2.'12.gif'.$sm
			, ':-O'=>$s2.'13.gif'.$sm
			, ':-o'=>$s2.'13.gif'.$sm
			, 'X('=>$s2.'14.gif'.$sm
			, 'x('=>$s2.'14.gif'.$sm
			, ':>'=>$s2.'15.gif'.$sm
			, 'B-)'=>$s2.'16.gif'.$sm
			, 'b-)'=>$s2.'16.gif'.$sm
			, '#:-s'=>$s2.'18.gif'.$sm
			, '#:-S'=>$s2.'18.gif'.$sm
			, ':-S'=>$s2.'17.gif'.$sm
			, ':-s'=>$s2.'17.gif'.$sm
			, 'O:-)'=>$s2.'25.gif'.$sm
			, 'o:-)'=>$s2.'25.gif'.$sm
			, ':-b'=>$s2.'26.gif'.$sm
			, ':-B'=>$s2.'26.gif'.$sm
			, '=;'=>$s2.'27.gif'.$sm
			, ':-C'=>$s2.'27.gif'.$sm
			, ':-c'=>$s2.'27.gif'.$sm
			, ':-h'=>$s2.'103.gif'.$sm
			, ':-H'=>$s2.'103.gif'.$sm
			, ':-t'=>$s2.'104.gif'.$sm
			, ':-T'=>$s2.'104.gif'.$sm
			, '8->'=>$s2.'105.gif'.$sm
			, 'i-)'=>$s2.'28.gif'.$sm
			, 'I-)'=>$s2.'28.gif'.$sm
			, '8-|'=>$s2.'29.gif'.$sm
			, 'L-)'=>$s2.'30.gif'.$sm
			, 'l-)'=>$s2.'30.gif'.$sm
			, ':-&'=>$s2.'31.gif'.$sm
			, ':-$'=>$s2.'32.gif'.$sm
			, '[-('=>$s2.'33.gif'.$sm
			, ':o)'=>$s2.'34.gif'.$sm
			, ':O)'=>$s2.'34.gif'.$sm
			, '8-}'=>$s2.'35.gif'.$sm
			, '<:-P'=>$s2.'36.gif'.$sm
			, '<:-p'=>$s2.'36.gif'.$sm
			, '(:|'=>$s2.'37.gif'.$sm
			, ':-?'=>$s2.'39.gif'.$sm
			, '#-O'=>$s2.'40.gif'.$sm
			, '#-o'=>$s2.'40.gif'.$sm
			, '=d>'=>$s2.'41.gif'.$sm
			, '=D>'=>$s2.'41.gif'.$sm
			, ':-SS'=>$s2.'42.gif'.$sm
			, ':-ss'=>$s2.'42.gif'.$sm
			, ':-Ss'=>$s2.'42.gif'.$sm
			, ':-sS'=>$s2.'42.gif'.$sm
			, '@-)'=>$s2.'43.gif'.$sm
			, ':^O'=>$s2.'44.gif'.$sm
			, ':^o'=>$s2.'44.gif'.$sm
			, ':-w'=>$s2.'45.gif'.$sm
			, ':-W'=>$s2.'45.gif'.$sm
			, ':-<'=>$s2.'46.gif'.$sm
			, ':|'=>$s2.'22.gif'.$sm
			, '=P~'=>$s2.'38.gif'.$sm
			, ':v'=>$s2.'fb_pacman.png'.$sm
			, '(Y)'=>$s2.'fb_thumb.png'.$sm
			, '^_^'=>$s2.'fb_kiki.png'.$sm
			, '<3'=>$s2.'fb_heart.png'.$sm
			, ':3'=>$s2.'fb_curlylips.png'.$sm
			, ':-j'=>$s2.'78.gif'.$sm
			//To add a new emo just uncomment the next line:
			// , 'TEXT SYMBOL HERE'=>$s2.'NAME.gif'.$sm
			// Tip: NAME = the name of the image to replace the text. Enter the name without extension


		);
		return str_replace(array_keys($array), array_values($array), stripslashes($text));
}

if($config['enable_fc'] == "1")
{
	if($_SESSION['USERID'] == "")
	{
		$A = $config['FACEBOOK_APP_ID'];
		$B = $config['FACEBOOK_SECRET'];
		define('FACEBOOK_APP_ID', $A);
		define('FACEBOOK_SECRET', $B);
		STemplate::assign('FACEBOOK_APP_ID',$A);
		STemplate::assign('FACEBOOK_SECRET',$B);

		function get_facebook_cookie($app_id, $application_secret) {
		  $args = array();
		  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
		  ksort($args);
		  $payload = '';
		  foreach ($args as $key => $value) {
			if ($key != 'sig') {
			  $payload .= $key . '=' . $value;
			}
		  }
		  if (md5($payload . $application_secret) != $args['sig']) {
			return null;
		  }
		  return $args;
		}

		$code = $_REQUEST['code'];
		if($code != "")
		{
			if($mobile == "1"){$my_url = $config['m_url']."/";}else{$my_url = $config['baseurl']."/";}
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			. "client_id=" . $A . "&redirect_uri=" . urlencode($my_url)
			. "&client_secret=" . $B . "&code=" . $code;
			$response = @file_get_contents($token_url);
			$params = null;
			parse_str($response, $params);
			$graph_url = "https://graph.facebook.com/me?access_token="
			. $params['access_token'];
			$user = json_decode(file_get_contents($graph_url));
			$fname = htmlentities(strip_tags($user->name), ENT_COMPAT, "UTF-8");
			$femail = htmlentities(strip_tags($user->email), ENT_COMPAT, "UTF-8");
			$fid = htmlentities(strip_tags($user->id), ENT_COMPAT, "UTF-8");
			$fusername = htmlentities(strip_tags($user->username), ENT_COMPAT, "UTF-8");

			$query="SELECT USERID FROM members WHERE email='".mysql_real_escape_string($femail)."' OR username='".mysql_real_escape_string($fusername)."' limit 1";
			$executequery=$conn->execute($query);
			$FUID = intval($executequery->fields['USERID']);
			if($FUID > 0)
			{
				$query="SELECT USERID,email,username,verified, filter from members WHERE USERID='".mysql_real_escape_string($FUID)."' and status='1'";
				$result=$conn->execute($query);
				if($result->recordcount()>0)
				{
					$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE USERID='".mysql_real_escape_string($FUID)."'";
					$conn->execute($query);
					$_SESSION['USERID']=$result->fields['USERID'];
					$_SESSION['EMAIL']=$result->fields['email'];
					$_SESSION['USERNAME']=$result->fields['username'];
					$_SESSION['VERIFIED']=$result->fields['verified'];
					$_SESSION['FILTER']=$result->fields['filter'];
					$_SESSION['FB']="1";
					$redirect = $_SESSION['location'];
					if($redirect == "")
					{
						if ( $config[regredirect] == 1)
						{header("Location:$config[baseurl]/index.php".$addlang);exit;}
						else
						{header("Location:$config[baseurl]/settings".$addlang);exit;}
					}
					else
					{
						header("Location:".$config[baseurl].$redirect);exit;
					}
					$_SESSION['location'] = "";
				}
			}
			else
			{
				$md5pass = md5(generateCode(5).time());

				if($fusername != "")
				{
					$query="INSERT INTO members SET email='".mysql_real_escape_string($femail)."', username='".mysql_real_escape_string($fusername)."', password='".mysql_real_escape_string($md5pass)."', fullname='".mysql_real_escape_string($fname)."', addtime='".time()."', lastlogin='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."', verified='1'";
					$result=$conn->execute($query);
					$userid = mysql_insert_id();
					$profilepicture = $userid.".jpg";
					$query="update members set profilepicture='".$profilepicture."' WHERE USERID='".mysql_real_escape_string($userid)."'";
					$result=$conn->execute($query);
					$img = file_get_contents('https://graph.facebook.com/'.$fid.'/picture?width=160&height=160');
					$file = $config['membersprofilepicdir'].'/'.$userid.'.jpg';
					file_put_contents($file, $img);

					if($userid != "" && is_numeric($userid) && $userid > 0)
					{
						$query="SELECT USERID,email,username,verified, filter from members WHERE USERID='".mysql_real_escape_string($userid)."'";
						$result=$conn->execute($query);

						$SUSERID = $result->fields['USERID'];
						$SEMAIL = $result->fields['email'];
						$SUSERNAME = $result->fields['username'];
						$SVERIFIED = $result->fields['verified'];
						$SFILTER = $result->fields['filter'];
						$_SESSION['USERID']=$SUSERID;
						$_SESSION['EMAIL']=$SEMAIL;
						$_SESSION['USERNAME']=$SUSERNAME;
						$_SESSION['VERIFIED']=$SVERIFIED;
						$_SESSION['FILTER']=$SFILTER;
						$_SESSION['FB']="1";
						$redirect = $_SESSION['location'];
					if($redirect == "")
					{
						if ( $config[regredirect] == 1)
						{header("Location:$config[baseurl]/index.php".$addlang);exit;}
						else
						{header("Location:$config[baseurl]/settings".$addlang);exit;}
					}
					else
					{
						header("Location:".$config[baseurl].$redirect);exit;
					}
					$_SESSION['location'] = "";

					}
				}
			}
		}
	}

	/*
	function getCurrentPageUrl()
	{
		 static $pageURL = '';
		 if(empty($pageURL)){
			  $pageURL = 'http';
			  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')$pageURL .= 's';
			  $pageURL .= '://';
			  if($_SERVER['SERVER_PORT'] != '80')$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
			  else $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		 }
		 return $pageURL;
	}
	if($_SESSION['USERNAME'] == "" && $_SESSION['FB'] == "1")
	{
		$url = getCurrentPageUrl();
		$myurl = $config['baseurl']."/connect.php";
		$cssurl = $config['baseurl']."/css/connect.css";
		if(($url != $myurl) && ($url != $cssurl))
		{
			header("Location:$config[baseurl]/connect.php");exit;
		}
	}*/
}
if($lskip != "1")
{
	if($_SESSION['USERID'] != "" && $_SESSION['EMAIL'] != "")
	{
		if($_SESSION['USERNAME'] == "")
		{
			header("Location:$config[baseurl]/selectusername.php");exit;
		}
	}
}

$topquery = "SELECT * FROM members WHERE verified='1' AND username!='' order by posts desc limit 10";
$executetopquery = $conn->Execute($topquery);
$top = $executetopquery->getrows();
STemplate::assign('top',$top);
?>