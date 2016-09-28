<?php /* Smarty version 2.6.6, created on 2014-03-04 04:35:20
         compiled from vote2.tpl */ ?>
<div id="main">
    <div id="content-holder">        
        <div class="main-filter ">
            <ul class="content-type">
                <li> <a class="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/hot"><strong><?php echo $this->_tpl_vars['lang172']; ?>
</strong></a></li>
                <li> <a class="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/trending"><strong><?php echo $this->_tpl_vars['lang173']; ?>
</strong></a></li>
                <li> <a class="current" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/vote"><strong><?php echo $this->_tpl_vars['lang174']; ?>
</strong></a></li>                
            </ul>
            <?php if ($_SESSION['USERID'] != ""): ?>
                <?php if ($_SESSION['FILTER'] == '1'): ?>
                <a class="safe-mode-switcher on" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/safe?m=<?php echo $this->_tpl_vars['eurl']; ?>
">&nbsp;</a>
                <?php else: ?>
                <a class="safe-mode-switcher off" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/safe?m=<?php echo $this->_tpl_vars['eurl']; ?>
&o=1">&nbsp;</a>
                <?php endif; ?>
            <?php else: ?>
            	<a class="safe-mode-switcher on" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login">&nbsp;</a>
            <?php endif; ?>
        </div>
        <div id="content" listPage="new">        
            <div class="blank-state big">
            	<h3><?php echo $this->_tpl_vars['lang175']; ?>
</h3>
            	<p><?php echo $this->_tpl_vars['lang176']; ?>
<br/><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/about" target="_blank"><?php echo $this->_tpl_vars['lang177']; ?>
</a> <?php echo $this->_tpl_vars['lang178']; ?>
 <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/signup"><?php echo $this->_tpl_vars['lang179']; ?>
</a></p>
            </div>        
        </div>
    </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'right.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<script type="text/javascript">
var adloca=$(\'#moving-boxes\').offset().top; 
 $(window).scroll(function () { 
    var curloca=$(window).scrollTop();
    if(curloca>adloca){
        $(\'#moving-boxes\').css(\'position\',\'fixed\');
        $(\'#moving-boxes\').css(\'top\',\'50px\');
        $(\'#moving-boxes\').css(\'z-index\',\'200\');
    };
    if(curloca <= adloca){
        $(\'#moving-boxes\').css(\'position\',\'static\');
        $(\'#moving-boxes\').css(\'top\',\'!important\');
        $(\'#moving-boxes\').css(\'z-index\',\'!important\');
    };
    });
</script> 
'; ?>
   
<div id="footer" class="">