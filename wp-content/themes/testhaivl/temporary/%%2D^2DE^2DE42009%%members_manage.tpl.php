<?php /* Smarty version 2.6.6, created on 2014-03-30 01:12:13
         compiled from administrator/members_manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'administrator/members_manage.tpl', 91, false),array('modifier', 'truncate', 'administrator/members_manage.tpl', 105, false),array('modifier', 'date_format', 'administrator/members_manage.tpl', 115, false),)), $this); ?>
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
                                            <h4 class="icon-head head-edit-form fieldset-legend">Quản Lý Thành Viên</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">
                            	Hiển thị <?php if ($this->_tpl_vars['total'] > 0):  echo $this->_tpl_vars['beginning']; ?>
 - <?php echo $this->_tpl_vars['ending']; ?>
 trên tổng số <?php endif;  echo $this->_tpl_vars['total']; ?>
 Thành Viên
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='members_manage.php'" style=""><span>Reset Bộ Lọc</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Tìm Kiếm</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="50"  width="100px"  />
                                <col  width="150"  />
                                <col   />
                                <col  width="50"  />
                                <col  width="100"  />
                                <col  width="50"  />
                                <col  width="125"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                        <th ><span class="nobr"><a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=USERID&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'USERID'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>" name="id" class="<?php if ($this->_tpl_vars['sortby'] == 'USERID'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">ID</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=username&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'username'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>" name="username" class="<?php if ($this->_tpl_vars['sortby'] == 'username'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">Tên Đăng Nhập</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=email&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'email'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>" name="email" class="<?php if ($this->_tpl_vars['sortby'] == 'email'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">E-Mail</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=verified&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'verified'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>" name="verified" class="<?php if ($this->_tpl_vars['sortby'] == 'verified'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">Đã Xác Nhận</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=addtime&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'addtime'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>" name="addtime" class="<?php if ($this->_tpl_vars['sortby'] == 'addtime'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">Ngày Tham Gia</span></a></span></th>
                                        <th ><span class="nobr"><a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=status&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'status'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>" name="status" class="<?php if ($this->_tpl_vars['sortby'] == 'status'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">Kích Hoạt</span></a></span></th>
                                        <th  class=" no-link last"><span class="nobr">Hành Động</span></th>
	                	            </tr>
	            	            	<tr class="filter">
                                        <th >
                                            <div class="range">
                                                <div class="range-line">
                                                    <span class="label">Từ: </span> 
                                                    <input type="text" name="fromid" id="fromid" value="<?php echo $this->_tpl_vars['fromid']; ?>
" class="input-text no-changes"/>
                                                </div>
                                                <div class="range-line">
                                                    <span class="label">Tới: </span>
                                                    <input type="text" name="toid" id="toid" value="<?php echo $this->_tpl_vars['toid']; ?>
" class="input-text no-changes"/>
                                                </div>
                                            </div>
                                        </th>
                                        <th ><input type="text" name="username" id="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="email" id="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="input-text no-changes"/></th>
                                        <th ><input type="checkbox" name="verified" id="verified" <?php if ($this->_tpl_vars['verified'] == 'on'): ?>checked="checked"<?php endif; ?>></th>
                                        <th></th>
                                        <th ><input type="checkbox" name="status" id="status" <?php if ($this->_tpl_vars['status'] == 'on'): ?>checked="checked"<?php endif; ?>></th>
                                        <th  class=" no-link last">
                                            <div style="width: 100%;">&nbsp;</div>
                                        </th>
	                	            </tr>
	            	        	</thead>
	    	    	    		<tbody>
                                	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['results']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <tr id="" >
                                        <td align="center"><?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
</td>
                                        <td class=" "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['results'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>
</td>
                                        <td class=" "><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['results'][$this->_sections['i']['index']]['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 150, "...", true) : smarty_modifier_truncate($_tmp, 150, "...", true)); ?>
</td>
                                        <td class=" ">
                                        	<form name="v<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
" id="v<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
" action="" method="post">
                                            <input type="hidden" name="VUSERID" value="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
" />
                                            <input type="hidden" name="vsub" value="1" />
                                            <input type="hidden" name="vval" value="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['verified']; ?>
" />
                                            </form>
                                        	<a href="javascript: document.v<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
.submit();"><?php if ($this->_tpl_vars['results'][$this->_sections['i']['index']]['verified'] == '1'): ?>Có<?php else: ?>Không<?php endif; ?></a>
                                        </td>
                                        <td class=" "><?php echo ((is_array($_tmp=$this->_tpl_vars['results'][$this->_sections['i']['index']]['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %e, %Y") : smarty_modifier_date_format($_tmp, "%b %e, %Y")); ?>
</td>
                                        <td class=" ">
                                        	<form name="a<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
" id="a<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
" action="" method="post">
                                            <input type="hidden" name="AUSERID" value="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
" />
                                            <input type="hidden" name="asub" value="1" />
                                            <input type="hidden" name="aval" value="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['status']; ?>
" />
                                            </form>
                                        	<a href="javascript: document.a<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
.submit();"><?php if ($this->_tpl_vars['results'][$this->_sections['i']['index']]['status'] == '1'): ?>Có<?php else: ?>Không<?php endif; ?></a>
                                        </td>
                                        <td class=" last"><a href="members_edit.php?USERID=<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
">Sửa</a>&nbsp;|&nbsp;<a href="members_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=<?php echo $this->_tpl_vars['sortby']; ?>
&sorthow=<?php echo $this->_tpl_vars['sorthow'];  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>
&email=<?php echo $this->_tpl_vars['email']; ?>
&verified=<?php echo $this->_tpl_vars['verified']; ?>
&familyfilter=<?php echo $this->_tpl_vars['familyfilter']; ?>
&featured=<?php echo $this->_tpl_vars['featured']; ?>
&status=<?php echo $this->_tpl_vars['status'];  endif; ?>&delete=1&USERID=<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['USERID']; ?>
">Xóa</a></td>
                                	</tr>
                                    <?php endfor; endif; ?>
                                    <tr>
                                    	<td colspan="7">
                                        <?php echo $this->_tpl_vars['pagelinks']; ?>

                                        </td>
                                    </tr>
	    	    	    		</tbody>
								</table>
                            </div>
                        </div>
					</div>
				</div>
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
                            <?php if ($this->_tpl_vars['message'] != "" || $this->_tpl_vars['error'] != ""): ?>
                            	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "administrator/show_message.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php endif; ?>
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Thành Viên - Quản Lý Thành Viên</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable add" onclick="document.location.href='members_create.php'" style=""><span>Tạo Thành Viên</span></button>			
                               </p>
                            </div>
                            
                            <form action="members_manage.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>