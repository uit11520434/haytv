<?php /* Smarty version 2.6.6, created on 2013-12-22 05:28:01
         compiled from headercm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'headercm.tpl', 8, false),array('modifier', 'vnseo', 'headercm.tpl', 12, false),array('modifier', 'stripslashes', 'headercm.tpl', 26, false),array('modifier', 'bbtext', 'headercm.tpl', 26, false),array('modifier', 'mb_truncate', 'headercm.tpl', 26, false),array('insert', 'get_member_profilepicture', 'headercm.tpl', 138, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  onkeypress="keyfind(event)">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# web-ovui: http://ogp.me/ns/fb/web-ovui#">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ($this->_tpl_vars['viewpage'] == '1'): ?>
<title><?php echo $this->_tpl_vars['pagetitle']; ?>
</title>
<?php else: ?>
<title><?php if ($this->_tpl_vars['tpp'] > 0): ?>Trang  <?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['tpp']), $this);?>
 - <?php endif;  if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
</title>
<?php endif; ?> 
<!-- tdyPfrufAiOyCgk_56WYEZzY81Y -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo ((is_array($_tmp=$this->_tpl_vars['pagetitle'])) ? $this->_run_mod_handler('vnseo', true, $_tmp) : vnseo($_tmp)); ?>
 - Xem <?php if ($this->_tpl_vars['p']['youtube_key'] != ""): ?>video clip<?php endif;  if ($this->_tpl_vars['p']['pic'] != ""): ?>hình ảnh<?php endif; ?> <?php echo $this->_tpl_vars['pagetitle']; ?>
 <?php endif;  if ($this->_tpl_vars['description'] != ""):  echo $this->_tpl_vars['description']; ?>
 <?php endif;  if ($this->_tpl_vars['viewpage'] == '1'):  if ($this->_tpl_vars['p']['tags'] != ""): ?>- <?php echo $this->_tpl_vars['p']['tags'];  endif;  endif; ?> - <?php if ($this->_tpl_vars['metadescription'] != ""):  echo $this->_tpl_vars['metadescription']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
" />
<meta name="keywords" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
,<?php endif;  if ($this->_tpl_vars['metakeywords'] != ""):  echo $this->_tpl_vars['metakeywords']; ?>
,<?php endif;  echo $this->_tpl_vars['site_name']; ?>
" />
<meta name="title" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 | <?php echo ((is_array($_tmp=$this->_tpl_vars['pagetitle'])) ? $this->_run_mod_handler('vnseo', true, $_tmp) : vnseo($_tmp)); ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
" />
<meta property="fb:app_id" content="<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
"/>
<meta property="og:title" content="<?php echo $this->_tpl_vars['pagetitle']; ?>
"/>
<meta property="og:site_name" content="xungheonline.com"/>
<meta property="og:type" content="article" />
<?php if ($this->_tpl_vars['viewpage'] == '1'): ?>
	<?php if ($this->_tpl_vars['p']['youtube_key'] != ""): ?> 
	<link rel="image_src" href="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['p']['youtube_key']; ?>
/hqdefault.jpg" />
	<meta property="og:image" content="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['p']['youtube_key']; ?>
/hqdefault.jpg" />
	<meta property="og:description" content="Click vào để xem video và bình luận" />
	<?php else: ?>
		<?php if ($this->_tpl_vars['p']['type'] == '1'): ?>
		<meta property="og:description" content="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['p']['node'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('bbtext', true, $_tmp) : bbtext($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 200, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 200, "...", 'UTF-8')); ?>
" />
		<?php else: ?>
		<link rel="image_src" href="<?php echo $this->_tpl_vars['purl']; ?>
/t/<?php echo $this->_tpl_vars['p']['folder']; ?>
s-<?php echo $this->_tpl_vars['p']['pic']; ?>
" />
		<meta property="og:image" content="<?php echo $this->_tpl_vars['purl']; ?>
/t/<?php echo $this->_tpl_vars['p']['folder']; ?>
s-<?php echo $this->_tpl_vars['p']['pic']; ?>
" />
		<meta property="og:description" content="Click vào để xem hình ảnh và bình luận" />
		<?php endif; ?>
	<?php endif;  endif; ?>
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/style_v2.css?v=0820" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/additional.css?v=0820" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/profile.css?v=081622" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/top_overs.css" type="text/css" />
<link rel="icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />

<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/jscm/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/jscm/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/jscm/jquery.scrollTo-1.4.2-min.js"></script>



<?php echo '

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-45796152-1\']);
  _gaq.push([\'_setDomainName\', \'www.myfancy.org\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

'; ?>

<?php if ($this->_tpl_vars['showlike'] == 1):  echo '
<script type="text/javascript">
 var intervalpage;
        $(function()
{
    intervalpage=setInterval("updateActiveElementPage();", 50);
});
 
function updateActiveElementPage()
{
    if ( $(document.activeElement).attr(\'id\')=="fbframepage" )
    {
        clearInterval(intervalpage);
        iflag=1;
    }    
}
</script>
'; ?>

<?php endif;  if ($_SESSION['USERID'] != ""): ?>
<link type="text/css" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/cometchat/cometchatjs.php" charset="utf-8"></script>
</script>
<?php endif; ?>
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

                <div id="loadme"></div>
                <div id="profile-menu" class="profile-menu">
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $_SESSION['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

                <a id="profile-username" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
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