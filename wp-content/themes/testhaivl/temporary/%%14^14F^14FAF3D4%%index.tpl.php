<?php /* Smarty version 2.6.6, created on 2014-04-09 04:18:11
         compiled from administrator/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'administrator/index.tpl', 39, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
    <title><?php echo $this->_tpl_vars['site_name']; ?>
 Admin Panel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" ></meta>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['adminurl']; ?>
/css/reset.css" media="all"></link>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['adminurl']; ?>
/css/boxes.php" media="all"></link>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['adminurl']; ?>
/css/menu.php" media="screen, projection"></link>
    <!--[if IE]>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['adminurl']; ?>
/css/iestyles.css" media="all"></link>
    <![endif]-->
    <!--[if lt IE 7]>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/iehover-fix.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['adminurl']; ?>
/css/below_ie7.css" media="all"></link>
    <![endif]-->
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['adminurl']; ?>
/css/ie7.php" media="all"></link>
    <![endif]-->
</head>
<body id="page-login" onload="document.forms.loginForm.username.focus();">
    <div class="login-container">
        <div class="login-box">
            <form method="post" action="" id="loginForm">

                <fieldset class="login-form">
                    <h2>Đăng Nhập Quản Trị Viên</h2>
                    <div id="messages">
                    	<?php if ($this->_tpl_vars['error'] != ""): ?>
                        <ul class="messages"><li class="error-msg"><ul><li><?php echo $this->_tpl_vars['error']; ?>
</li></ul></li></ul> 
                        <?php endif; ?>                   
                    </div>
                    <div class="input-box input-left"><label for="username">Tên Đăng Nhập:</label><br/>
                        <input type="text" id="username" name="username" value="" class="required-entry input-text"/></div>
                    <div class="input-box input-right"><label for="login">Mật Khẩu:</label><br/>

                        <input type="password" id="password" name="password" class="required-entry input-text" value="" /></div>
                    <div class="clear"></div>
                    <div class="form-buttons" style="margin-right:8px;">
                        <a class="left" href="<?php echo $this->_tpl_vars['baseurl']; ?>
">[ Quay Lại <?php echo ((is_array($_tmp=$this->_tpl_vars['site_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 ]</a>
                        <input onclick="loginForm.submit()" type="submit" name="login" id="login" class="form-button" src="<?php echo $this->_tpl_vars['adminurl']; ?>
/images/btn_login.gif" value="Đăng Nhập"/></div>
                </fieldset>
                <p class="legal">Powered by Gag Việt - Phiên Bản <?php echo $this->_tpl_vars['ver']; ?>
.</p>
				<input type="hidden" name="login" value="Login" />
            </form>
            <div class="bottom"></div>
        </div>
    </div>
</body>
</html>