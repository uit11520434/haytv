<div id="main">
    <div id="content-holder">		
        <div class="profile-pad">
            <div class="profile-image">
                <a href="{$baseurl}/user/{$p.USERID|stripslashes}">
                <img src="https://graph.facebook.com/{$p.username|stripslashes}/picture?width=160&height=160"/>
                </a>
            </div>
            <div class="profile-info" href="#" style="background:#{$p.color1}">
				<h3><a href="{$baseurl}/user/{$p.USERID|stripslashes}">{$p.username|stripslashes}</a></h3>
				<h4>{$p.fullname|stripslashes}</h4>
				<p>{$p.description|stripslashes}</p>
				<a class="home" href="{$p.website|stripslashes}" target="_blank">{$p.website|stripslashes}</a>
                <a class="friendship" href="{$baseurl}/user/{$p.USERID|stripslashes}/messages">Tin nhắn</a>
            </div>
        </div>
        <div class="main-filter with-topping">
            <ul class="content-type">            
                <li><a href="{$baseurl}/user/{$p.USERID|stripslashes}"><strong>{$lang192}</strong> ({$tl})</a></li>
                <li><a href="{$baseurl}/user/{$p.USERID|stripslashes}/likes"><strong>{$lang193}</strong> ({$posts|@count})</a></li>            
                <li><a class="current" href="{$baseurl}/user/{$p.USERID|stripslashes}/messages"><strong>{$lang194}</strong> (<fb:comments-count href="{$baseurl}/user/{$p.USERID|stripslashes}/messages"></fb:comments-count>)</a></li>
            </ul>
        </div>
        <div id="content">
            <div id="view-info">
            	<p>{$lang195}</p>
            </div>
            <div class="profile-comment-wrapper">
            <div class="fb-comments" href="{$baseurl}/user/{$p.USERID|stripslashes}/messages" data-num-posts="5" data-width="700"></div>
            </div>
        </div>    
    </div>
</div>
{include file='right.tpl'}
{literal}
<script type="text/javascript">
var adloca=$('#moving-boxes').offset().top; 
 $(window).scroll(function () { 
    var curloca=$(window).scrollTop();
    if(curloca>adloca){
        $('#moving-boxes').css('position','fixed');
        $('#moving-boxes').css('top','50px');
        $('#moving-boxes').css('z-index','200');
    };
    if(curloca <= adloca){
        $('#moving-boxes').css('position','static');
        $('#moving-boxes').css('top','!important');
        $('#moving-boxes').css('z-index','!important');
    };
    });
</script> 
{/literal}   
<div id="footer" class="">