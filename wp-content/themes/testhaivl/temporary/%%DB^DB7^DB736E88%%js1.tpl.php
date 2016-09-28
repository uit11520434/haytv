<?php /* Smarty version 2.6.6, created on 2014-04-09 06:52:59
         compiled from js1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'makeseo', 'js1.tpl', 26, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function keyfind(e)
{
var code;
if (!e) var e = window.event;
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
var character = String.fromCharCode(code);
var classes=$(\'.entry-item\').length;
if($(\'#header_searchbar\').css(\'display\')!=\'none\'){
character=0;}
if(character ==\'H\' || character ==\'h\'){
$(\'.voteButton1\').trigger(\'click\');
}
if(character ==\'K\' || character ==\'k\'){
window.location.href=$(\'#next_post\').attr(\'href\');
}
if(character ==\'J\' || character ==\'j\'){
window.location.href=$(\'#prev_post\').attr(\'href\');
}
if(character ==\'L\' || character ==\'l\'){
$(\'.voteButton2\').trigger(\'click\');
}
if(character ==\'C\' || character ==\'c\'){
window.location.href = "';  echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>#comments<?php echo '";
}
if(character ==\'R\' || character ==\'r\'){
window.location.href = "';  echo $this->_tpl_vars['baseurl']; ?>
/random<?php echo '";
}
}
</script>
'; ?>