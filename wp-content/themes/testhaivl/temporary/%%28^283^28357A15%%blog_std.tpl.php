<?php /* Smarty version 2.6.6, created on 2014-02-22 06:15:42
         compiled from blog_std.tpl */ ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="list-content">
                <?php if ($this->_tpl_vars['blogtype'] == 0): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "myfancy_bit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "posts_bit_blog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
            </div>
            <div class="loading"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/loading.gif"/> Đang tải...</div>
            <div class="buttonNext" pageUrl="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php if ($this->_tpl_vars['blogtype'] == 0): ?>chemgio<?php endif;  if ($this->_tpl_vars['blogtype'] == 1): ?>tamsu<?php endif;  if ($this->_tpl_vars['blogtype'] == 2): ?>tinhot<?php endif; ?>/" page="<?php echo $this->_tpl_vars['tnp']; ?>
">Nữa đi, đừng dừng lại...</div>
        </div>
        <div class="col-md-4">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
</div>
