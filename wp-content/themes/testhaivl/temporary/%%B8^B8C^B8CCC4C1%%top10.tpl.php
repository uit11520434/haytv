<?php /* Smarty version 2.6.6, created on 2013-12-15 11:59:59
         compiled from top10.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_member_profilepicture', 'top10.tpl', 11, false),array('insert', 'get_posts_counts', 'top10.tpl', 16, false),array('modifier', 'stripslashes', 'top10.tpl', 12, false),)), $this); ?>
<div class="top-10">
<div class="widget widget-member-top">
<h3>Top năng động
<a style="float:right; font-size:12px" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top"><b><i>xem thêm »</i></b></a></h3>

<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['top']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

<ul class="widget-content">
<li class="member-top-item">

<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $this->_tpl_vars['top'][$this->_sections['i']['index']]['USERID'])), $this); ?>

<a class="thumb" target="_blank" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['top'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
<img src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php echo $this->_tpl_vars['profilepicture']; ?>
?<?php echo time(); ?>
">
</a>
<span class="number-pos">
<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_posts_counts', 'value' => 'var', 'assign' => 'totpo', 'USERID' => $this->_tpl_vars['top'][$this->_sections['i']['index']]['USERID'])), $this);  echo $this->_tpl_vars['totpo']; ?>

</span>

<ul>
<li>
<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['top'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['top'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</strong>
</a>
</li>

<li>
<strong><?php echo $this->_tpl_vars['top'][$this->_sections['i']['index']]['points']; ?>
</strong> <?php echo $this->_tpl_vars['lang256']; ?>

</li>

<li>
<strong><?php echo $this->_tpl_vars['top'][$this->_sections['i']['index']]['youviewed']; ?>
</strong> <?php echo $this->_tpl_vars['lang254']; ?>

</li>
</ul>
<div class="clearfix"></div>
</li>
</ul>

<?php endfor; endif; ?>
