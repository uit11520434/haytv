 {if $error ne ""}
<p class="form-message error middle">{$error}<br /></p>
{elseif $message ne ""}
<p class="form-message success middle">{$message}<br /></p>
{/if}
<div id="main" class="middle">
    <div id="content-holder">
        <div class="content-title">
            <h3>{$lang45}</h3>
        </div>                      
                                          
        <div id="content">
            <form id="form-settings" class="page" action="" method="post" enctype="multipart/form-data" name="formsettings">
                <div class="field profile-pic">
                    <h4>Ảnh đại diện</h4>
                    <div class="wrap">
                        <div class="image-wrap">
                            {insert name=get_member_profilepicture assign=profilepicture value=var USERID=$smarty.session.USERID url=$membersprofilepicurl}
                            <img id="uploaded_img" width="160px" src="{$membersprofilepicurl}/{$profilepicture}?{$smarty.now}" alt="avatar" />
                        </div>
                        <input class="file" type="file" name="gphoto"  />
                        <p class="info">{$lang54}</p>
                        <p class="remove-avatar"><label><input type="checkbox" name="remove_avatar" value="1"/>{$lang55} ( Sử dụng avatar từ Facebook )</label></p>
                    </div>
                </div>   
				<div class="field profile-pic">
                    <h4>Ảnh bìa</h4>
                    <div class="wrap">
						<div class="image-wrap">
                            <img id="uploaded_img" width="580px" src="{$membersprofilepicurl}/cover/{$p.coverpicture}?{$p.updatetime}" alt="cover" />
                        </div>
                        <input class="file" type="file" name="coverphoto"  />
                        <p class="info">{$lang54}. Kích thước chuẩn 995x260px</p>      
                    </div>
                </div>         
                <!--
                <div class="field colors">
                    <h4>{$lang56}</h4>
                    <div class="wrap">
                        <div class="profile">                        
                            <a id="color_display1" class="color-picker" href="#" style="background-color:#;"><img class="mask" src="{$baseurl}/images/color-mask.png"/></a>                        
                            <input id="color_picker1" type="text" class="text color" style="color:#993366;" name="profile_color" maxlength="6" value="{$p.color1|stripslashes}" />
                        </div>
                        <div class="links">
                            <a id="color_display2" class="color-picker" href="#" style="background-color:#;"><img class="mask" src="{$baseurl}/images/color-mask.png"/></a>
                            <input id="color_picker2" type="text" class="text color" style="color:#993366;" name="link_color" maxlength="6" value="{$p.color2|stripslashes}" />
                        </div>
                    </div>
                    {literal}
                    <script type="text/javascript">
                    $('#color_display1').click(function(){
                    $('#color_picker1').trigger('focus');
                    });
                    $('#color_display2').click(function(){
                    $('#color_picker2').trigger('focus');
                    });
                    $('#color_picker1').change(function(){
                    $('#color_display1').css('background-color',"#"+$('#color_picker1').val());
                    });
                    $('#color_picker2').change(function(){
                    $('#color_display2').css('background-color',"#"+$('#color_picker2').val());
                    });        
                    </script>
                    {/literal}
                    <p class="info">Màu nền</p>
                    <p class="info last">Màu nổi bật</p>
                </div>
				-->
                <hr/>

                <div class="field">
                    <label><h4>Tên đầy đủ:</h4><input type="text" class="text tipped" name="fname" value="{$p.fullname|stripslashes}" maxlength="25" /></label>
                </div>		
				<div class="field">
                    <label><h4>Ngày sinh:</h4><input type="text" class="text tipped" name="birthday" value="{$p.birthday|stripslashes}" maxlength="20" /></label>
                            <p class="info">Ngày sinh có dạng  <b>20/12/1984</b></p>
     </div>
				<div class="field">
                    <h4>Giới tính:</h4>
					<select name=gender>
					<option name=1 value=1 {if $p.gender eq "1"}selected{/if}>Nam</option>
					<option name=0 value=0 {if $p.gender eq "0"}selected{/if}>Nữ</option>
					</select>
                </div>
				<div class="field">
                    <h4>Mối quan hệ:</h4>
					<select name=relationship>
					<option name=0 value=0 {if $p.relationship eq "0"}selected{/if}>Độc thân</option>
					<option name=1 value=1 {if $p.relationship eq "1"}selected{/if}>Đang hẹn hò</option>
					<option name=2 value=2 {if $p.relationship eq "2"}selected{/if}>Đã đính hôn</option>
					<option name=3 value=3 {if $p.relationship eq "3"}selected{/if}>Đã kết hôn</option>
					<option name=4 value=4 {if $p.relationship eq "4"}selected{/if}>Rất phức tạp</option>
					</select>
                </div>
                <div class="field">
                    <label><h4>{$lang20}</h4><input type="text" class="text tipped" name="email" value="{$p.email|stripslashes}" maxlength="200"/></label>
                    <p class="info">{$lang61}</p>
                </div>
                <div class="field">
                    <label><h4>{$lang67}</h4>
                    <textarea id="details" style="width: 303px; height: 100px;" rows="3" name="details" data-val-length-max="200" data-val-length="400" data-val="true">{$p.description|stripslashes}</textarea>
                    </label>
                    <p class="info" style="visibility:hidden">{$lang69}</p>
                </div>

                <div class="field">
                    <label><h4>{$lang70}</h4><input type="text" class="text tipped" name="website" value="{$p.website|stripslashes}" maxlength="200"/></label>
                    <p class="info">{$lang71}. link có dạng <b>http://myfancy.org</b></p>
                </div>
				<div class="field checkbox">
                    <h4>Liên kết Facebook</h4>
                    <ul>                    
                        <li>
                            <label><input type="checkbox" name="showfb" value="1" {if $p.showfb eq "1"}checked="checked"{/if}  />hiện link đến Facebook cá nhân của tôi.</label>
                        </li>
                    </ul>
                </div>
                <hr />
                <div class="field password">
                    <h4>Đổi mật khẩu</h4>
                    <div class="wrap">
                        <div class="first">
                            <input type="password" class="text tipped" name="new_password" maxlength="32"/>
                        </div>
                        <div class="second">
                            <span style="float: left; font-size: 12px; font-weight: normal; line-height: 36px; margin: 0 20px 0 0;">Nhập lại</span>
                            <input type="password" class="text tipped" name="new_password_repeat" maxlength="32"/>
                        </div>
                    </div>
                    <div class="fix-password">
                    <p class="info" style="visibility:hidden">{$lang72}</p>
                    <p class="info last" style="visibility:hidden">{$lang73}</p>
                    </div>
                </div>
                <hr />
                <div class="field checkbox">
                    <h4>{$lang74}</h4>
                    <ul>                    
                        <li>
                            <label><input type="checkbox" name="news" value="1" {if $p.news eq "1"}checked="checked"{/if}  />{$lang75}</label>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="subform" value="1" />
            </form>
            <div class="setting-actions">
                <a class="deactivate" href="{$baseurl}/delete-account">{$lang76}</a>
                <ul class="buttons">
                    <li><a id="settings_submit" class="button" href="#" onClick="document.formsettings.submit();">{$lang77}</a></li>
              </ul>
            </div></div>  </div></div> 
<script type="text/javascript" src="{$baseurl}/js/jscolor.js"></script>