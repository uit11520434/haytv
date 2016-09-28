		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Bài Đăng</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="stories_manage.php" id="isoft_group_1" name="group_1" title="Quản Lý Bài Đăng" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Quản Lý Bài Đăng
                                    </span>
        						</a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Sửa Bài Đăng</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">ID Bài Đăng </label></td>
                                                        <td class="value">
                                                        	{$story.PID}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="USERID">Người Đăng </label></td>
                                                        <td class="value">
                                                        	<select name="USERID" id="USERID">
                                                            {insert name=get_all_users assign=listallcats}
                                                            {section name=i loop=$listallcats}
                                                            <option value="{$listallcats[i].USERID}" {if $story.USERID eq $listallcats[i].USERID}selected{/if}>{$listallcats[i].username|stripslashes}</option>
                                                            {/section}
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[CHỦ NHÂN CỦA BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Tiêu Đề </label></td>
                                                        <td class="value">
                                                        	<input id="story" name="story" value="{$story.story|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TIÊU ĐỀ CỦA BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Từ Khóa </label></td>
                                                        <td class="value">
                                                        	<input id="tags" name="tags" value="{$story.tags|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TỪ KHÓA CỦA BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Nguồn </label></td>
                                                        <td class="value">
                                                        	<input id="source" name="source" value="{$story.source|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NGUỒN CỦA BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
													<tr class="hidden">
                                                        <td class="label"><label for="name">Kênh </label></td>
                                                        <td class="value">
                                                        	<select name="CID" id="CID">
															<option value="">{$lang270}</option>
															{section name=i loop=$c}                  
															<option value="{$c[i].CID}" {if $c[i].CID eq $story.CID}selected{/if}>{$c[i].cname}</option>
															{/section}
															</select>                        
                                                        </td>
                                                        <td class="scope-label">[KÊNH LIÊN QUAN ĐẾN BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="nsfw">Nội Dung 18+ </label></td>
                                                        <td class="value">
                                                        	<select name="nsfw" id="nsfw">
                                                            <option value="1" {if $story.nsfw eq 1}selected{/if}>Có</option>
                                                            <option value="0" {if $story.nsfw eq 0}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BÀI ĐĂNG DÀNH CHO NGƯỜI TRÊN 18 TUỔI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Ngày Đăng </label></td>
                                                        <td class="value">
                                                        	{$story.time_added|date_format:"%b %e, %Y"}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
													<tr class="hidden">
                                                        <td class="label"><label for="postviewed">Lượt Xem </label></td>
                                                        <td class="value">
                                                        	<input id="postviewed" name="postviewed" value="{$story.postviewed}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ LƯỢT XEM BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="favclicks">Lượt Thích </label></td>
                                                        <td class="value">
                                                        	<input id="favclicks" name="favclicks" value="{$story.favclicks}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ LẦN NHẤN NÚT THÍCH]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="unfavclicks">Lượt Không Thích </label></td>
                                                        <td class="value">
                                                        	<input id="unfavclicks" name="unfavclicks" value="{$story.unfavclicks}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ LẦN NHẤN NÚT KHÔNG THÍCH]</td>
                                                            <td><small></small></td>
                                                    </tr>
													<tr class="hidden">
                                                        <td class="label"><label for="phase">Trang Hiển Thị </label></td>
                                                        <td class="value">
                                                        	<select name="phase" id="phase">
                                                            <option value="2" {if $story.phase eq 2}selected{/if}>Đang Hot</option>
                                                            <option value="1" {if $story.phase eq 1}selected{/if}>Bài Mới</option>
                                                            <option value="0" {if $story.phase eq 0}selected{/if}>Bình Chọn</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TRANG HIỂN THỊ BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Kích Hoạt </label></td>
                                                        <td class="value">
                                                        	<select name="active" id="active">
                                                            <option value="1" {if $story.active eq 1}selected{/if}>Có</option>
                                                            <option value="0" {if $story.active eq 0}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TÌNH TRẠNG BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Lần Xem Cuối </label></td>
                                                        <td class="value">
                                                        	{$story.last_viewed|date_format:"%b %e, %Y"}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Địa Chỉ IP </label></td>
                                                        <td class="value">
                                                        	<a href="{$adminurl}/bans_ip_add.php?add={$story.pip}" target="_blank">{$story.pip}</a>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Nội Dung </label></td>
                                                        <td class="value" colspan="3">
                                                        	<center>
                                                            {if $story.pic ne ""}
                                                            <img src="{$purl}/{$story.pic}" alt="{$story.story|stripslashes}"/>
                                                            {else}
                                                                {if $story.youtube_key != ""}
                                                                <center>
                                                                {insert name=return_youtube value=a assign=youtube youtube=$story.youtube_key}{$youtube}
                                                                </center>
                                                                {elseif $story.contents != ""}
								{$story.contents|strip_mq_gpc}
                                                                {else}
                                                                <img src="{$imageurl}/error.jpg" alt="Không tìm thấy dữ liệu"/>
                                                                {/if}
                                                            {/if}
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                               
                                
                                
                                
    						</li>
                            
                            <li >
                                <a href="stories_validate.php" id="isoft_group_2" name="group_2" title="Xác Nhận Bài Đăng" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Xác Nhận Bài Đăng
                                    </span>
                                </a>
                                <div id="isoft_group_2_content" style="display:none;"></div>
                            </li>
                            
                            <li >
                                <a href="stories_reported.php" id="isoft_group_4" name="group_4" title="Báo Lỗi Bài Đăng" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Báo Lỗi Bài Đăng
                                    </span>
                                </a>
                                <div id="isoft_group_4_content" style="display:none;"></div>
                            </li>
    
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_1', []);
                        </script>
                        
					</div>
                    
					<div class="main-col" id="content">
						<div class="main-col-inner">
							<div id="messages">
                            {if $message ne "" OR $error ne ""}
                            	{include file="administrator/show_message.tpl"}
                            {/if}
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Bài Đăng - Sửa Bài Đăng</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Lưu Thay Đổi</span></button>			
                                </p>
                            </div>
                            
                            <form action="stories_edit.php?PID={$smarty.request.PID}" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>