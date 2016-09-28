		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Thành Viên</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="members_manage.php" id="isoft_group_1" name="group_1" title="Quản Lý Thành Viên" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Quản Lý Thành Viên
                                    </span>
        						</a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Sửa Thành Viên</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">ID thành viên</label></td>
                                                        <td class="value">
                                                        	{$member.USERID}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Tên đăng nhập </label></td>
                                                        <td class="value">
                                                        	<input id="username" name="username" value="{$member.username|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÊN ĐĂNG NHẬP CỦA THÀNH VIÊN]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">E-Mail </label></td>
                                                        <td class="value">
                                                        	<input id="email" name="email" value="{$member.email|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ĐỊA CHỈ EMAIL CỦA THÀNH VIÊN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="fullname">Tên đầy đủ </label></td>
                                                        <td class="value">
                                                        	<input id="fullname" name="fullname" value="{$member.fullname|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TÊN ĐẦY ĐỦ CỦA THÀNH VIÊN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Thông tin </label></td>
                                                        <td class="value">
                                                        	<textarea id="vdescription" name="vdescription" class=" textarea" type="textarea" >{$member.description|stripslashes}</textarea>
                                                        </td>
                                                        <td class="scope-label">[THÔNG TIN CỦA THÀNH VIÊN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="fullname">Website </label></td>
                                                        <td class="value">
                                                        	<input id="website" name="website" value="{$member.website|stripslashes}" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[WEBSITE CỦA THÀNH VIÊN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Ngày tham gia </label></td>
                                                        <td class="value">
                                                        	{$member.addtime|date_format:"%b %e, %Y"}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Đăng nhập gần đây </label></td>
                                                        <td class="value">
                                                        	{$member.lastlogin|date_format:"%b %e, %Y"}
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Đã xác nhận e-mail </label></td>
                                                        <td class="value">
                                                        	<select name="verified" id="verified">
                                                            <option value="1" {if $member.verified eq 1}selected{/if}>Có</option>
                                                            <option value="0" {if $member.verified eq 0}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ĐÃ XÁC NHẬN ĐỊA CHỈ E-MAIL]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Kích hoạt </label></td>
                                                        <td class="value">
                                                        	<select name="status" id="status">
                                                            <option value="1" {if $member.status eq 1}selected{/if}>Có</option>
                                                            <option value="0" {if $member.status eq 0}selected{/if}>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[KÍCH HOẠT TÀI KHOẢN THÀNH VIÊN]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Mật khẩu mới </label></td>
                                                        <td class="value">
                                                        	<input id="newpass2" name="newpass2" value="" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[CHỈ ĐIỀN VÀO ĐÂY NẾU MUỐN THAY ĐỔI MẬT KHẢU HIỆN TẠI CỦA THÀNH VIÊN]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">IP đăng ký</label></td>
                                                        <td class="value">
                                                        	<a href="{$adminurl}/bans_ip_add.php?add={$member.ip}" target="_blank">{$member.ip}</a>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">IP gần đây</label></td>
                                                        <td class="value">
                                                        	<a href="{$adminurl}/bans_ip_add.php?add={$member.lip}" target="_blank">{$member.lip}</a>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                               
                                
                                
                                
    						</li>
                            <li >
                                <a href="members_create.php" id="isoft_group_2" name="group_2" title="Tạo Thành Viên" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Tạo Thành Viên
                                    </span>
                                </a>
                                <div id="isoft_group_2_content" style="display:none;"></div>
                            </li>
							<li >
        						<a href="members_newsletter.php" id="isoft_group_4" name="group_4" title="Gửi Thư" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Gửi Thư
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
                               <h3 class="icon-head head-products">Thành Viên - Sửa Thành Viên</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Lưu Thay Đổi</span></button>			
                                </p>
                            </div>
                            
                            <form action="members_edit.php?USERID={$smarty.request.USERID}" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>