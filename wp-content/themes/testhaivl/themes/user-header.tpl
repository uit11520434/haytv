<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="{$baseurl}/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="{$baseurl}/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="{$baseurl}/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<div class="cover-img" {if $p.coverpicture != "" }style="background-image: url('{$membersprofilepicurl}/cover/{$p.coverpicture}?{$p.updatetime}');"{/if}></div>

<div id="userProfile">
    <div class="profile-info">
		{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$p.USERID url=$membersprofilepicurl l=1 w=120 h=120}
        <a class="avatar align-left" href="{$baseurl}/user/{$p.username|stripslashes}"><img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" alt="{$p.username|stripslashes}" /></a> 
        <a class="username" href="{$baseurl}/user/{$p.username|stripslashes}"><b>{$p.fullname|stripslashes}</b> ({$p.username|stripslashes})</a>
		{if $smarty.session.USERID != "" && $smarty.session.USERID != $p.USERID}
		{insert name=get_follow_status value=var assign=isfollow USERID=$p.USERID}
		<a id="follow_user" class="follow {if $isfollow eq "1"}following{/if}" href="javascript:void(0);">{if $isfollow eq "1"}Đã theo dõi{else}Theo dõi{/if}</a>
		{literal}
		<script type="text/javascript">
			$('#follow_user').click(function(){
				if( $('#follow_user').hasClass('following')){
					$('#follow_user').removeClass('following');
					$('#follow_user').html('Theo dõi');
				followuser(-1);
				}else{
					followuser(1);
				$('#follow_user').addClass('following');
				$('#follow_user').html('Đã theo dõi');
				}
				});
			function followuser(x){
				jQuery.ajax({
					type:'POST',
					url:'{/literal}{$baseurl}{literal}'+ '/followuser.php',
					data:'art='+x+'&uid=' +  '{/literal}{$p.USERID}{literal}' ,
					success:function(e){
						$('#followers').html(e);
						}
					});
				}
		</script>
		{/literal}
		{/if}
		<div class="clear"></div>
		<p class="profile-desc">{$p.description|stripslashes}</p>
		<p class="profile-desc" style="font-size:0.8em;">Ngày sinh: {$p.birthday} | Giới tính: {if $p.gender == 1}Nam{else}Nữ{/if} | Mối quan hệ: {insert name=get_relationship r=$p.relationship}</p>
		{insert name=get_user_level assign=alvl value=var POINT=$p.points}
		{insert name=get_user_posts assign=userposts USERID=$p.USERID}

		<ul class="user-stat">
            <li>
                
                    <span class="stat-numb">{$userposts|number_format:0:',':'.'}</span>
                    <span class="stat-type">Bài đăng</span>
                
            </li>
            <li>
                
                    <span class="stat-numb">{$p.points|number_format:0:',':'.'}</span>
                    <span class="stat-type">Tổng điểm</span>
               
            </li>
            <li>
                
                    <span class="stat-numb">{$p.yourviewed|number_format:0:',':'.'}</span>
                    <span class="stat-type">Lượt xem</span>
 
            </li>
			<li>
                
                    <span class="stat-numb">{$p.youviewed|number_format:0:',':'.'}</span>
                    <span class="stat-type">T&#7893;ng ti&#7873;n</span>
 
            </li>
        </ul>
        <div id="user_badges">
			<ul class="list-badge">
				<li>
					<div class="lv" title="Xếp hạng">
						<span class="stat-type">Rank</span>
						<span class="stat-numb" >{insert name=get_user_rank USERID=$p.USERID}</span>
					</div>
				</li>
				<li>
					<div class="lv" title="Cấp độ" style="background:#DE6F0D;">
						<span class="stat-type">Level</span>
						<span class="stat-numb" >{$alvl[2]}</span>
					</div>
				</li>

				<li>
					<div class="link" style="background:#328A12;">
					<a href="{if $p.website != ""}{$p.website|stripslashes}{else}{$baseurl}{/if}" title="Website của tôi {if $p.website != ""}{$p.website|stripslashes}{else}{$baseurl}{/if}" target="_blank" ><img src="{$baseurl}/images/homeicon.png"></a>  
					</div>
				</li>
				
				{if $p.showfb eq "1"}
				<li>
					<div class="link">
						<a href="http://www.facebook.com/{$p.FBID}" title="Facebook của tôi" target="_blank" ><img src="{$baseurl}/images/fbicon.png"></a>
					</div>
				</li>
				{/if}
			</ul>
		</div>
    </div></div>


<div id="main">
    <div id="content-holder">		
        