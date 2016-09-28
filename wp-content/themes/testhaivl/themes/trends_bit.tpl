                    <li class=" gag-link" data-url="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}" data-text="{$posts[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}" gagId="{$posts[i].PID}" itemType="list" id="entry-{$posts[i].PID}">
                        <div class="content">
                            <div class="img-wrap">
                                {if $posts[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
                                	<a target="_blank" href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}"><img src="{$baseurl}/images/nsfw.jpg" alt="{$posts[i].story|stripslashes}" /></a>
                                {else}
                                	{if $posts[i].pic ne ""}
                                	<a target="_blank" href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}"><img src="{$purl[i]}/t/{$posts[i].pic}" alt="{$posts[i].story|stripslashes}" /></a>
                                    {else}
                                        {if $posts[i].youtube_key != ""}
                                        <center>
                                        <a target="_blank" href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}">
										<img style="max-width:460px" src="http://img.youtube.com/vi/{$posts[i].youtube_key}/0.jpg" alt="{$posts[i].story|stripslashes}" />
										<img style="position:relative;top:-200px;" src="{$baseurl}/images/play.png" /></a>
                                        </center>
                                        {elseif $posts[i].contents != ""}{$posts[i].contents|strip_mq_gpc}
										{else}
										<a target="_blank" href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}"><img src="{$imageurl}/error.jpg" alt="{$lang264}" /></a>
                                        {/if}
                                    {/if}
                                {/if}
                            </div>
                            {if $displaywm eq "0" AND $posts[i].pic ne ""}							
							{/if}
                        </div>
                        <div style="position:relative;width:220px;float:right">
                             <div class="info b9gcs-stop" id="action-{$posts[i].PID}">
                                <h1><a target="_blank" href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}" class="jump_focus">{if $truncate eq "1"}{$posts[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$posts[i].story|stripslashes|smiley} <span class="title2">{$p.story2|stripslashes|smiley}</span>{/if}</a></h1>
								<div class="userinfo">
									{insert name=get_user_likes assign=userlikes USERID=$posts[i].USERID}
									{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$posts[i].USERID url=$membersprofilepicurl}
                                                                                  <p>{insert name=get_time_to_days_ago time=$posts[i].time_added}</p>									<div>
										<a href="{$baseurl}/user/{$posts[i].username|stripslashes}"><img src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" alt="{$p.username|stripslashes}"></a>
										<div class="uinfo">
											<a href="{$baseurl}/user/{$posts[i].username|stripslashes}">{$posts[i].username|fullname}</a>
											{insert name=get_user_level assign=alvl value=var POINT=$userlikes}
											<div class="user-bar">
											<div class="bar-blue" style="width:{$alvl[3]}%;"></div>
											<div class="bar-c">{$alvl[0]} / {$alvl[1]}</div>
											<div class="level">Lv: {$alvl[2]}</div>
											</div>
								
										</div>
										<div class="clear">  </div>

</div>
								</div>	
                                </h4>                                
                                <p>
                                    <span class="comment">
                                    	<fb:comments-count href="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}"></fb:comments-count>
                                    </span>
                                    {insert name=get_fav_count value=var assign=fcount PID=$posts[i].PID}
                                    <span id="love_count_{$posts[i].PID}" class="loved" votes="{$posts[i].favclicks}" score="0">{$posts[i].favclicks}</span>
									<span class="viewed">{$posts[i].postviewed}</span>
                                </p>
                                <div class="sharing-box ">
                                    <hr class="arrow" />
                                    <ul class="sharing ">
                                        <li class="facebook" id="share1-{$posts[i].PID}">
                                        	<span id="list-share-twitter-{$posts[i].PID}">
												{if $share1 eq 1}
													<a href="https://twitter.com/share" class="twitter-share-button" data-text="{$posts[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}" data-url="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}" data-count="horizontal" data-via="">&nbsp;</a>		
												{elseif $share1 eq 2}
													<fb:share-button href="{$baseurl}{$postfolder}{$posts[i].PID}/" type="button_count"></fb:share-button>
												{else}
													<iframe src="//www.facebook.com/plugins/like.php?href={$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}?ref=fb&amp;width=80&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId={$FACEBOOK_APP_ID}" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:20px;" allowTransparency="true"></iframe>
												{/if}
                                            </span>
											<div style="float:right" class="facebook-share-btn">
												{if $share2 eq 1}
													<a href="https://twitter.com/share" class="twitter-share-button" data-text="{$posts[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}" data-url="{$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}" data-count="horizontal" data-via="">&nbsp;</a>		
												{elseif $share2 eq 2}
													<fb:share-button href="{$baseurl}{$postfolder}{$posts[i].PID}/" type="button_count"></fb:share-button>
												{else}
													<iframe src="//www.facebook.com/plugins/like.php?href={$baseurl}{$postfolder}{$posts[i].PID}/{if $SEO eq "1"}{$posts[i].story|makeseo}.html{/if}?ref=fb&amp;width=80&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId={$FACEBOOK_APP_ID}" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:20px;" allowTransparency="true"></iframe>
												{/if}
											</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tags">
                                	<span>
                                		{$posts[i].tags|tagsexplode}
                                	</span>
                                </div>
                                {if $fixenabled eq "1"}<a class="fix" href="{$baseurl}/fix/{$posts[i].PID}">{$lang142}</a>{/if}
                                <a class="report" entryId="{$posts[i].PID}" href="javascript:void(0);">{$lang146}</a>
                            </div>
                        </div>
                    </li>