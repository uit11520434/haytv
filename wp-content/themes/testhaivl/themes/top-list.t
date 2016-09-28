        <div id="content">
        	<div id="entries-content" class="list">               
{section name=i loop=$topusers}
                <div class="bxh-detail">
 {insert name=get_rank value=var assign=urank pg=$page ite=$smarty.section.i.iteration}
                	{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$topusers[i].USERID url=$membersprofilepicurl}
          <span class="order-number rank{$urank}">{$urank}</span>
<a href="{$baseurl}/user/{$topusers[i].username|stripslashes}" style="display: block;margin-left: 10px;
    float: left;
    height: 60px;
    margin-right: 10px;
    width: 60px;">
<img src="{$membersprofilepicurl}/{if $topusers[i].profilepicture eq ""}noprofilepicture.jpg{else}{$topusers[i].profilepicture}{/if}?{$smarty.now}" style="width:60px;height:60px;">
 </a>
                    <div class="meta">
                      <a style="font-size:16px; font-weight: bold; padding-bottom: 5px; margin-bottom: 6px; border-bottom: 1px solid rgb(242, 242, 242); display: block;"><strong>{$topusers[i].fullname|stripslashes|truncate:10:"...":true}</strong></a>
                    	<span style="font-size: 12px; color: rgb(68, 68, 68);">Nick : <a href="{$baseurl}/user/{$topusers[i].username}"><strong>{$topusers[i].username|stripslashes|truncate:10:"...":true}</strong></a>&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;Bài đăng: <strong>{$topusers[i].TOTAL}</strong>&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;Tổng số điểm: <strong>{$topusers[i].LIKES}</strong><span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;Tổng lượt xem: <strong>{$topusers[i].VIEWS}</strong></strong><span style="color: rgb(238, 238, 238);">

                    </div> 
               	<div class="clear">           </div> </div>
                
    			{/section}
             
 </div>