<?php /* Smarty version 2.6.6, created on 2014-02-22 03:23:22
         compiled from administrator/stories_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_all_users', 'administrator/stories_edit.tpl', 59, false),array('insert', 'return_youtube', 'administrator/stories_edit.tpl', 196, false),array('modifier', 'stripslashes', 'administrator/stories_edit.tpl', 61, false),array('modifier', 'date_format', 'administrator/stories_edit.tpl', 119, false),array('modifier', 'strip_mq_gpc', 'administrator/stories_edit.tpl', 199, false),)), $this); ?>
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
                                                        	<?php echo $this->_tpl_vars['story']['PID']; ?>

                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="USERID">Người Đăng </label></td>
                                                        <td class="value">
                                                        	<select name="USERID" id="USERID">
                                                            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_all_users', 'assign' => 'listallcats')), $this); ?>

                                                            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['listallcats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                                                            <option value="<?php echo $this->_tpl_vars['listallcats'][$this->_sections['i']['index']]['USERID']; ?>
" <?php if ($this->_tpl_vars['story']['USERID'] == $this->_tpl_vars['listallcats'][$this->_sections['i']['index']]['USERID']): ?>selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['listallcats'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                                            <?php endfor; endif; ?>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[CHỦ NHÂN CỦA BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Tiêu Đề </label></td>
                                                        <td class="value">
                                                        	<input id="story" name="story" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TIÊU ĐỀ CỦA BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Từ Khóa </label></td>
                                                        <td class="value">
                                                        	<input id="tags" name="tags" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['tags'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TỪ KHÓA CỦA BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Nguồn </label></td>
                                                        <td class="value">
                                                        	<input id="source" name="source" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['source'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NGUỒN CỦA BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
													<tr class="hidden">
                                                        <td class="label"><label for="name">Kênh </label></td>
                                                        <td class="value">
                                                        	<select name="CID" id="CID">
															<option value=""><?php echo $this->_tpl_vars['lang270']; ?>
</option>
															<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['c']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>                  
															<option value="<?php echo $this->_tpl_vars['c'][$this->_sections['i']['index']]['CID']; ?>
" <?php if ($this->_tpl_vars['c'][$this->_sections['i']['index']]['CID'] == $this->_tpl_vars['story']['CID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['c'][$this->_sections['i']['index']]['cname']; ?>
</option>
															<?php endfor; endif; ?>
															</select>                        
                                                        </td>
                                                        <td class="scope-label">[KÊNH LIÊN QUAN ĐẾN BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="nsfw">Nội Dung 18+ </label></td>
                                                        <td class="value">
                                                        	<select name="nsfw" id="nsfw">
                                                            <option value="1" <?php if ($this->_tpl_vars['story']['nsfw'] == 1): ?>selected<?php endif; ?>>Có</option>
                                                            <option value="0" <?php if ($this->_tpl_vars['story']['nsfw'] == 0): ?>selected<?php endif; ?>>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[BÀI ĐĂNG DÀNH CHO NGƯỜI TRÊN 18 TUỔI]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Ngày Đăng </label></td>
                                                        <td class="value">
                                                        	<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['time_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %e, %Y") : smarty_modifier_date_format($_tmp, "%b %e, %Y")); ?>

                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
													<tr class="hidden">
                                                        <td class="label"><label for="postviewed">Lượt Xem </label></td>
                                                        <td class="value">
                                                        	<input id="postviewed" name="postviewed" value="<?php echo $this->_tpl_vars['story']['postviewed']; ?>
" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ LƯỢT XEM BÀI ĐĂNG]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="favclicks">Lượt Thích </label></td>
                                                        <td class="value">
                                                        	<input id="favclicks" name="favclicks" value="<?php echo $this->_tpl_vars['story']['favclicks']; ?>
" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ LẦN NHẤN NÚT THÍCH]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="unfavclicks">Lượt Không Thích </label></td>
                                                        <td class="value">
                                                        	<input id="unfavclicks" name="unfavclicks" value="<?php echo $this->_tpl_vars['story']['unfavclicks']; ?>
" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SỐ LẦN NHẤN NÚT KHÔNG THÍCH]</td>
                                                            <td><small></small></td>
                                                    </tr>
													<tr class="hidden">
                                                        <td class="label"><label for="phase">Trang Hiển Thị </label></td>
                                                        <td class="value">
                                                        	<select name="phase" id="phase">
                                                            <option value="2" <?php if ($this->_tpl_vars['story']['phase'] == 2): ?>selected<?php endif; ?>>Đang Hot</option>
                                                            <option value="1" <?php if ($this->_tpl_vars['story']['phase'] == 1): ?>selected<?php endif; ?>>Bài Mới</option>
                                                            <option value="0" <?php if ($this->_tpl_vars['story']['phase'] == 0): ?>selected<?php endif; ?>>Bình Chọn</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TRANG HIỂN THỊ BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Kích Hoạt </label></td>
                                                        <td class="value">
                                                        	<select name="active" id="active">
                                                            <option value="1" <?php if ($this->_tpl_vars['story']['active'] == 1): ?>selected<?php endif; ?>>Có</option>
                                                            <option value="0" <?php if ($this->_tpl_vars['story']['active'] == 0): ?>selected<?php endif; ?>>Không</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TÌNH TRẠNG BÀI ĐĂNG]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Lần Xem Cuối </label></td>
                                                        <td class="value">
                                                        	<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['last_viewed'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %e, %Y") : smarty_modifier_date_format($_tmp, "%b %e, %Y")); ?>

                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Địa Chỉ IP </label></td>
                                                        <td class="value">
                                                        	<a href="<?php echo $this->_tpl_vars['adminurl']; ?>
/bans_ip_add.php?add=<?php echo $this->_tpl_vars['story']['pip']; ?>
" target="_blank"><?php echo $this->_tpl_vars['story']['pip']; ?>
</a>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Nội Dung </label></td>
                                                        <td class="value" colspan="3">
                                                        	<center>
                                                            <?php if ($this->_tpl_vars['story']['pic'] != ""): ?>
                                                            <img src="<?php echo $this->_tpl_vars['purl']; ?>
/<?php echo $this->_tpl_vars['story']['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"/>
                                                            <?php else: ?>
                                                                <?php if ($this->_tpl_vars['story']['youtube_key'] != ""): ?>
                                                                <center>
                                                                <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'return_youtube', 'value' => 'a', 'assign' => 'youtube', 'youtube' => $this->_tpl_vars['story']['youtube_key'])), $this);  echo $this->_tpl_vars['youtube']; ?>

                                                                </center>
                                                                <?php elseif ($this->_tpl_vars['story']['contents'] != ""): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['story']['contents'])) ? $this->_run_mod_handler('strip_mq_gpc', true, $_tmp) : strip_mq_gpc($_tmp)); ?>

                                                                <?php else: ?>
                                                                <img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/error.jpg" alt="Không tìm thấy dữ liệu"/>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
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
                            <?php if ($this->_tpl_vars['message'] != "" || $this->_tpl_vars['error'] != ""): ?>
                            	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "administrator/show_message.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php endif; ?>
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Bài Đăng - Sửa Bài Đăng</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Lưu Thay Đổi</span></button>			
                                </p>
                            </div>
                            
                            <form action="stories_edit.php?PID=<?php echo $_REQUEST['PID']; ?>
" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>