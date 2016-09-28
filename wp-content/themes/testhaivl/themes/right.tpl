	<div class="side-bar">
		<div class="msg-box notice" style="font-size:12px;">
			<b>Vào Facebook để duyệt sướng hơn! Bạn không vào được? Xem hướng dẫn <a href="{$baseurl}/cach-vao-facebook-khi-bi-chan-moi-nhat-nam-2014.html">cách vào Facebook</a>.</b>
		</div>
		<div>
			<a class="bts spaceBottom" href="{$baseurl}/submit" style="float: left; width: 278px; color: white">Click để bắt đầu chia sẻ những bức ảnh vui!</a>
			<div class="clear"></div>
		</div>

<div id="tabs">
          <ul>
            <li><a data="tuan">Tuần</a></li>
            <li><a data="thang">Tháng</a></li>
            <li><a data="nam">Năm</a></li>
          </ul>
          <span id="slogo">
            <a href="{$baseurl}/topusers"><label for="slogo">Bảng Xếp Hạng</label></a>
            <img alt="Top Overs" src="{$baseurl}/images/top-logo.png" width="21" height="21" />
          </span>
          <div class="current">
          </div>
        </div>

                  <!-- 
		  <span id="slogo">                 
              <center> <a href="{$baseurl}/topusers"><img alt="Top Overs" src="{$baseurl}/images/xephang.png" width="300" height="60" /> </center>     
               <div class="top-10">
                                          <center> <h3> <a href="{$baseurl}/topusers"><label for="slogo">Bảng Xếp Hạng</label></h3></center> 
			{section name=i loop=$top}
			<ul class="widget-content">
			<li class="widget-content">
			<a target="_blank" href="{$baseurl}/user/{$top[i].USERID|stripslashes}">
			<img src="{$membersprofilepicurl}/{if $top[i].profilepicture eq ""}noprofilepicture.jpg{else}{$top[i].profilepicture}{/if}?{$smarty.now}" style="width:40px;height:40px;">
			</a>
				<ul>
				<li>
					<a target="_blank" href="{$baseurl}/user/{$top[i].USERID}"><strong>{$top[i].username|stripslashes|truncate:10:"...":true}</strong></a>
				</li>
				<li>
					Số bài: <strong>{$top[i].posts}</strong>
				</li>
				<li>
					{$lang286}: <strong>{$top[i].points}</strong>
				</li>
				</ul>
			</li>
			</ul>
			{/section}
			<div class="clearfix"></div>
		</div>-->
				<div class="social-block">
            <h3>{$lang153}</h3>
            <div class="facebook-like">
				<div class="fb-like" data-href="http://www.facebook.com/{$FACEBOOK_PROFILE}" data-send="false" data-width="290" data-show-faces="true"></div>
			</div>
            <div class="twitter-follow">
            	<a href="http://twitter.com/{$twitter}" class="twitter-follow-button">{$lang149} @{$twitter}</a>
            </div>            
            <div class="google-plus">
            	<p>{$lang150}</p>
            	<g:plusone size="medium" href="{$baseurl}"></g:plusone>
            </div>
        </div>
		
        <div id="moving-boxes">
            <div class="s-300" id="bottom-s300">            
            	{if $smarty.session.FILTER eq "1" AND $NSFWADS}
        	{insert name=get_advertisement AID=10}
            {else}
        	{insert name=get_advertisement AID=10}
			{/if}
            </div>
{if $r[0].PID ne "" AND $rhome eq "1"}
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
	<div class="popular-block">
	<h3>{$lang251}</h3>
	<ol>
	{section name=i loop=$r}
	<a class="wrap" href="{$baseurl}{$postfolder}{$r[i].PID}/{if $SEO eq "1"}{$r[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
            {if $r[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$r[i].story|stripslashes}" />
			{else}
				{if $r[i].pic ne ""}
					<img src="{$purlR[i]}/t/s-{$r[i].pic}" alt="{$r[i].story|stripslashes}" />
				{else}
					{if $r[i].youtube_key != ""}
						<img src="http://img.youtube.com/vi/{$r[i].youtube_key}/0.jpg" alt="{$r[i].story|stripslashes}" />
                                     	{elseif $r[i].contents != ""}
						<img src="{$imageurl}/s-text.png" alt="{$r[i].story|stripslashes}" />
					{else}
						<img src="{$imageurl}/s-error.jpg" alt="Không tìm thấy dữ liệu" />
					{/if}
				{/if}
			{/if}
			<h4>{if $truncate eq "1"}{$r[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$r[i].story|stripslashes}{/if}</h4>
         		<h4><a href="{$baseurl}/user/{$r[i].username|stripslashes}">{$r[i].username|stripslashes|truncate:20:"...":true}</a></h4>
			<p class="meta"><span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$r[i].PID}/{if $SEO eq "1"}{$r[i].story|makeseo}.html{/if}"></fb:comments-count></span><span class="loved">{$r[i].favclicks}</span><span class="viewed">{$r[i].postviewed}</span>
			</p>
		</li>
	</a>
	{/section}
	</ol>
	</div>
</div>
{/if}
</div>
</div>