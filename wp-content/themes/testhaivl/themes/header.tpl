<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="{$lang254}" dir="LTR">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<title>{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{if $metadescription ne ""}{$metadescription} - {/if}{$site_name}">
<meta name="keywords" content="{if $pagetitle ne ""}{$pagetitle},{/if}{if $metakeywords ne ""}{$metakeywords},{/if}{$site_name}">
<meta name="title" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}" />

<meta property="og:title" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}"/>
<meta property="og:site_name" content="{$site_name}"/>
{if $p.pic ne ""}
<meta property="og:url" content="{$baseurl}{$postfolder}{$p.PID}/"/>
{elseif $p.youtube_key != ""}
<meta property="og:url" content="{$baseurl}{$postfolder}{$p.PID}/"/>
{else}
<meta property="og:url" content="{$baseurl}/"/>
{/if}
<meta property="og:description" content="{$metadescription}"/>
<meta property="og:type" content="blog" />
{if $p.pic ne ""}
<meta property="og:image" content="{$purl}/t/s-{$p.pic}" />
{elseif $p.youtube_key != ""}
<meta property="og:image" content="http://img.youtube.com/vi/{$p.youtube_key}/0.jpg" />
{else}
<meta property="og:image" content="{$baseurl}/images/image.png" />
{/if}
<meta property="fb:app_id" content="{$FACEBOOK_APP_ID}"/>

<link href="{$baseurl}/css/main.css" media="screen" rel="stylesheet" type="text/css" />
<link href="{$baseurl}/css/style.css?v=0820" media="screen" rel="stylesheet" type="text/css" />
<link href="{$baseurl}/css/additional.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{$baseurl}/css/profile.css?v=081622" type="text/css" />
<link rel="stylesheet" href="{$baseurl}/css/top_overs.css" type="text/css" />
<link href="{$baseurl}/slide/jquery.bxslider.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="icon" href="{$baseurl}/favicon.ico" />
<link rel="shortcut icon" href="{$baseurl}/favicon.ico" />
    <!--<script type="text/javascript" src="{$baseurl}/js/ipos.main.js"></script>-->
<script type="text/javascript" src="{$baseurl}/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$baseurl}/fancybox/lib/jquery-1.9.1.min.js"></script>
<!--<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>-->
<script type="text/javascript" src="{$baseurl}/js/jquery.scrollTo-1.4.2-min.js"></script>
<!--<script type="text/javascript" src="{$baseurl}/js/mootools-yui-compressed.js"></script>-->
<script type="text/javascript" src="{$baseurl}/js/jquery.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery.lazyload.pack.js"></script>
{if $RSS eq "1"}
<link rel="alternate" type="application/rss+xml" title="RSS - {$site_name}" href="{$baseurl}/rss.php" />
{/if}


<!--<script type="text/javascript" src="{$baseurl}/js/ipos.jq.js"></script>-->
<script type="text/javascript" src="{$baseurl}/slide/jquery.bxslider.min.js"></script>
<script type="text/javascript">
	var ROOT_DOMAIN		=	'http://myfancy.org';
	var APP_FACEBOOK 	= 	'287482141376893';
</script>
{literal}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4579652-1', 'myfancy.org');
  ga('send', 'pageview');

</script>
{/literal}
{literal}
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"o1jSi1a8Dy00yv", domain:"myfancy.org",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=o1jSi1a8Dy00yv" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

{/literal}
</head>
<body id="page-landing" class="main-body ">
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
<div id="tmp-img" style="display:none"></div>
{literal}
<script type="text/javascript"> 
function rmt(l) { var img = new Image(); img.src = l; document.getElementById('tmp-img').appendChild(img); } 
function myWindow(location, address, gaCategory, gaAction, entryLink) { var w = 640; var h = 460; var sTop = window.screen.height/2-(h/2); var sLeft = window.screen.width/2-(w/2); var sharer = window.open(address, "Share on Facebook", "status=1,height="+h+",width="+w+",top="+sTop+",left="+sLeft+",resizable=0"); }
</script>
{/literal}
<div id="header">
	<div class="wauto">
<a href="{$baseurl}" class="logo"> </a>
           <form action="{$baseurl}/search">
       <div class="search"><input id="sitebar_search_header" type="text" class="search search_input" name="query" tabindex="1" placeholder="{$lang189}"/>
                    </form></div>
        <ul class="buser">
            <li class="z"><a href="/comic">Chế comic</a></li>
            <li class="z k"><a href="/topusers">Top Thành Viên</a></li>      
<li class="z v"><a href="{$baseurl}/submit"><s class="upload"></s>Đăng bài</a></li>
                  <div id="headerRight">		

{if $smarty.session.USERID ne ""}			
			<a href="{$baseurl}/user/{$smarty.session.USERID|stripslashes}/messages" class="notiButton" title="Tin nhắn"></a>
			<div class="avatar noNoti">
				<a id="profile-username" href="{$baseurl}/user/{$smarty.session.USERNAME|stripslashes}" class="avatarLink" title="{$smarty.session.USERNAME|stripslashes}">
				{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$smarty.session.USERID url=$membersprofilepicurl}
				<img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" width="40px" height="40px" />
				</a>
				<ul>
					<li><a href="{$baseurl}/user/{$smarty.session.USERNAME|stripslashes}">Ảnh của bạn</a></li>
                    <li><a href="{$baseurl}/settings">{$lang45}</a></li>
                    <li><a href="{$baseurl}/logout">{$lang198}</a></li>
			</ul>
			</div>
			{else}
<li class="login"><div id="_login" class="uibutton-group">
		<a href="{$baseurl}/login"><s class="uibutton-group"></s>Đăng nhập</a></li>	
			</div>
			{/if}
		</div>
</ul>
    </div>
</div>
{literal}
<script type="text/javascript" >
    $(document).ready(function(){


        $(function () {

            $(window).scroll(function () {

                if ($(this).scrollTop() > 20) {

                    $('#nav').css("position","fixed").css("top","0").css("box-shadow","0 2px 4px #333");

                }

                else{

                    $('#nav').css("position","relative").css("box-shadow","none");

                }

            });

        });

    });

</script>
{/literal}

<div id="nav">
<div id="menuBar">
<div class="myfancyorg">
    	<li{if $menu eq 1} class="selected"{/if}><a href="{$baseurl}/trending">{$lang173}</a></li>
			<li{if $menu eq 2} class="selected"{/if}><a href="{$baseurl}/hot">{$lang172}</a></li>
			<li{if $menu eq 3} class="selected"{/if}><a href="{$baseurl}/vote">{$lang174}</a></li>
                        <li{if $menu eq 4} class="selected"{/if}><a href="{$baseurl}/tag/anh-dep">&#7842;nh &#273;&#7865;p</a></li>

<li{if $menu eq 5} class="selected"{/if}><a href="{$baseurl}/channels/girls-xinh">Girl xinh</a></li>
<li{if $menu eq 6} class="selected"{/if}><a href="{$baseurl}/channels/tin-hot">Tin hot</a></li>
<li{if $menu eq 7} class="selected"{/if}><a href="{$baseurl}/channels/anh-bua-18-+">Ảnh bựa</a></li>
<li{if $menu eq 8} class="selected"{/if}><a href="{$baseurl}/channels/hinh-anh">&#7842;nh vui</a></li>
<li{if $menu eq 9} class="selected"{/if}><a href="{$baseurl}/channels/video-clip">Video clip</a></li>
			<li{if $menu eq 11} class="selected"{/if}><a href="{$baseurl}/top-posts">{$lang278}</a></li>
<li{if $menu eq 11} class="selected"{/if}><a href="{$baseurl}/kiem-tien-online.html">{$lang67}</a></li>
		   </ul>
</div>
</div>	
		<div class="clear"></div>
	</div>
</div>
{literal}
<script type="text/javascript">
$('.searchButton').click(function(){
    $('#header_searchbar').toggle('slow');
    });
</script>
{/literal}              
<div id="container">
{if $viewpage eq "1"}
{include file='js1.tpl'}
{else}
{include file='js.tpl'}
{/if}