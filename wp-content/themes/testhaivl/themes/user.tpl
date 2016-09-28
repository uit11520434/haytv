 {include file="user-header.tpl"}
       <div class="main-filter with-topping">
            <ul class="content-type">            
                <li><a class="current" href="{$baseurl}/user/{$p.username|stripslashes}"><strong>{$lang192}</strong> ({$ptotal})</a></li>       
				<li><a class="" href="{$baseurl}/user/{$p.username|stripslashes}/followers"><strong>Người theo dõi</strong> ({$followers})</a></li> 
				<li><a class="" href="{$baseurl}/user/{$p.username|stripslashes}/following"><strong>Đang theo dõi</strong> ({$following})</a></li> 	
                <li><a id="cometchat_userlist_{$p.USERID}" class="name cometchat_userlist">Chat với {if $p.fullname != ""}{$p.fullname|stripslashes}{else}{$p.username|stripslashes}{/if}</a></li>
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
                <a href="{$baseurl}/user/{$p.username|stripslashes}?page={$tpp}" class="previous">&laquo; {$lang166}</a>
                {else}
                <a href="#" onclick="return false;" class="previous disabled">&laquo; {$lang166}</a>
                {/if}
                {if $tnp ne ""}
                <a href="{$baseurl}/user/{$p.username|stripslashes}?page={$tnp}" class="older">{$lang167} &raquo;</a>
                {else}
                <a href="#" onclick="return false;" class="older disabled">{$lang167} &raquo;</a>
                {/if}
            </div></div>
         </div></div>
	
{include file='right.tpl'}