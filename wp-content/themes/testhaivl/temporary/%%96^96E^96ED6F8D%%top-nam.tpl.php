<?php /* Smarty version 2.6.6, created on 2014-04-09 06:54:12
         compiled from top-nam.tpl */ ?>
<div id="main">
    <div id="content-holder">
        <div class="post-info-pad">
            <h1>Bảng xếp hạng - Năm</h1>
        </div>
		<div class="main-filter ">
            <ul class="content-type">
                <li> <a class="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers"><strong>Tuần</strong></a></li>
                <li> <a class="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers?t=thang"><strong>Tháng</strong></a></li>
                <li> <a class="current" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers?t=nam"><strong>Năm</strong></a></li>
				<li> <a class="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers?t=all"><strong>Tất cả</strong></a></li>
                <li> <a class="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top?t=baihot"><strong>Bài Hot Trong Tuần</strong></a></li>     
            </ul>
        </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'top-list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <div id="paging-buttons" class="paging-buttons">
            	<?php if ($this->_tpl_vars['tpp'] != ""): ?>
                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers?t=nam&page=<?php echo $this->_tpl_vars['tpp']; ?>
" class="previous">&laquo; <?php echo $this->_tpl_vars['lang166']; ?>
</a>
                <?php else: ?>
                <a href="#" onclick="return false;" class="previous disabled">&laquo; <?php echo $this->_tpl_vars['lang166']; ?>
</a>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['tnp'] != ""): ?>
                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers?t=nam&page=<?php echo $this->_tpl_vars['tnp']; ?>
" class="older"><?php echo $this->_tpl_vars['lang167']; ?>
 &raquo;</a>
                <?php else: ?>
                <a href="#" onclick="return false;" class="older disabled"><?php echo $this->_tpl_vars['lang167']; ?>
 &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'right.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  