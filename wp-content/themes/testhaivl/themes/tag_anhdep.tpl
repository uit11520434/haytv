<script src="{$baseurl}/js/masonry.pkgd.min.js"></script>
<script src="{$baseurl}/js/imagesloaded.pkgd.min.js"></script>
<script src="{$baseurl}/js/jquery.infinitescroll.min.js"></script>
<div class="friendsintro" style="height:90px;"><div class="welcome"><p class="p-1">Chuyên trang Ảnh đẹp</p>
<p class="p-2">Chia sẻ ảnh girl xinh, cảnh đẹp, thời trang, thiết kế, nghệ thuật</p>
<p class="p-3">Chú ý: Không đăng ảnh hài hước tại đây, bài vi phạm sẽ bị xóa.</p></div>
<div class="btn"><a href="{$baseurl}/submit?file=1&tag=ảnh%20đẹp" class="btn-pal"><span>Tải lên từ máy</span></a><a> 
		<a href="{$baseurl}/submit?tag=ảnh%20đẹp" class="btn-ol"><span>Đăng từ linh</span></a>
	</div>
</div>
<div id="masonry" class="infinite-scroll">

{section name=i loop=$posts}
	<div class="item masonry-brick">
		<a class="wrap" href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}" class="jump_stop">
		<div class="avatar">
			{if $posts[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img  class="ovui" src="{$baseurl}/images/nsfw.jpg" alt="{$posts[i].story|stripslashes}" />
			{else}
				{if $posts[i].type == 1}
					<div>
					{$posts[i].node|stripslashes|bb|smiley|truncateHTML:200}
					</div>
				{else}		
					{if $posts[i].pic ne ""}
						<img src="{$purl[i]}/t/{$posts[i].folder}{$posts[i].pic}"/>
						<div style="background-color: #FFFFFF;height: 15px;margin-top: -15px;position: absolute;width: 228px;"></div>			
					{else}
						{if $posts[i].youtube_key != ""}
						<img src="http://img.youtube.com/vi/{$posts[i].youtube_key}/0.jpg"/>
						{/if}
					{/if}
				{/if}
			{/if}
		</div>
		</a>
		<div class="info">
			<p class="name"><a href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}" target="_blank">{$posts[i].story|stripslashes|smiley}</a> <span class="title2">{$posts[i].story2|stripslashes|smiley}</span></p>
			<p>
				<span id="view_count" class="view" votes="{$posts[i].view}" score="0">{$posts[i].view}</span>
				<span id="total_count" class="total_count" votes="{$posts[i].total_count}" score="0">{$posts[i].total_count}</span>
				<span class="comment">{$posts[i].comments}</span>
				<!--<span id="love_count_{$posts[i].PID}" class="loved" votes="{$posts[i].favclicks}" score="0">{$posts[i].favclicks}</span>-->
				{if $posts[i].nsfw eq "1"}
					<span style="margin-left: 10px; background-color: #3B5998; color: #FFFFFF; padding: 2px 5px; font-size: 9px; border-radius: 3px;">18+</span>
				{/if}
			</p>
		</div>
		
	</div>
{/section}
</div>
<nav id="page-nav">
  <a href="{$baseurl}/tag/Girl-Xinh?page=2"></a>
</nav>
{literal}
<script>
  $(function(){

    var $container = $('#masonry');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: '.item',
        columnWidth: 248
      });
    });

    $container.infinitescroll({
      navSelector  : '#page-nav',    // selector for the paged navigation 
      nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
      itemSelector : '.item',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'Đả tải hết.',
		  msgText: '', 
          img: '{/literal}{$imageurl}{literal}/loading.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
        $newElems.animate({ opacity: 1 });
          $container.masonry( 'appended', $newElems, true ); 
        });
      }
    );
  });
</script>
{/literal}