<div id="main">
    <div id="content-holder">        
        <div class="main-filter ">
            <ul class="content-type">
                <li> <a class="" href="{$baseurl}/hot"><strong>{$lang172}</strong></a></li>
                <li> <a class="" href="{$baseurl}/trending"><strong>{$lang173}</strong></a></li>
                <li> <a class="current" href="{$baseurl}/vote"><strong>{$lang174}</strong></a></li>                
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
        <div id="content" listPage="new">        
            <div class="blank-state big">
            	<h3>{$lang175}</h3>
            	<p>{$lang176}<br/><a href="{$baseurl}/about" target="_blank">{$lang177}</a> {$lang178} <a href="{$baseurl}/signup">{$lang179}</a></p>
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