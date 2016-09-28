<div id="main">
    <div id="content-holder">
        <div class="post-info-pad">
            <h1>Bảng xếp hạng - Tháng</h1>
        </div>
		<div class="main-filter ">
            <ul class="content-type">
                <li> <a class="" href="{$baseurl}/topusers"><strong>Tuần</strong></a></li>
                <li> <a class="current" href="{$baseurl}/topusers?t=thang"><strong>Tháng</strong></a></li>
                <li> <a class="" href="{$baseurl}/topusers?t=nam"><strong>Năm</strong></a></li>
				<li> <a class="" href="{$baseurl}/topusers?t=all"><strong>Tất cả</strong></a></li>
                <li> <a class="" href="{$baseurl}/top?t=baihot"><strong>Bài Hot Trong Tuần</strong></a></li>     
            </ul>
        </div>
{include file='top-list.tpl'}
          <div id="paging-buttons" class="paging-buttons">
            	{if $tpp ne ""}
                <a href="{$baseurl}/topusers?t=thang&page={$tpp}" class="previous">&laquo; {$lang166}</a>
                {else}
                <a href="#" onclick="return false;" class="previous disabled">&laquo; {$lang166}</a>
                {/if}
                {if $tnp ne ""}
                <a href="{$baseurl}/topusers?t=thang&page={$tnp}" class="older">{$lang167} &raquo;</a>
                {else}
                <a href="#" onclick="return false;" class="older disabled">{$lang167} &raquo;</a>
                {/if}
            </div>
        </div>
    </div>
</div>
{include file='right.tpl'}
  
