<?php /* Smarty version 2.6.6, created on 2014-01-23 12:15:12
         compiled from fast.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'fast.tpl', 82, false),array('modifier', 'makeseo', 'fast.tpl', 83, false),array('insert', 'get_advertisement', 'fast.tpl', 102, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" onkeydown="keyfind(event)">
<head>
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
<link rel="icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Varela+Round&v2' rel='stylesheet' type='text/css'>
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/style2.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> 
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.cookie.js"></script>
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<?php echo '
<style type="text/css">
.nodisplay{
display:none;
}
</style>
'; ?>

</head>
<body id="page-post" style="margin: 0pt; padding: 0pt; background: none repeat scroll 0% 0% black;">
<div id="fb-root"></div>
<?php if ($this->_tpl_vars['enable_fc'] == '1'): ?>
<?php if ($_SESSION['language'] == 'vi'): ?>
<?php echo '
<script src="http://connect.facebook.net/vi_VN/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe(\'auth.login\', function(response) {
    window.location.reload();
  });	  
</script>
'; ?>

<?php else: ?>
<?php echo '
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe(\'auth.login\', function(response) {
    window.location.reload();
  });	  
</script>
'; ?>

<?php endif; ?>
<?php endif; ?>
<?php echo '
<script type="text/javascript">
function keyfind(e)
{
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = code;
if(character ==39){$(\'#load-next\').click();}
if(character ==37){$(\'#load-prev\').click();}
}
</script>
'; ?>

<input id="fb-app-id" type="hidden" value="<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
"></input>
<div id="tmp-img" style="display:none"></div> 
<div id="logo"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"></a></div>
<div><a id="close" href="javascript:void(0);" style="text-decoration: none;">× Quay lại</a></div>
<div class="left">
	<a id="load-prev" class="fast-flip prev-post" href="javascript:void(0);"></a>
</div>
<div class="right">
	<a id="load-next" class="fast-flip next-post" href="javascript:void(0);"></a>
</div>
<div>
    <div id="content-holder">
        <div id="entry-<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="fast-flip-item " postId="<?php echo $this->_tpl_vars['p']['PID']; ?>
">
            <div class="content">
                <div class="post-container">
                    <div class="img-wrap">
                    	<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h2>
                    	<div id="fb-like" class="_social facebook"><fb:like class=" fb_edge_widget_with_comment fb_iframe_widget" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Fast"></fb:like></div>
                        <a href="javascript:void(0);" onclick="$('#load-next').click();">
                        	<img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/l-<?php echo $this->_tpl_vars['p']['pic']; ?>
" id='fastimage'>
                        </a>
						<?php if ($this->_tpl_vars['displaywm'] == '0' && $this->_tpl_vars['p']['pic'] != ""): ?>
						<div class="watermark-clear"></div>
						<?php endif; ?>
                    	<div class="big-fat-dick"></div>
                    </div>
                </div>
            </div>
            <div class="right-comment">
            </div>
        </div>
    </div>
</div>
<div style="position:fixed;top:0px;right:0px;z-index:9999;background-color:;width:390px;height:2910px">
    <div style="width:300px;height:250px;margin:20px 45px;padding:0;" >
        <div style='width:300px; height:250px; border:1px solid #DFDFDF;' align='center'>
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 1)), $this); ?>

        </div>
    </div>
    <div id="fb-com">
    	<fb:comments colorscheme="dark" width="380" num_posts="5" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments>
    </div>
</div>
<div class="hint">Mẹo: Dùng phím điều hướng trái và phải để xem nhanh hình ảnh!</div>
<?php echo '
<script type="text/javascript">
$.cookie(\'history\',0);
var cookarray=new Array();
var base=\'';  echo $this->_tpl_vars['baseurl'];  echo '\';
$(\'#load-next\').click(function(){
$.cookie(\'history\', $.cookie(\'history\')+\',\'+window.location.hash.replace(\'#\',\'\'));
fastpage();	
});
function fastpage(){
var pid=window.location.hash.replace(\'#\',\'\');
jQuery.ajax({
type:\'POST\',
url:\'';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/fastpage.php\',
data:\'pid=\'+pid,
success:function(e){
var  obj= jQuery.parseJSON(e);
var  obj= jQuery.parseJSON(e);
$(\'h2\').html(obj.title);
$(\'#fastimage\').attr(\'src\',\'';  echo $this->_tpl_vars['purl'];  echo '\'+\'/t/l-\'+obj.image);
$(\'#fb-com\').html(\'<fb:comments colorscheme="dark" width="380" num_posts="5" href="\'+base+\'';  echo $this->_tpl_vars['postfolder'];  echo '\'+obj.PID+\'/';  if ($this->_tpl_vars['SEO'] == '1'): ?>'+obj.titleseo+'<?php endif;  echo '"></fb:comments>\');
$(\'#fb-like\').html(\'<fb:like class=" fb_edge_widget_with_comment fb_iframe_widget" href="\'+base+\'';  echo $this->_tpl_vars['postfolder'];  echo '\'+obj.PID+\'/\'+obj.titleseo+\'?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Fast"></fb:like>\');
$(\'title\').text(obj.title);
FB.XFBML.parse();
location.hash = obj.PID;
$(\'#fastimage-\'+obj.PID).load(function(){
});
}
});
}
function loadpost(p){
var pid=window.location.hash.replace(\'#\',\'\');
jQuery.ajax({
type:\'POST\',
url:\'';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/loadpost.php\',
data:\'pid=\'+pid,
success:function(e){
var  obj= jQuery.parseJSON(e);
$(\'h2\').html(obj.title);
$(\'#fastimage\').attr(\'src\',\'';  echo $this->_tpl_vars['purl'];  echo '\' + \'/t/l-\'+obj.image);
$(\'#fb-com\').html(\'<fb:comments colorscheme="dark" width="380" num_posts="5" href="\'+base+\'';  echo $this->_tpl_vars['postfolder'];  echo '\'+obj.PID+\'/';  if ($this->_tpl_vars['SEO'] == '1'): ?>'+obj.titleseo+'<?php endif;  echo '"></fb:comments>\');
$(\'#fb-like\').html(\'<fb:like class=" fb_edge_widget_with_comment fb_iframe_widget" href="\'+base+\'';  echo $this->_tpl_vars['postfolder'];  echo '\'+obj.PID+\'/\'+obj.titleseo+\'?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Fast"></fb:like>\');
$(\'title\').text(obj.title);
FB.XFBML.parse();
location.hash = obj.PID;
}
});
}
$(\'#load-prev\').click(function(){
cookarray=$.cookie(\'history\').split(\',\');
var pid=cookarray.pop();
$.cookie(\'history\',cookarray.join(","));
if(pid=="0"){ pid=';  echo $this->_tpl_vars['p']['PID'];  echo ';}
loadpost(pid);
});
$(\'#close\').click(function(){
var pid=window.location.hash.replace(\'#\',\'\');
if(pid==""){
pid= \'';  echo $this->_tpl_vars['p']['PID']; ?>
/<?php echo '\';
}
else
  {
pid= pid+\'/\';
  }
var url=\'';  echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo '\'+pid;
window.location.replace(url);
});
</script>
'; ?>

</body>
</html>