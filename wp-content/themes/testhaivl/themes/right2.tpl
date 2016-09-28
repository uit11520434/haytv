		<div>
			<a class="bts spaceBottom" href="{$baseurl}/submit" style="float: left; width: 278px; color: white">Click &#273;&#7875; b&#7855;t &#273;&#7847;u chia s&#7867; nh&#7919;ng b&#7913;c &#7843;nh vui!</a>
			<div class="clear"></div>
		</div>
		<div class="s-300" id="top-s300">
        	{if $smarty.session.FILTER eq "1" AND $NSFWADS}
        	{insert name=get_advertisement AID=8}
            {else}
        	{insert name=get_advertisement AID=14}
			{/if}
        </div>


