<?php /* Smarty version 2.6.6, created on 2013-12-22 11:46:13
         compiled from head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_member_profilepicture', 'head.tpl', 113, false),array('modifier', 'stripslashes', 'head.tpl', 114, false),)), $this); ?>
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
/css/style_v2.css?v=0820" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/additional.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/top_overs.css" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/main.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/like/autolike.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/ckeditor/ckeditor.js"></script>
<!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.scrollTo-1.4.2-min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.lazyload.pack.js"></script>
<?php if ($this->_tpl_vars['RSS'] == '1'): ?>
<link rel="alternate" type="application/rss+xml" title="RSS - <?php echo $this->_tpl_vars['site_name']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/rss.php" />
<?php endif; ?>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/ipos.main.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/ipos.jq.js"></script>
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

  ga(\'create\', \'UA-45796152-1\', \'myfancy.org\');
  ga(\'send\', \'pageview\');

</script>
'; ?>

</head>
<body id="page-landing" class="main-body " >
<div id="tmp-img" style="display:none"></div>
<div id="overlay-popup" style="background-color: rgb(0, 0, 0); opacity: 0.94; position: absolute; top: 0px; left: 0px; z-index: 332; width: 100%; height: 6657px;" class="hide"> </div>
<div id="head-wrapper">

    <div id="searchbar_container">
        <div id="searchbar_wrapper">
            <div id="header_searchbar"  style="display:none;">
                <div id="search_wrapper">
                    <form action="<?php echo $this->_tpl_vars['baseurl']; ?>
/search">
                        <input id="sitebar_search_header" type="text" class="search search_input" name="query" tabindex="1" placeholder="<?php echo $this->_tpl_vars['lang189']; ?>
"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="head-bar">
        <h1><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/"><?php echo $this->_tpl_vars['site_name']; ?>
</a></h1>
        <ul class="main-menu" style="overflow:visible">            
            <li><a class="<?php if ($this->_tpl_vars['menu'] == 1): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/tag/nhạc-hay"><?php echo $this->_tpl_vars['lang201']; ?>
</a></li>
			<li><a class="<?php if ($this->_tpl_vars['menu'] == 5): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/tag/anh-dep">Ảnh đẹp</a></li>
            <li><a class="<?php if ($this->_tpl_vars['menu'] == 2): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/chemgio">Truyện cười</a></li>
			<li><a class="<?php if ($this->_tpl_vars['menu'] == 10): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/tinhot">Báo hay</a></li>
			<li><a class="<?php if ($this->_tpl_vars['menu'] == 9): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/tamsu">Tâm sự</a></li>
			<li><a class="<?php if ($this->_tpl_vars['menu'] == 11): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/friends">Kết bạn</a></li>
			<li><a class="<?php if ($this->_tpl_vars['menu'] == 12): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/comic/">Chế ảnh</a></li>

            <li><a class="add-post <?php if ($this->_tpl_vars['menu'] == 3): ?>current<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit" onclick="_gaq.push(['_trackEvent', 'New-Post', 'Clicked', 'Headbar', 1]);">Ðăng bài</a></li>            
        </ul>
			
		
        <ul class="main-2-menu">	
			
            <?php if ($_SESSION['USERID'] != ""): ?>
			<li>
				<a title="Thông báo" class="<?php if ($this->_tpl_vars['noticount'] > 0): ?>noti_count_new<?php else: ?>noti_count<?php endif; ?>" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/notifications"><?php echo $this->_tpl_vars['noticount']; ?>
</a>
			</li>
            <li>
                <?php echo '
                <script type="text/javascript">
                function loadContent(elementSelector, sourceURL) {
                $(""+elementSelector+"").load(""+sourceURL+"");
                }
                </script>
                '; ?>

                </div>
                <div id="profile-menu" class="profile-menu">
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $_SESSION['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

				<img src="https://graph.facebook.com/<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/picture?width=30&height=30">
				</a>
                <ul>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/settings"><?php echo $this->_tpl_vars['lang45']; ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/logout"><?php echo $this->_tpl_vars['lang198']; ?>
</a></li>
                </ul>
                </div>
            </li>
            <?php else: ?>         
            <!--<li id="side-bar-signup">
			<a class="signup-button green" label="LoginFormFacebookButton" next="" href="https://www.facebook.com/dialog/permissions.request?app_id=<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
&display=page&next=<?php echo $this->_tpl_vars['baseurl']; ?>
/&response_type=code&fbconnect=1&perms=email,user_birthday,user_about_me"><?php echo $this->_tpl_vars['lang14']; ?>
</a>
            <a class="signup-button green" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/signup" label="Header"><?php echo $this->_tpl_vars['lang148']; ?>
</a>
            </li>  -->          
            <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login?m=<?php echo $this->_tpl_vars['eurl']; ?>
" class="button">Ðăng Nhập (Tắt quảng cáo)</a></li>            
            <?php endif; ?>
			
            <li><a title="<?php echo $this->_tpl_vars['lang196']; ?>
" class="random-button" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" id="rand-but"><strong>&nbsp;</strong></a></li>
            
        </ul>
		<!--
		<div class="search-bar" style="float:right; background-color: transparent !important;border: medium none !important; margin-bottom:10px; padding: 0 !important;box-shadow: none !important;margin: 11px;">
				<form id="searchbar" action="<?php echo $this->_tpl_vars['baseurl']; ?>
/search" method="get">
					<div class="field search">
						<input id="page_search" type="text" name="query" class="search search_input" value="<?php echo $this->_tpl_vars['query']; ?>
" placeholder="<?php echo $this->_tpl_vars['lang190']; ?>
" style="width:225px !important;box-shadow: none !important;padding: 5px 5px 5px 30px;background: url(../images/sprite_v12.png) no-repeat scroll 5px -1548px #FFFFFF;" />
					</div>
				</form>
		</div>-->
    </div>
	<!--
    <?php if ($this->_tpl_vars['homepage'] == '1'): ?>
    <?php if ($this->_tpl_vars['enable_featured'] == '1'): ?>
	<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/scriptolution.css" media="screen" rel="stylesheet" type="text/css" />
    <div class="scriptolution-bar">
    <ul>
        <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['feat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>            
        <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/p/<?php echo $this->_tpl_vars['feat'][$this->_sections['j']['index']]['PID']; ?>
" >
        <img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['feat'][$this->_sections['j']['index']]['pic']; ?>
" />
        <span class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['feat'][$this->_sections['j']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span>
        </a>
        <?php endfor; endif; ?>    
    </ul>
    </div>
    <?php endif; ?>
    <?php endif; ?> -->
	
</div>
<?php if ($this->_tpl_vars['homepage'] == '1'):  if ($this->_tpl_vars['enable_featured'] == '1'): ?>
<div style="clear:both; margin-top:160px;"></div>
<?php endif;  endif; ?>

<div style="max-width:995px;margin:40px auto 0;">
<img src='http://www.myfancy.org/images/blank.gif' alt=''>
<?php if ($_SESSION['USERID'] == ""):  endif; ?>
</div>

<div id="container">