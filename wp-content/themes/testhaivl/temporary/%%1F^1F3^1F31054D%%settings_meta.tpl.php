<?php /* Smarty version 2.6.6, created on 2014-02-06 13:40:03
         compiled from administrator/settings_meta.tpl */ ?>
		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Cài Đặt</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="settings_general.php" id="isoft_group_1" name="group_1" title="Cài Đặt Chung" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Cài Đặt Chung
                                    </span>
        						</a>
                                <div id="isoft_group_1_content" style="display:none;"></div>
    						</li>
                            
                            <li >
                                <a href="settings_meta.php" id="isoft_group_9" name="group_9" title="Cài Đặt Thẻ Meta" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Cài Đặt Thẻ Meta
                                    </span>
                                </a>
                                <div id="isoft_group_9_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Cài Đặt Thẻ Meta</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Mô Tả Thẻ Meta </label></td>
                                                        <td class="value">
                                                        	<textarea id="metadescription" name="metadescription" class=" textarea" type="textarea" ><?php echo $this->_tpl_vars['metadescription']; ?>
</textarea>
                                                        </td>
                                                        <td class="scope-label">[MÔ TẢ CHUNG THẺ META]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Từ Khóa Thẻ Meta </label></td>
                                                        <td class="value">
                                                            <textarea id="metakeywords" name="metakeywords" class=" textarea" type="textarea" ><?php echo $this->_tpl_vars['metakeywords']; ?>
</textarea>
                                                        </td>
                                                        <td class="scope-label">[TỪ KHÓA CHUNG THẺ META]</td>
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
                                <a href="settings_static.php" id="isoft_group_11" name="group_11" title="Trang Tĩnh" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Trang Tĩnh
                                    </span>
                                </a>
                                <div id="isoft_group_11_content" style="display:none;"></div>
                            </li>
    
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_9', []);
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
                               <h3 class="icon-head head-products">Cài Đặt - Cài Đặt Thẻ Meta</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Lưu Thay Đổi</span></button>			
                                </p>
                            </div>
                            
                            <form action="settings_meta.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>