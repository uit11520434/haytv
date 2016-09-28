<div id="main">
    <div id="content-holder">		
        <div class="profile-pad">
            <div class="profile-image">
                <a href="{$baseurl}/user/{$p.USERID|stripslashes}">
                 <img src="https://graph.facebook.com/{$p.username|stripslashes}/picture?width=160&height=160"/>
                </a>
            </div>
            <div class="profile-info" href="#" style="background:#{$p.color1}">
				<h3><a href="{$baseurl}/user/{$p.username|stripslashes}">{$p.username|stripslashes}</a></h3>
				<h4>{$p.fullname|stripslashes}</h4>
				<p>{$p.description|stripslashes}</p>
				<a class="home" href="{$p.website|stripslashes}" target="_blank">{$p.website|stripslashes}</a>
                <a class="friendship" href="{$baseurl}/user/{$p.USERID|stripslashes}/messages">Tin nhắn</a>
            </div>
        </div>
        <div class="main-filter with-topping">
            <ul class="content-type">            
                <li><a href="{$baseurl}/user/{$p.USERID|stripslashes}"><strong>{$lang192}</strong> ({$tl})</a></li>
                <li><a class="current"  href="{$baseurl}/user/{$p.username|stripslashes}/likes"><strong>{$lang193}</strong> ({$totallikes})</a></li>            
                <li><a class="" href="{$baseurl}/user/{$p.username|stripslashes}/messages"><strong>{$lang194}</strong> (<fb:comments-count href="{$baseurl}/user/{$p.USERID|stripslashes}/messages"></fb:comments-count>)</a></li>
            </ul>
        	{if $smarty.session.USERID ne ""}
                {if $smarty.session.FILTER eq "1"}
                <a class="safe-mode-switcher on" href="{$baseurl}/safe?m={$eurl}">&nbsp;</a>
                {else}
                <a class="safe-mode-switcher off" href="{$baseurl}/safe?m={$eurl}&o=1">&nbsp;</a>
                {/if}
            {else}
            	<a class="safe-mode-switcher on" href="{$baseurl}/login">&nbsp;</a>
            {/if}
        </div>
        <div id="content" listPage="">
            <div id="entries-content" class="list">
                <ul id="entries-content-ul" class="col-1">
                    {section name=i loop=$posts}
                    {include file="posts_bit.tpl"}
                    {/section}                    
                </ul>
            </div>
			<div id="paging-buttons" class="paging-buttons">
            	{if $tpp ne ""}
                <a href="{$baseurl}/user/{$p.username|stripslashes}/likes?page={$tpp}" class="previous">&laquo; {$lang166}</a>
                {else}
                <a href="#" onclick="return false;" class="previous disabled">&laquo; {$lang166}</a>
                {/if}
                {if $tnp ne ""}
                <a href="{$baseurl}/user/{$p.username|stripslashes}/likes?page={$tnp}" class="older">{$lang167} &raquo;</a>
                {else}
                <a href="#" onclick="return false;" class="older disabled">{$lang167} &raquo;</a>
                {/if}
            </div>	
        </div>
    </div>
</div>
{include file='vote_js.tpl'}
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