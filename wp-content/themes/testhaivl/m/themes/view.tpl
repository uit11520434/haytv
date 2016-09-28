<div id="header">
        <h1 class="hooppps"> <a href='{$mobileurl}/'></a> </h1>
        <a id="nav_button" label="{$lang173}" class='nav' href='javascript:void(0);'>{$lang173}</a>
        {include file='lang.tpl'}
    </div>
	<div id="header">
       <div id="search_wrapper">
                    <form action="{$mobileurl}/search">
                        <input id="sitebar_search_header" type="text" class="search search_input" name="query" tabindex="1" placeholder="{$lang189}"/>
                    </form>
        </div>
		{if $safemode eq "1"}
		{if $smarty.session.USERID ne ""}
            {if $smarty.session.FILTER eq "1"}
            <a class="safeon" href="{$mobileurl}/safe?m={$eurl}">18+</a>
            {else}
            <a class="safeoff" href="{$mobileurl}/safe?m={$eurl}&o=1">18+</a>
            {/if}
        {else}
        <a class="safeon" href="{$mobileurl}/login">18+</a>
        {/if}
		{/if}
    </div>

    <div id="content">
    
			<h1>{$p.story|stripslashes}</h1>
	{if $p.nsfw eq "1" AND $smarty.session.FILTER ne "0"}
        <img alt="{$posts[i].story|stripslashes}" src="{$baseurl}/images/nsfw.jpg" border="0" />
    {else}
		{if $p.pic ne ""}
			<img alt="{$p.story|stripslashes}" src="{$purl}/t/l-{$p.pic}" />
        {else}
            {if $p.youtube_key != ""}
            <center>
<iframe id="video" width="100%" height="200" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/{$p.youtube_key}?feature=oembed&amp;autoplay=1&amp;wmode=transparent&amp;rel=0&amp;showinfo=0&amp;modestbranding=1&amp;version=3&amp;ps=docs&amp;nologo=1&amp;theme=light&amp;color=white&amp;iv_load_policy=0&amp;cc_load_policy=1"></iframe>  
                 </center>
            {elseif $p.contents != ""}{$p.contents|strip_mq_gpc}
			{else}
				<img alt="{$p.story|stripslashes}" src="{$imageurl}/error.jpg" border="0" />
            {/if}
        {/if}
	{/if}	
		
        <div class='stats-container'>
            <div class='stats-tooltip-border'></div>
            <div class='stats-tooltip'></div>
            <ul class='stats'>
				{if $smarty.session.USERID ne ""}
					{if $p.favorited eq "1"}
					<a href="{$mobileurl}/love.php?action=UL&PID={$p.PID}&section=view&page={$currentpage}"><li class='loved'>{$p.favclicks}</li></a>
					<a href="{$mobileurl}/love.php?action=H&PID={$p.PID}&section=view&page={$currentpage}"><li class='unlove'>&nbsp;</li></a>
					{else}
						{if $p.unfavorited eq "1"}
						<a href="{$mobileurl}/love.php?action=L&PID={$p.PID}&section=view&page={$currentpage}"><li class='love'>{$p.favclicks}</li></a>
						<a href="{$mobileurl}/love.php?action=UH&PID={$p.PID}&section=view&page={$currentpage}"><li class='unloved'>&nbsp;</li></a>
						{else}
						<a href="{$mobileurl}/love.php?action=L&PID={$p.PID}&section=view&page={$currentpage}"><li class='love'>{$p.favclicks}</li></a>
						<a href="{$mobileurl}/love.php?action=H&PID={$p.PID}&section=view&page={$currentpage}"><li class='unlove'>&nbsp;</li></a>
                    {/if}
				{/if}
				{else}
				<a href="{$mobileurl}/login"><li class='love'>{$p.favclicks}</li></a>
				<a href="{$mobileurl}/login"><li class='unlove'>&nbsp;</li></a>
				{/if}
				<li class='fblike'><fb:like href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Post"></fb:like></li>
                <li class='view'>
                    <a class="badge-facebook-comments-toggler" entryId="{$p.PID}" data-url="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}" href="javascript:void(0);"><fb:comments-count href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}"></fb:comments-count> {$lang143}</a>
                </li>
            </ul>
        </div>
        <div id="facebook-comments-{$p.PID}" class="facebook-comments inited">
            <fb:comments href="{$baseurl}{$postfolder}{$p.PID}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}" num_posts="5" width="300" colorscheme="dark"></fb:comments>

  </div>
    
    </div>
    
	<div id='nav'>
        <ul>
            <div class='tip-border'></div>
            <li><a href="{$mobileurl}/hot">{$lang172}</a></li>
            <li><a href="{$mobileurl}/trending">{$lang173}</a></li>
            <li><a href="{$mobileurl}/vote">{$lang174}</a></li>
			{if $smarty.session.USERID ne ""}
			<li><a href="{$mobileurl}/submit" class='submit'>{$lang199}</a></li>
			<li><a href={$mobileurl}/logout>{$lang198}</a></li>
			{else}  
			<li><a href="{$mobileurl}/login">{$lang197}</a></li>
			{/if}
        </ul>
    </div>
    
    {literal}
    <script type="text/javascript">
    $(function() {
    $('.nav').toggle(
    function() {    
    $('.nav').text("x");
    $('#nav').css({ display: 'block', opacity: 1}); 
    },
    function() {
    $('.nav').html($('#nav_button').attr('label'));
    $('#nav').css({ display: ''});
    }
    );
    });
    </script>
    {/literal}
	
    {include file='lang2.tpl'}