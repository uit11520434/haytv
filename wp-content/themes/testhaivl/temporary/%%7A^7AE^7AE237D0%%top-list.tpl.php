<?php /* Smarty version 2.6.6, created on 2014-04-09 06:54:12
         compiled from top-list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_rank', 'top-list.tpl', 5, false),array('insert', 'get_member_profilepicture', 'top-list.tpl', 6, false),array('modifier', 'stripslashes', 'top-list.tpl', 8, false),)), $this); ?>
        <div id="content">
        	<div id="entries-content" class="list">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['topusers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <div class="bxh-detail">
 <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_rank', 'value' => 'var', 'assign' => 'urank', 'pg' => $this->_tpl_vars['page'], 'ite' => $this->_sections['i']['iteration'])), $this); ?>

                	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

          <span class="order-number rank<?php echo $this->_tpl_vars['urank']; ?>
"><?php echo $this->_tpl_vars['urank']; ?>
</span>
<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['topusers'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" style="display: block;margin-left: 10px;
    float: left;
    height: 60px;
    margin-right: 10px;
    width: 60px;">
<img src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php if ($this->_tpl_vars['topusers'][$this->_sections['i']['index']]['profilepicture'] == ""): ?>noprofilepicture.jpg<?php else:  echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['profilepicture'];  endif; ?>?<?php echo time(); ?>
" style="width:60px;height:60px;">
 </a>
                    <div class="meta">
                      <a style="font-size:16px; font-weight: bold; padding-bottom: 5px; margin-bottom: 6px; border-bottom: 1px solid rgb(242, 242, 242); display: block;"><strong><?php echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['fullname']; ?>
</strong></a>
                    	<span style="font-size: 12px; color: rgb(68, 68, 68);">Nick : <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['username']; ?>
"><strong><?php echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['username']; ?>
</strong></a>&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;Bài đăng: <strong><?php echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['TOTAL']; ?>
</strong>&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;Tổng số điểm: <strong><?php echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['LIKES']; ?>
</strong><span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;Tổng lượt xem: <strong><?php echo $this->_tpl_vars['topusers'][$this->_sections['i']['index']]['VIEWS']; ?>
</strong></strong><span style="color: rgb(238, 238, 238);">

                    </div>
               	<div class="clear">           </div> </div>

    			<?php endfor; endif; ?>

 </div>