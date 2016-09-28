{if $p.nsfw eq "1" AND $smarty.session.USERID eq ""}

	<div>

        <div class="post-next-prev">

            {if $prev != ""}

            <a id="prev_post" class="prev-post" href="{$prev}" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>

            {else}

            <a id="prev_post" class="prev-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>

            {/if}

            {if $next ne ""}

            <a id="next_post" class="next-post" href="{$next}" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>

            {else}

            <a id="next_post" class="next-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>

            {/if}       

        </div>

    </div>

    <div id="main" class="middle">

        <div id="content-holder">

            <div id="content-holder">

                <div id="content" class="nsfw">

                    <div class="content">

                        <img src="{$baseurl}/images/nsfw.jpg" alt="NSFW" />

                    </div>

                    <div class="info">

                        <h1>{$lang154}</h1>

                        <p>{$lang155}. Click vào liên kết dưới đây để bỏ qua chế độ xem an toàn</p>

                        <div class="message-box alt">

                            	<a href="{$baseurl}/safe?m={$eurl}">

                            <div class="inline-message">

            <p style ="color: #3B5998;font-size: 16px;font-weight: bold;" >Tôi đồng ý xem bài này</p>

 </div>

							</a>

                            

                        </div>

                    </div>

					<div class="clear"> </div>

                </div>

            </div>

        </div>

    </div>

</div>

{elseif ($p.nsfw eq "1" AND $smarty.session.FILTER eq "1") OR $sc eq "app"}

	<div>

        <div class="post-next-prev">

            {if $prev != ""}

            <a id="prev_post" class="prev-post" href="{$prev}" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);">Bài trước</a>

            {else}

            <a id="prev_post" class="prev-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);">Bài trước</a>

            {/if}

            {if $next ne ""}

            <a id="next_post" class="next-post" href="{$next}" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);">Bài sau</a>

            {else}

            <a id="next_post" class="next-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);">Bài sau</a>

            {/if}

        </div>

    </div>

    <div id="main" class="middle">

        <div id="content-holder">

            <div id="content-holder">

                <div id="content" class="nsfw">

                    <div class="content">

                        <img src="{$baseurl}/images/nsfw.jpg" alt="NSFW" />

                    </div>

                    <div class="info">

                        <h1>{$lang154}</h1>

                        <p>{$lang155}</p>

                        <div class="message-box alt">

                            <div class="inline-message">

                            	<p><a href="{$baseurl}/safe?m={$eurl}">{$lang156} &raquo;</a></p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div id="footer" class="middle">

{else}

    <div id="main">

        <div id="content-holder">

            <div class="post-info-pad">

                <h1>{$p.story|stripslashes|smiley} <span class="title2">{$p.story2|stripslashes|smiley}</span>	

                <p>	

                    <!--Đăng bởi:&nbsp;<a href="{$baseurl}/user/{$p.USERID|stripslashes}"><b>{$p.USERID|stripslashes}</b></a>&nbsp;ngày&nbsp;

                    {$p.time_added|date_format:"%d/%m/%Y"} lúc {$p.time_added|date_format:"%H:%M"}&nbsp;-->

					<span class="viewed"> <b> Lượt xem : <b>{$postview}</b></span>

		          <span class="loved">&#272;i&#7875;m : <b> <span id="love_count" votes="{$p.favclicks}" >{$p.favclicks}</span></span>	

                        <span class="comment">Bình luận : <b><fb:comments-count href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}"></fb:comments-count></span>

                    {insert name=get_fav_count value=var assign=fcount PID=$p.PID}

    					{if $p.nsfw eq "1"}

						<span style="margin-left: 10px; background-color: #3B5998; color: #FFFFFF; padding: 2px 5px; font-size: 9px; border-radius: 3px;">18+</span>

					{/if}

                    										

                </p>

				<p>

					<span class="source"> &nbsp Nguồn:<b>&nbsp; {if $p.source eq ""}{$lang141}{else}{$p.source|stripslashes}{/if}</b>

					{if $owner eq "1"}

						<span class="seperator">|</span>

						<a href="{$baseurl}/postedit/{$p.PID}" class="edit" >Sửa</a>	

                    <span class="seperator">|</span>

                    <a href="{$baseurl}/deletepost.php?pid={$p.PID}" class="delete" onclick="return confirm('{$lang147}');">{$lang145}</a>	

                    {/if}

                </p>               

  <ul class="userinfo">

                    <span class="seperator"> đăng ngày</span>

                    {$p.time_added|date_format:"%d/%m/%Y"} lúc {$p.time_added|date_format:"%H:%M"}

	</a>	Danh hài : </a> <a href="{$baseurl}/user/{$p.username|stripslashes}">{$p.username|stripslashes}

</a>			

{insert name=get_user_likes assign=userlikes USERID=$p.USERID}

                {insert name=get_member_profilepicture assign=profilepicture value=var USERID=$p.USERID}

<img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" alt="{$p.username|stripslashes} style="width:30px;height:30px;"><a href="{$baseurl}/user/{$p.username|stripslashes}">
</a>						
<div class="uinfo">
                                     {insert name=get_user_level assign=alvl value=var POINT=$userlikes}

							<div class="user-bar">

							<div class="bar-blue" style="width:{$alvl[3]}%;"></div>

							<div class="bar-c">{$alvl[0]} / {$alvl[1]}</div>

							<div class="level">Lv: {$alvl[2]}    
</p>
                </ul>   

            </div>             

            <div id="post-control-bar" class="spread-bar-wrap">

                <div class="spread-bar">

					<span style="float: left; color: rgb(59, 89, 152); font-size: 13px; padding-top: 3px; padding-right: 10px;">Giúp chúng tôi</span>

					<div class="voteinview">

						{if $smarty.session.USERID ne ""}

						{insert name=get_fav_status value=var assign=isfav PID=$p.PID}

							{if $isfav eq "1"}

							<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first" entryId="{$p.PID}" href="javascript:void(0);"><span>{$lang216}</span></a></div>

							<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2 upVoted" href="javascript:void(0);"><span>{$lang219}</span></a></div>

							{else}

							{insert name=get_unfav_status value=var assign=isunfav PID=$p.PID}

								{if $isunfav eq "1"}

								<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first downVoted" entryId="{$p.PID}" href="javascript:void(0);"><span>{$lang216}</span></a></div>

								<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2" href="javascript:void(0);"><span>{$lang219}</span></a></div>

								{else}

									<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first" entryId="{$p.PID}" href="javascript:void(0);"><span>{$lang216}</span></a></div>

									<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2" href="javascript:void(0);"><span>{$lang219}</span></a></div>
{/if}
{/if}
						{else}
<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first" entryId="{$p.PID}" href="{$baseurl}/login"><span>{$lang216}</span></a></div>

							<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2" href="{$baseurl}/login"><span>{$lang219}</span></a></div>
{/if}
</div>
<div class="facebook-btn"><fb:like href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Post"></fb:like>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp</a></div>                
<div class="facebook-share-btn"><fb:share-button href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}?fb=share" type="button_count"></fb:share-button></div>
<div class="google-btn"><g:plusone size="medium" href="{$baseurl}/{$postfolder}{$p.PID}/{$p.story|makeseo}.html"></g:plusone> </div>
                	{if $prev != ""}

                	<a id="prev_post" class="prev-post" href="{$baseurl}{$postfolder}{$prev}/{$prevstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>

                    {else}

                    <a id="prev_post" class="prev-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>

                    {/if}

                    {if $next ne ""}

                	<a id="next_post" class="next-post" href="{$baseurl}{$postfolder}{$next}/{$nextstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>

                    {else}

                    <a id="next_post" class="next-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>

                    {/if}

                </div>

            </div>

            <div id="content">

                <div class="post-container">

                    <div class="img-wrap">

                        {if $p.pic ne ""}

                        <a href="{$baseurl}/random"><img src="{$purlD}/t/l-{$p.pic}" alt="{$p.story|stripslashes}"/></a>

                        {else}

                        	{if $p.youtube_key != ""}

                            <center>

<script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js" type="text/javascript"></script>

							{literal}

							<script type="text/javascript">/* <![CDATA[ */

								var repeat = 1;

								var vid_id = '{/literal}{$p.youtube_key}{literal}';

							/* ]]> */</script>
							{/literal}
                    <div id="videoovui" style="width:740px;height:380px;">

							<iframe width="740" height="380" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/{$p.youtube_key}?feature=oembed&autoplay=1&wmode=transparent&rel=0&showinfo=0&modestbranding=1&version=3&ps=docs&nologo=1&theme=light&color=white&iv_load_policy=0&cc_load_policy=1">

							</iframe>

							</div>

                            </center>

                            {elseif $p.contents != ""}<div style="padding:0 20px">{$p.contents|strip_mq_gpc}</div>

							{else}

							<a href="{$baseurl}/random"><img src="{$imageurl}/l-error.jpg" alt="Không tìm thấy dữ liệu"/></a>

                            {/if}

                        {/if}

                    </div>

					{if $displaywm eq "0" AND $p.pic ne ""}

					<div class="watermark-clear"></div>

					{/if}
{insert name=get_advertisement value=var AID="9"}
             </div>
				<div class="likeonfb">
					<h4>{$lang287}</h4>
					<div class="fb-like" data-href="http://www.facebook.com/{$FACEBOOK_PROFILE}" data-send="false" data-width="600" data-show-faces="false" data-font="arial"></div>
                </div>
                <div class="comment-section">
                    <h3 class="title" id="comments">{$lang143}</h3>
                    <span class="report-and-source">
                    <p>
                        {if $fixenabled eq "1"}<a class="fix" href="{$baseurl}/fix/{$p.PID}">{$lang142}</a>
                        <span id="report-item-separator">|</span>{/if}{if $owner ne "1"}<a id="report-item-link" class="report report-item" entryId="{$p.PID}" href="javascript:void(0);">{$lang146}</a>
                        <span id="report-item-separator">|</span>{/if}{if $p.source eq ""}{$lang141}{else}{$p.source|stripslashes}{/if}
                    </p>
                    </span>
                    <div style="margin-left:10px">
                    	<fb:comments href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}" num_posts="10" width="700"></fb:comments>
                    </div>
                    <div id="fb-root"></div>
                </div>
            	<br/>
            {if $recommended eq "1"}
                <div class="post-may-like">
                        <h2 style="margin-left:15px;">Các bài tương tự</h2>
                    <div id="entries-content" class="grid">  
                   	{section name=i loop=$r}                  
                        <ul id="grid-col-{if $smarty.section.i.iteration GT 3}2{else}1{/if}" class="col-{if $smarty.section.i.iteration GT 3}{math equation="x - 3" x=$smarty.section.i.iteration}{else}{$smarty.section.i.iteration}{/if}">
                            <li class=" ">
                                <a href="{$baseurl}{$postfolder}{$r[i].PID}/{$r[i].story|makeseo}.html" class="jump_stop">
                                    <div style="" class="thimage">
									{if $r[i].type == 0}	      
									{if $r[i].pic ne ""}	
                                        {if $r[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
											<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$r[i].story|stripslashes}" />
 	      									{else}																					                                 <img src="{$purl[i]}/t/{$r[i].folder}s-{$r[i].pic}" alt="{$r[i].story|stripslashes}" />{/if}											{else}
												{if $r[i].youtube_key != ""}
													<img src="http://img.youtube.com/vi/{$r[i].youtube_key}/hqdefault.jpg" alt="{$r[i].story|stripslashes}" />
							                                                 <img class="videoPlay" src="{$imageurl}/button_play_s.png">
					{elseif $r[i].contents != ""}
													<img src="{$imageurl}/s-text.png" alt="{$r[i].story|stripslashes}" />
												{else}

													<img src="{$imageurl}/s-error.jpg" alt="Không tìm thấy dữ liệu" />
												{/if}
											{/if}
										{/if}                                   </div>
                                </a>
<h1>{if $truncate eq "1"}{$r[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$r[i].story|stripslashes|smiley}<span class="title2">{$p.story2|stripslashes|smiley}</span>{/if}</h1>
                                <h4><a href="{$baseurl}/user/{$r[i].USERID|stripslashes}">{$r[i].username|stripslashes|truncate:20:"...":true}</a></h4>
        </li>
                        </ul>
                        {/section}
                    </div>
                </div>
			{/if}	
            </div>
        </div>
    </div>
<div class="side-bar">
{include file='right2.tpl'}
{if $boxindexmax GT 0}
<div id="jsid-buzz-block" class="popular-block" data-boxIndex="0" data-boxIndexMax="{$boxindexmax}" data-boxSize="3">
	<h3>
        {$lang277}:
		<span style="float: right; color: #999; font-size: 13px;">
        </span>
    </h3>
	<ol>
	{section name=i loop=$popular}
	<li class="badge-buzz-post-batch badge-buzz-post-batch-{if $smarty.section.i.iteration GT "15"}5{elseif $smarty.section.i.iteration GT "12"}4{elseif $smarty.section.i.iteration GT "9"}3{elseif $smarty.section.i.iteration GT "6"}2{elseif $smarty.section.i.iteration GT "3"}1{else}0{/if}" {if $smarty.section.i.iteration GT "3"}style="display:none;"{/if} >
	<a class="wrap" href="{$baseurl}{$postfolder}{$popular[i].PID}/{if $SEO eq "1"}{$popular[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1);GAG.Track.event('clicked', 'psb.p', '0', '5665836');">
        <div class="mask">
            {if $popular[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$popular[i].story|stripslashes}" />
			{else}
				{if $popular[i].pic ne ""}
				<img src="{$purlPo[i]}/t/s-{$popular[i].pic}" alt="{$popular[i].story|stripslashes}" />
				{else}
					{if $popular[i].youtube_key != ""}
						<img src="http://img.youtube.com/vi/{$popular[i].youtube_key}/hqdefault.jpg" alt="{$popular[i].story|stripslashes}" />
					{elseif $popular[i].contents != ""}
						<img src="{$imageurl}/s-text.png" alt="{$popular[i].story|stripslashes}" />
					{else}
						<img src="{$imageurl}/s-error.jpg" alt="Không tìm thấy dữ liệu" />
					{/if}
				{/if}
			{/if}
        </div>
		<h4>{if $truncate eq "1"}{$popular[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$popular[i].story|stripslashes}{/if}</h4>
		<p class="meta">
			<span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$popular[i].PID}/{if $SEO eq "1"}{$popular[i].story|makeseo}.html{/if}"></fb:comments-count></span>
			<span class="loved">{$popular[i].favclicks}</span>

			<span class="viewed">{$popular[i].postviewed}</span>
		</p>
	</a>
	</li>
	{/section}
	</ol>
</div>
{/if}
<div id="moving-boxes">
{if $recommended eq "2"}
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
    <div class="popular-block">
	<h3>{$lang276}</h3>
	<ol>
	{section name=i loop=$r}
	<a class="wrap" href="{$baseurl}{$postfolder}{$r[i].PID}/{if $SEO eq "1"}{$r[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
           {if $r[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$r[i].story|stripslashes}" />
			{else}

				{if $r[i].pic ne ""}

					<img src="{$purl[i]}/t/s-{$r[i].pic}" alt="{$r[i].story|stripslashes}" />

				{else}

					{if $r[i].youtube_key != ""}

						<img src="http://img.youtube.com/vi/{$r[i].youtube_key}/hqdefault.jpg" alt="{$r[i].story|stripslashes}" />

	                                        <img class="videoPlay" src="{$baseurl}/button_play_s.png">

				{elseif $r[i].contents != ""}

						<img src="{$imageurl}/s-text.png" alt="{$r[i].story|stripslashes}" />

					{else}

						<img src="{$imageurl}/s-error.jpg" alt="Không tìm thấy dữ liệu" />

					{/if}

				{/if}

			{/if}

			<h4>{if $truncate eq "1"}{$r[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$r[i].story|stripslashes}{/if}</h4>

			<h4><a href="{$baseurl}/user/{$r[i].USERID|stripslashes}">{$r[i].username|stripslashes|truncate:20:"...":true}</a></h4>

			<p class="meta"><span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$r[i].PID}/{if $SEO eq "1"}{$r[i].story|makeseo}.html{/if}"></fb:comments-count></span><span class="loved">{$r[i].favclicks}</span><span class="viewed">{$r[i].postviewed}</span>

			</p>

		</li>

	</a>

	{/section}

	</ol>

	</div>
{insert name=get_advertisement value=var AID="16"}
</div>

{/if}

<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">

	<div class="vr-box">

	<h3>{$lang288}</h3>

	<ol>

	{section name=i loop=$vr}

	<a class="wrap" href="{$baseurl}{$postfolder}{$vr[i].PID}/{if $SEO eq "1"}{$vr[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >

		<li>

            {if $vr[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}

				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$vr[i].story|stripslashes}" />

			{else}

				{if $vr[i].pic ne ""}

					<img src="{$purlVr[i]}/t/s-{$vr[i].pic}" alt="{$vr[i].story|stripslashes}" />

				{else}

					{if $vr[i].youtube_key != ""}

						<img src="http://img.youtube.com/vi/{$vr[i].youtube_key}/hqdefault.jpg" alt="{$vr[i].story|stripslashes}" />

					{else}

						<img src="{$imageurl}/s-error.jpg" alt="Không tìm thấy dữ liệu" />

					{/if}

				{/if}

			{/if}

			<h4>{if $truncate eq "1"}{$vr[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$vr[i].story|stripslashes}{/if}</h4>

			<h4><a href="{$baseurl}/user/{$vr[i].username|stripslashes}">{$vr[i].username|stripslashes|truncate:20:"...":true}</a></h4>

			<p class="meta"><span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$vr[i].PID}/{if $SEO eq "1"}{$vr[i].story|makeseo}.html{/if}"></fb:comments-count></span><span class="loved">{$vr[i].favclicks}</span><span class="viewed">{$vr[i].postviewed}</span>

			</p>

		</li>

	</a>

	{/section}

	</ol>
	</div>
{insert name=get_advertisement value=var AID="16"}
</div>
</div>
</div>
   {literal}

    <script type="text/javascript">

    var adloca=$('#moving-boxes').offset().top; 

     $(window).scroll(function () { 

        var curloca=$(window).scrollTop();

        if(curloca>adloca){

            $('#moving-boxes').css('position','fixed');

            $('#moving-boxes').css('top','50px');

            $('#moving-boxes').css('z-index','0');

        };

        if(curloca <= adloca){

            $('#moving-boxes').css('position','static');

            $('#moving-boxes').css('top','!important');

            $('#moving-boxes').css('z-index','!important');

        };

        });

    </script>

	<script type="text/javascript">

    var adloca2=$('#post-control-bar').offset().top; 

     $(window).scroll(function () { 

        var curloca2=$(window).scrollTop();

        if(curloca2>adloca2){

            $('#post-control-bar').css('position','fixed');

            $('#post-control-bar').css('top','42px');

            $('#post-control-bar').css('z-index','10');

        };

        if(curloca2 <= adloca2){

            $('#post-control-bar').css('position','absolute');

            $('#post-control-bar').css('top','auto');

            $('#post-control-bar').css('z-index','!important');

        };

        });    

    </script>

	<script type="text/javascript">

		$('.voteButton1').click(function(){

        var id=$(this).attr('entryId');

        if( $(this).hasClass('downVoted')){

        $(this).removeClass('downVoted');

        likedeg($(this).attr('entryId'),0,-1);

        }else{

        $(this).addClass('downVoted');

        if($('#post_love_'+id).hasClass('upVoted')){

        likedeg($(this).attr('entryId'),-1,1);	

        $('#post_love_'+id).removeClass('upVoted');

        }else{

        likedeg($(this).attr('entryId'),0,1);	

        }

        }

        });

        $('.voteButton2').click(function(){

        var id=$(this).attr('rel');

        if( $(this).hasClass('upVoted')){

        $(this).removeClass('upVoted');

        likedeg($(this).attr('rel'),-1,0);

        }else{

        $(this).addClass('upVoted');

        if($('#vote-down-btn-'+id).hasClass('downVoted')){

        $('#vote-down-btn-'+id).removeClass('downVoted');

        likedeg($(this).attr('rel'),1,-1);

        }else{

        likedeg($(this).attr('rel'),1,0);

        }

        }

        });

    function likedeg(p,l,u){

        jQuery.ajax({

            type:'POST',

            url:'{/literal}{$baseurl}{literal}'+ '/likedeg.php',

			data:'l='+l+'&pid='+p+'&u='+u,

            success:function(e){

                $('#love_count').html(e);

                }

            });

        }

    </script>

    <script type="text/javascript">

         var barloc=$('#post-control-bar').offset().top; 

         $(window).scroll(function () {

              var curloc=$(window).scrollTop();

              if(curloc>barloc){

        $('#post-control-bar').addClass('topbarfixed');

              }else{

                $('#post-control-bar').removeClass('topbarfixed'); 

                 }

         });

    </script>

	<script type="text/javascript">

		$('.badge-buzz-more').click(function()

			{

			var currIndex=parseInt($("#jsid-buzz-block").attr('data-boxIndex'),10);

			var maxIndex=parseInt($("#jsid-buzz-block").attr('data-boxIndexMax'),10);

			var change=parseInt($(this).attr('data-change'),10);

			var newIndex=currIndex+change;

			if(newIndex>=0&&newIndex<=maxIndex){

			$$("#jsid-buzz-block").set("data-boxIndex",newIndex);

			$$(".badge-buzz-post-batch").setStyle("display","none");

			$$(".badge-buzz-post-batch-"+newIndex).setStyle("display","");

			$$("#jsid-popular-prev").setStyle("color",newIndex===0?"grey":"#00A5F0");

			$$("#jsid-popular-prev").setStyle("cursor",newIndex===0?"default":"pointer");

			$$("#jsid-popular-next").setStyle("color",newIndex===maxIndex?"grey":"#00A5F0");

			$$("#jsid-popular-next").setStyle("cursor",newIndex===maxIndex?"default":"popular");

			}

			});

	</script>

    {/literal}

{literal}

    <script type="text/javascript">

	var vloca=$('#moving-like').offset().top; 

     $(window).scroll(function () { 

        var curloca=$(window).scrollTop();

        if(curloca>vloca){

            $('#moving-like').css('position','fixed');

            $('#moving-like').css('top','41px');

            $('#moving-like').css('z-index','200');

        };

        if(curloca <= vloca){

            $('#moving-like').css('position','static');

            $('#moving-like').css('top','!important');

            $('#moving-like').css('z-index','!important');

        };

        });    

    </script>



    {/literal}

</div>

<div id="footer" class="">

{/if}