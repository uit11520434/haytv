<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" onkeydown="keyfind(event)">
<head>
<title>{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{if $metadescription ne ""}{$metadescription} - {/if}{$site_name}">
<meta name="keywords" content="{if $pagetitle ne ""}{$pagetitle},{/if}{if $metakeywords ne ""}{$metakeywords},{/if}{$site_name}">
<meta name="title" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}" />
<link rel="icon" href="{$baseurl}/favicon.ico" />
<link rel="shortcut icon" href="{$baseurl}/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Varela+Round&v2' rel='stylesheet' type='text/css'>
<link href="{$baseurl}/css/style2.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> 
<script type="text/javascript" src="{$baseurl}/js/jquery.cookie.js"></script>
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
{literal}
<style type="text/css">
.nodisplay{
display:none;
}
</style>
{/literal}
</head>
<body id="page-post" style="margin: 0pt; padding: 0pt; background: none repeat scroll 0% 0% black;">
<div id="fb-root"></div>
{if $enable_fc eq "1"}
{if $smarty.session.language eq "vi"}
{literal}
<script src="http://connect.facebook.net/vi_VN/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });	  
</script>
{/literal}
{else}
{literal}
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });	  
</script>
{/literal}
{/if}
{/if}
{literal}
<script type="text/javascript">
function keyfind(e)
{
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = code;
if(character ==39){$('#load-next').click();}
if(character ==37){$('#load-prev').click();}
}
</script>
{/literal}
<input id="fb-app-id" type="hidden" value="{$FACEBOOK_APP_ID}"></input>
<div id="tmp-img" style="display:none"></div> 
<div id="logo"><a href="{$baseurl}"></a></div>
<div><a id="close" href="javascript:void(0);" style="text-decoration: none;">× Quay lại</a></div>
<div class="left">
	<a id="load-prev" class="fast-flip prev-post" href="javascript:void(0);"></a>
</div>
<div class="right">
	<a id="load-next" class="fast-flip next-post" href="javascript:void(0);"></a>
</div>
<div>
    <div id="content-holder">
        <div id="entry-{$p.PID}" class="fast-flip-item " postId="{$p.PID}">
            <div class="content">
                <div class="post-container">
                    <div class="img-wrap">
                    	<h2>{$p.story|stripslashes}</h2>
                    	<div id="fb-like" class="_social facebook"><fb:like class=" fb_edge_widget_with_comment fb_iframe_widget" href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Fast"></fb:like></div>
                        <a href="javascript:void(0);" onclick="$('#load-next').click();">
                        	<img src="{$purl}/t/l-{$p.pic}" id='fastimage'>
                        </a>
						{if $displaywm eq "0" AND $p.pic ne ""}
						<div class="watermark-clear"></div>
						{/if}
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
            {insert name=get_advertisement AID=1}
        </div>
    </div>
    <div id="fb-com">
    	<fb:comments colorscheme="dark" width="380" num_posts="5" href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}"></fb:comments>
    </div>
</div>
<div class="hint">Mẹo: Dùng phím điều hướng trái và phải để xem nhanh hình ảnh!</div>
{literal}
<script type="text/javascript">
$.cookie('history',0);
var cookarray=new Array();
var base='{/literal}{$baseurl}{literal}';
$('#load-next').click(function(){
$.cookie('history', $.cookie('history')+','+window.location.hash.replace('#',''));
fastpage();	
});
function fastpage(){
var pid=window.location.hash.replace('#','');
jQuery.ajax({
type:'POST',
url:'{/literal}{$baseurl}{literal}'+ '/fastpage.php',
data:'pid='+pid,
success:function(e){
var  obj= jQuery.parseJSON(e);
var  obj= jQuery.parseJSON(e);
$('h2').html(obj.title);
$('#fastimage').attr('src','{/literal}{$purl}{literal}'+'/t/l-'+obj.image);
$('#fb-com').html('<fb:comments colorscheme="dark" width="380" num_posts="5" href="'+base+'{/literal}{$postfolder}{literal}'+obj.PID+'/{/literal}{if $SEO eq "1"}'+obj.titleseo+'{/if}{literal}"></fb:comments>');
$('#fb-like').html('<fb:like class=" fb_edge_widget_with_comment fb_iframe_widget" href="'+base+'{/literal}{$postfolder}{literal}'+obj.PID+'/'+obj.titleseo+'?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Fast"></fb:like>');
$('title').text(obj.title);
FB.XFBML.parse();
location.hash = obj.PID;
$('#fastimage-'+obj.PID).load(function(){
});
}
});
}
function loadpost(p){
var pid=window.location.hash.replace('#','');
jQuery.ajax({
type:'POST',
url:'{/literal}{$baseurl}{literal}'+ '/loadpost.php',
data:'pid='+pid,
success:function(e){
var  obj= jQuery.parseJSON(e);
$('h2').html(obj.title);
$('#fastimage').attr('src','{/literal}{$purl}{literal}' + '/t/l-'+obj.image);
$('#fb-com').html('<fb:comments colorscheme="dark" width="380" num_posts="5" href="'+base+'{/literal}{$postfolder}{literal}'+obj.PID+'/{/literal}{if $SEO eq "1"}'+obj.titleseo+'{/if}{literal}"></fb:comments>');
$('#fb-like').html('<fb:like class=" fb_edge_widget_with_comment fb_iframe_widget" href="'+base+'{/literal}{$postfolder}{literal}'+obj.PID+'/'+obj.titleseo+'?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Fast"></fb:like>');
$('title').text(obj.title);
FB.XFBML.parse();
location.hash = obj.PID;
}
});
}
$('#load-prev').click(function(){
cookarray=$.cookie('history').split(',');
var pid=cookarray.pop();
$.cookie('history',cookarray.join(","));
if(pid=="0"){ pid={/literal}{$p.PID}{literal};}
loadpost(pid);
});
$('#close').click(function(){
var pid=window.location.hash.replace('#','');
if(pid==""){
pid= '{/literal}{$p.PID}/{literal}';
}
else
  {
pid= pid+'/';
  }
var url='{/literal}{$baseurl}{$postfolder}{literal}'+pid;
window.location.replace(url);
});
</script>
{/literal}
</body>
</html>