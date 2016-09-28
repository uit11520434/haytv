{section name=i loop=$posts}
    <section class="itemPost">
        <div class="userAvatar">
            {insert name=get_member_profilepicture assign=profilepicture value=var USERID=$posts[i].USERID url=$membersprofilepicurl}
            <a href="{$baseurl}/user/{$posts[i].username|stripslashes}" class="avatar"><img src="{$profilepicture}"></a>
        </div>
        <div class="itemContent">
        <span class="userName">
            <a href="{$baseurl}/user/{$posts[i].username|stripslashes}">{$posts[i].username|fullname}</a>
        </span>
            <span class="time">{if $posts[i].phase == 0}{insert name=get_time_to_days_ago time=$posts[i].time_added}{else}{if $posts[i].phase == 1}{insert name=get_time_to_days_ago time=$posts[i].ttime}{else}{insert name=get_time_to_days_ago time=$posts[i].htime}{/if}{/if}</span>
            <span class="title"><a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">{$posts[i].story}</a></span>
            {if $posts[i].type == 1}
                <div class="imgWrap">
                    <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">
                        {if $posts[i].pic ne ""}
                        <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">
                            <img class="imgovui" src="{$purl}/t/{$posts[i].folder}{$posts[i].pic}"/>
                        </a>
                        {/if}
                        <div class="blogWrap">
                            {$posts[i].node|stripslashes|bb|smiley}
                        </div>
                    </a>
                </div>
            {else}
                <div class="imgWrap {if $posts[i].youtube_key != ""}youtube{/if}">
                    {if $posts[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
                        <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank"><img  class="imgovui" src="{$baseurl}/images/nsfw.jpg" /></a>
                    {else}
                        {if $posts[i].pic ne ""}
                            <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">
                                <img class="imgovui" src="{$purl}/t/{$posts[i].folder}{$posts[i].pic}"/>
                            </a>
                        {else}
                            {if $posts[i].youtube_key != ""}
                                <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">
                                    <img class="imgovui" src="http://i.ytimg.com/vi/{$posts[i].youtube_key}/0.jpg"/>
                                    <i class="ovsp ovsp-play"></i>
                                </a>
                            {/if}
                        {/if}
                    {/if}
                </div>
            {/if}
            <div class="postInfo">
                <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">
                    <span class="viewCount" votes="{$posts[i].view}" score="0" title="Lượt xem"><i class="fa fa-eye"></i> {$posts[i].view|number_format:0:',':'.'} lượt xem</span>
                    <span class="pointCount" votes="{$posts[i].total_count}" score="0" title="Điểm"><i class="fa fa-star"></i> {$posts[i].total_count|number_format:0:',':'.'} điểm</span>
                    <span class="commentCount" title="Bình luận"><i class="fa fa-comment"></i> {$posts[i].comments|number_format:0:',':'.'} bình luận</span>
                </a>
                <div class="social">
                    <div class="btn-social btn-fb fb-like fb_edge_widget_with_comment fb_iframe_widget" data-action="like" data-share="false" data-width="90" data-layout="button_count" data-show-faces="false" data-send="false" data-href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
{/section}