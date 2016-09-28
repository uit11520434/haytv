<?php /* Smarty version 2.6.6, created on 2014-04-09 04:21:45
         compiled from administrator/ads_manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'administrator/ads_manage.tpl', 86, false),)), $this); ?>
		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Quảng Cáo</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="ads_manage.php" id="isoft_group_1" name="group_1" title="Quảng Cáo" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Quảng Cáo
                                    </span>
        						</a>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Quảng Cáo</h4>
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
 Quảng Cáo
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='ads_manage.php'" style=""><span>Reset Bộ Lọc</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Tìm Kiếm</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="50"  width="100px"  />
                                <col   />
                                <col  width="50"  />
                                <col  width="215"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                        <th ><span class="nobr"><a href="ads_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=AID&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'AID'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
&active=<?php echo $this->_tpl_vars['active'];  endif; ?>" name="id" class="<?php if ($this->_tpl_vars['sortby'] == 'AID'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">ID</span></a></span></th>
                                        <th ><span class="nobr"><a href="ads_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=details&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'details'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&$toid=<?php echo $this->_tpl_vars['toid']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
&active=<?php echo $this->_tpl_vars['active'];  endif; ?>" name="details" class="<?php if ($this->_tpl_vars['sortby'] == 'details'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">Mô Tả</span></a></span></th>
                                        <th ><span class="nobr"><a href="ads_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=active&sorthow=<?php if ($this->_tpl_vars['sortby'] == 'active'):  if ($this->_tpl_vars['sorthow'] == 'desc'): ?>asc<?php else: ?>desc<?php endif;  else:  echo $this->_tpl_vars['sorthow'];  endif;  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&$toid=<?php echo $this->_tpl_vars['toid']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
&active=<?php echo $this->_tpl_vars['active'];  endif; ?>" name="active" class="<?php if ($this->_tpl_vars['sortby'] == 'active'): ?>sort-arrow-<?php if ($this->_tpl_vars['sorthow'] == 'desc'): ?>desc<?php else: ?>asc<?php endif;  else: ?>not-sort<?php endif; ?>"><span class="sort-title">Kích Hoạt</span></a></span></th>
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
                                        <th ><input type="text" name="details" id="details" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['details'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="input-text no-changes"/></th>
                                        <th ><input type="checkbox" name="active" id="active" <?php if ($this->_tpl_vars['active'] == 'on'): ?>checked="checked"<?php endif; ?>></th>
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
                                        <td align="center"><?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
</td>
                                        <td class=" "><?php echo ((is_array($_tmp=$this->_tpl_vars['results'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
                                        <td class=" ">
                                        	<form name="a<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
" id="a<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
" action="" method="post">
                                            <input type="hidden" name="AAID" value="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
" />
                                            <input type="hidden" name="asub" value="1" />
                                            <input type="hidden" name="aval" value="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['active']; ?>
" />
                                            </form>
                                        	<a href="javascript: document.a<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
.submit();"><?php if ($this->_tpl_vars['results'][$this->_sections['i']['index']]['active'] == '1'): ?>Có<?php else: ?>Không<?php endif; ?></a>
                                        </td>
                                        <td class=" last">
                                        	<a href="ads_preview.php?AID=<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
">Xem Trước</a>&nbsp;|&nbsp;
                                            <a href="ads_code.php?AID=<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
">Mã Chèn</a>&nbsp;|&nbsp;
                                        	<a href="ads_edit.php?AID=<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
">Sửa</a>&nbsp;|&nbsp;
                                            <a href="ads_manage.php?page=<?php echo $this->_tpl_vars['currentpage']; ?>
&sortby=<?php echo $this->_tpl_vars['sortby']; ?>
&sorthow=<?php echo $this->_tpl_vars['sorthow'];  if ($this->_tpl_vars['search'] == '1'): ?>&fromid=<?php echo $this->_tpl_vars['fromid']; ?>
&toid=<?php echo $this->_tpl_vars['toid']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
&active=<?php echo $this->_tpl_vars['active'];  endif; ?>&delete=1&AID=<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['AID']; ?>
">Xóa</a>
                                        </td>
                                	</tr>
                                    <?php endfor; endif; ?>
                                    <tr>
                                    	<td colspan="4">
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
                                <a href="ads_create.php" id="isoft_group_2" name="group_2" title="Tạo Quảng Cáo" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Tạo Quảng Cáo
                                    </span>
                                </a>
                                <div id="isoft_group_2_content" style="display:none;"></div>
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
                               <h3 class="icon-head head-products">Quảng Cáo - Quảng Cáo</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable add" onclick="document.location.href='ads_create.php'" style=""><span>Tạo Quảng Cáo</span></button>			
                               </p>
                            </div>
                            
                            <form action="ads_manage.php" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>