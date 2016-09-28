<?php /* Smarty version 2.6.6, created on 2014-03-30 01:11:53
         compiled from settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_member_profilepicture', 'settings.tpl', 18, false),array('modifier', 'stripslashes', 'settings.tpl', 42, false),)), $this); ?>
 <?php if ($this->_tpl_vars['error'] != ""): ?>
<p class="form-message error middle"><?php echo $this->_tpl_vars['error']; ?>
<br /></p>
<?php elseif ($this->_tpl_vars['message'] != ""): ?>
<p class="form-message success middle"><?php echo $this->_tpl_vars['message']; ?>
<br /></p>
<?php endif; ?>
<div id="main" class="middle">
    <div id="content-holder">
        <div class="content-title">
            <h3><?php echo $this->_tpl_vars['lang45']; ?>
</h3>
        </div>                      
                                          
        <div id="content">
            <form id="form-settings" class="page" action="" method="post" enctype="multipart/form-data" name="formsettings">
                <div class="field profile-pic">
                    <h4>Ảnh đại diện</h4>
                    <div class="wrap">
                        <div class="image-wrap">
                            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $_SESSION['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

                            <img id="uploaded_img" width="160px" src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php echo $this->_tpl_vars['profilepicture']; ?>
?<?php echo time(); ?>
" alt="avatar" />
                        </div>
                        <input class="file" type="file" name="gphoto"  />
                        <p class="info"><?php echo $this->_tpl_vars['lang54']; ?>
</p>
                        <p class="remove-avatar"><label><input type="checkbox" name="remove_avatar" value="1"/><?php echo $this->_tpl_vars['lang55']; ?>
 ( Sử dụng avatar từ Facebook )</label></p>
                    </div>
                </div>   
				<div class="field profile-pic">
                    <h4>Ảnh bìa</h4>
                    <div class="wrap">
						<div class="image-wrap">
                            <img id="uploaded_img" width="580px" src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/cover/<?php echo $this->_tpl_vars['p']['coverpicture']; ?>
?<?php echo $this->_tpl_vars['p']['updatetime']; ?>
" alt="cover" />
                        </div>
                        <input class="file" type="file" name="coverphoto"  />
                        <p class="info"><?php echo $this->_tpl_vars['lang54']; ?>
. Kích thước chuẩn 995x260px</p>      
                    </div>
                </div>         
                <!--
                <div class="field colors">
                    <h4><?php echo $this->_tpl_vars['lang56']; ?>
</h4>
                    <div class="wrap">
                        <div class="profile">                        
                            <a id="color_display1" class="color-picker" href="#" style="background-color:#;"><img class="mask" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/color-mask.png"/></a>                        
                            <input id="color_picker1" type="text" class="text color" style="color:#993366;" name="profile_color" maxlength="6" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['color1'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
                        </div>
                        <div class="links">
                            <a id="color_display2" class="color-picker" href="#" style="background-color:#;"><img class="mask" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/color-mask.png"/></a>
                            <input id="color_picker2" type="text" class="text color" style="color:#993366;" name="link_color" maxlength="6" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['color2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
                        </div>
                    </div>
                    <?php echo '
                    <script type="text/javascript">
                    $(\'#color_display1\').click(function(){
                    $(\'#color_picker1\').trigger(\'focus\');
                    });
                    $(\'#color_display2\').click(function(){
                    $(\'#color_picker2\').trigger(\'focus\');
                    });
                    $(\'#color_picker1\').change(function(){
                    $(\'#color_display1\').css(\'background-color\',"#"+$(\'#color_picker1\').val());
                    });
                    $(\'#color_picker2\').change(function(){
                    $(\'#color_display2\').css(\'background-color\',"#"+$(\'#color_picker2\').val());
                    });        
                    </script>
                    '; ?>

                    <p class="info">Màu nền</p>
                    <p class="info last">Màu nổi bật</p>
                </div>
				-->
                <hr/>

                <div class="field">
                    <label><h4>Tên đầy đủ:</h4><input type="text" class="text tipped" name="fname" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['fullname'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="25" /></label>
                </div>		
				<div class="field">
                    <label><h4>Ngày sinh:</h4><input type="text" class="text tipped" name="birthday" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['birthday'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="20" /></label>
                            <p class="info">Ngày sinh có dạng  <b>20/12/1984</b></p>
     </div>
				<div class="field">
                    <h4>Giới tính:</h4>
					<select name=gender>
					<option name=1 value=1 <?php if ($this->_tpl_vars['p']['gender'] == '1'): ?>selected<?php endif; ?>>Nam</option>
					<option name=0 value=0 <?php if ($this->_tpl_vars['p']['gender'] == '0'): ?>selected<?php endif; ?>>Nữ</option>
					</select>
                </div>
				<div class="field">
                    <h4>Mối quan hệ:</h4>
					<select name=relationship>
					<option name=0 value=0 <?php if ($this->_tpl_vars['p']['relationship'] == '0'): ?>selected<?php endif; ?>>Độc thân</option>
					<option name=1 value=1 <?php if ($this->_tpl_vars['p']['relationship'] == '1'): ?>selected<?php endif; ?>>Đang hẹn hò</option>
					<option name=2 value=2 <?php if ($this->_tpl_vars['p']['relationship'] == '2'): ?>selected<?php endif; ?>>Đã đính hôn</option>
					<option name=3 value=3 <?php if ($this->_tpl_vars['p']['relationship'] == '3'): ?>selected<?php endif; ?>>Đã kết hôn</option>
					<option name=4 value=4 <?php if ($this->_tpl_vars['p']['relationship'] == '4'): ?>selected<?php endif; ?>>Rất phức tạp</option>
					</select>
                </div>
                <div class="field">
                    <label><h4><?php echo $this->_tpl_vars['lang20']; ?>
</h4><input type="text" class="text tipped" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="200"/></label>
                    <p class="info"><?php echo $this->_tpl_vars['lang61']; ?>
</p>
                </div>
                <div class="field">
                    <label><h4><?php echo $this->_tpl_vars['lang67']; ?>
</h4>
                    <textarea id="details" style="width: 303px; height: 100px;" rows="3" name="details" data-val-length-max="200" data-val-length="400" data-val="true"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                    </label>
                    <p class="info" style="visibility:hidden"><?php echo $this->_tpl_vars['lang69']; ?>
</p>
                </div>

                <div class="field">
                    <label><h4><?php echo $this->_tpl_vars['lang70']; ?>
</h4><input type="text" class="text tipped" name="website" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['website'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="200"/></label>
                    <p class="info"><?php echo $this->_tpl_vars['lang71']; ?>
. link có dạng <b>http://myfancy.org</b></p>
                </div>
				<div class="field checkbox">
                    <h4>Liên kết Facebook</h4>
                    <ul>                    
                        <li>
                            <label><input type="checkbox" name="showfb" value="1" <?php if ($this->_tpl_vars['p']['showfb'] == '1'): ?>checked="checked"<?php endif; ?>  />hiện link đến Facebook cá nhân của tôi.</label>
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
                    <p class="info" style="visibility:hidden"><?php echo $this->_tpl_vars['lang72']; ?>
</p>
                    <p class="info last" style="visibility:hidden"><?php echo $this->_tpl_vars['lang73']; ?>
</p>
                    </div>
                </div>
                <hr />
                <div class="field checkbox">
                    <h4><?php echo $this->_tpl_vars['lang74']; ?>
</h4>
                    <ul>                    
                        <li>
                            <label><input type="checkbox" name="news" value="1" <?php if ($this->_tpl_vars['p']['news'] == '1'): ?>checked="checked"<?php endif; ?>  /><?php echo $this->_tpl_vars['lang75']; ?>
</label>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="subform" value="1" />
            </form>
            <div class="setting-actions">
                <a class="deactivate" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/delete-account"><?php echo $this->_tpl_vars['lang76']; ?>
</a>
                <ul class="buttons">
                    <li><a id="settings_submit" class="button" href="#" onClick="document.formsettings.submit();"><?php echo $this->_tpl_vars['lang77']; ?>
</a></li>
              </ul>
            </div></div>  </div></div> 
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jscolor.js"></script>