<?php /* Smarty version 2.6.6, created on 2014-04-09 06:54:18
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'header.tpl', 127, false),array('insert', 'get_member_profilepicture', 'header.tpl', 130, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="<?php echo $this->_tpl_vars['lang254']; ?>
" dir="LTR">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<title><?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  if ($this->_tpl_vars['metadescription'] != ""):  echo $this->_tpl_vars['metadescription']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
">
<meta name="keywords" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
,<?php endif;  if ($this->_tpl_vars['metakeywords'] != ""):  echo $this->_tpl_vars['metakeywords']; ?>
,<?php endif;  echo $this->_tpl_vars['site_name']; ?>
">
<meta name="title" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
" />

<meta property="og:title" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
"/>
<meta property="og:site_name" content="<?php echo $this->_tpl_vars['site_name']; ?>
"/>
<?php if ($this->_tpl_vars['p']['pic'] != ""): ?>
<meta property="og:url" content="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/"/>
<?php elseif ($this->_tpl_vars['p']['youtube_key'] != ""): ?>
<meta property="og:url" content="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/"/>
<?php else: ?>
<meta property="og:url" content="<?php echo $this->_tpl_vars['baseurl']; ?>
/"/>
<?php endif; ?>
<meta property="og:description" content="<?php echo $this->_tpl_vars['metadescription']; ?>
"/>
<meta property="og:type" content="blog" />
<?php if ($this->_tpl_vars['p']['pic'] != ""): ?>
<meta property="og:image" content="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['p']['pic']; ?>
" />
<?php elseif ($this->_tpl_vars['p']['youtube_key'] != ""): ?>
<meta property="og:image" content="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['p']['youtube_key']; ?>
/0.jpg" />
<?php else: ?>
<meta property="og:image" content="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/image.png" />
<?php endif; ?>
<meta property="fb:app_id" content="<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
"/>

<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/main.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/style.css?v=0820" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/additional.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/profile.css?v=081622" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/top_overs.css" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/slide/jquery.bxslider.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
    <!--<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/ipos.main.js"></script>-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/fancybox/lib/jquery-1.9.1.min.js"></script>
<!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.scrollTo-1.4.2-min.js"></script>
<!--<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/mootools-yui-compressed.js"></script>-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.lazyload.pack.js"></script>
<?php if ($this->_tpl_vars['RSS'] == '1'): ?>
<link rel="alternate" type="application/rss+xml" title="RSS - <?php echo $this->_tpl_vars['site_name']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/rss.php" />
<?php endif; ?>


<!--<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/ipos.jq.js"></script>-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/slide/jquery.bxslider.min.js"></script>
<script type="text/javascript">
	var ROOT_DOMAIN		=	'http://myfancy.org';
	var APP_FACEBOOK 	= 	'287482141376893';
</script>
<?php echo '
<script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-4579652-1\', \'myfancy.org\');
  ga(\'send\', \'pageview\');

</script>
'; ?>

<?php echo '
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"o1jSi1a8Dy00yv", domain:"myfancy.org",dynamic: true};
(function() { var as = document.createElement(\'script\'); as.type = \'text/javascript\'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName(\'script\')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=o1jSi1a8Dy00yv" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

'; ?>

</head>
<body id="page-landing" class="main-body ">
<div id="fb-root"></div>
<?php if ($this->_tpl_vars['enable_fc'] == '1'):  if ($_SESSION['language'] == 'vi'):  echo '
<script src="http://connect.facebook.net/vi_VN/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe(\'auth.login\', function(response) {
    window.location.reload();
  });	  
</script>
'; ?>

<?php else:  echo '
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe(\'auth.login\', function(response) {
    window.location.reload();
  });
</script>
'; ?>

<?php endif;  endif; ?>
<div id="tmp-img" style="display:none"></div>
<?php echo '
<script type="text/javascript"> 
function rmt(l) { var img = new Image(); img.src = l; document.getElementById(\'tmp-img\').appendChild(img); } 
function myWindow(location, address, gaCategory, gaAction, entryLink) { var w = 640; var h = 460; var sTop = window.screen.height/2-(h/2); var sLeft = window.screen.width/2-(w/2); var sharer = window.open(address, "Share on Facebook", "status=1,height="+h+",width="+w+",top="+sTop+",left="+sLeft+",resizable=0"); }
</script>
'; ?>

<div id="header">
	<div class="wauto">
<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
" class="logo"> </a>
           <form action="<?php echo $this->_tpl_vars['baseurl']; ?>
/search">
       <div class="search"><input id="sitebar_search_header" type="text" class="search search_input" name="query" tabindex="1" placeholder="<?php echo $this->_tpl_vars['lang189']; ?>
"/>
                    </form></div>
        <ul class="buser">
            <li class="z"><a href="/comic">Chế comic</a></li>
            <li class="z k"><a href="/topusers">Top Thành Viên</a></li>      
<li class="z v"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit"><s class="upload"></s>Đăng bài</a></li>
                  <div id="headerRight">		

<?php if ($_SESSION['USERID'] != ""): ?>			
			<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/messages" class="notiButton" title="Tin nhắn"></a>
			<div class="avatar noNoti">
				<a id="profile-username" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="avatarLink" title="<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $_SESSION['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

				<img src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php echo $this->_tpl_vars['profilepicture']; ?>
?<?php echo time(); ?>
" width="40px" height="40px" />
				</a>
				<ul>
					<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">Ảnh của bạn</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/settings"><?php echo $this->_tpl_vars['lang45']; ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/logout"><?php echo $this->_tpl_vars['lang198']; ?>
</a></li>
			</ul>
			</div>
			<?php else: ?>
<li class="login"><div id="_login" class="uibutton-group">
		<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><s class="uibutton-group"></s>Đăng nhập</a></li>	
			</div>
			<?php endif; ?>
		</div>
</ul>
    </div>
</div>
<?php echo '
<script type="text/javascript" >
    $(document).ready(function(){


        $(function () {

            $(window).scroll(function () {

                if ($(this).scrollTop() > 20) {

                    $(\'#nav\').css("position","fixed").css("top","0").css("box-shadow","0 2px 4px #333");

                }

                else{

                    $(\'#nav\').css("position","relative").css("box-shadow","none");

                }

            });

        });

    });

</script>
'; ?>


<div id="nav">
<div id="menuBar">
<div class="myfancyorg">
    	<li<?php if ($this->_tpl_vars['menu'] == 1): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/trending"><?php echo $this->_tpl_vars['lang173']; ?>
</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 2): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/hot"><?php echo $this->_tpl_vars['lang172']; ?>
</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 3): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/vote"><?php echo $this->_tpl_vars['lang174']; ?>
</a></li>
                        <li<?php if ($this->_tpl_vars['menu'] == 4): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/tag/anh-dep">&#7842;nh &#273;&#7865;p</a></li>

<li<?php if ($this->_tpl_vars['menu'] == 5): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/girls-xinh">Girl xinh</a></li>
<li<?php if ($this->_tpl_vars['menu'] == 6): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/tin-hot">Tin hot</a></li>
<li<?php if ($this->_tpl_vars['menu'] == 7): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/anh-bua-18-+">Ảnh bựa</a></li>
<li<?php if ($this->_tpl_vars['menu'] == 8): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/hinh-anh">&#7842;nh vui</a></li>
<li<?php if ($this->_tpl_vars['menu'] == 9): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/video-clip">Video clip</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 11): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top-posts"><?php echo $this->_tpl_vars['lang278']; ?>
</a></li>
<li<?php if ($this->_tpl_vars['menu'] == 11): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/kiem-tien-online.html"><?php echo $this->_tpl_vars['lang67']; ?>
</a></li>
		   </ul>
</div>
</div>	
		<div class="clear"></div>
	</div>
</div>
<?php echo '
<script type="text/javascript">
$(\'.searchButton\').click(function(){
    $(\'#header_searchbar\').toggle(\'slow\');
    });
</script>
'; ?>
              
<div id="container">
<?php if ($this->_tpl_vars['viewpage'] == '1'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'js1.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  else:  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>