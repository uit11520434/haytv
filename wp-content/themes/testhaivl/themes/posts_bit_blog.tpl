{section name=i loop=$posts}
    <section class="itemPost">
        <div class="userAvatar">
            {insert name=get_member_profilepicture assign=profilepicture value=var USERID=$posts[i].USERID url=$membersprofilepicurl}
            <a href="{$baseurl}/user/{$posts[i].username|stripslashes}" class="avatar"><img src="{$profilepicture}"></a>
            <div class="boxlike">
                <div class="fb-like" data-href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" data-layout="box_count" data-action="like" data-show-faces="true"></div>
            </div>
        </div>
        <div class="itemContent">
        <span class="userName">
            <a href="{$baseurl}/user/{$posts[i].username|stripslashes}">{$posts[i].username|fullname}</a>
        </span>
            <span class="time">{if $posts[i].phase == 0}{insert name=get_time_to_days_ago time=$posts[i].time_added}{else}{if $posts[i].phase == 1}{insert name=get_time_to_days_ago time=$posts[i].ttime}{else}{insert name=get_time_to_days_ago time=$posts[i].htime}{/if}{/if}</span>
            <a  href="{$baseurl}/{$posts[i].story|vnseo:true}/{$posts[i].PID}.html" target="_blank">
                <div class="blogWrap">
                    <div class="blogThumb">
                        {if $posts[i].pic ne ""}
                            <img src="{$purl}/t/{$posts[i].folder}s-{$posts[i].pic}"/>
                        {else}
                            <div class="image"><i class="fa fa-picture-o"></i> No Image</div>
                        {/if}
                    </div>
                    <div class="desc">
                        <h4>{$posts[i].story}</h4>
                        {$posts[i].node|stripslashes|bbtext|mb_truncate:200:"...":'UTF-8'}
                    </div>
                    <div class="clear"></div>
                </div>
            </a>
        </div>
    </section>
{/section}