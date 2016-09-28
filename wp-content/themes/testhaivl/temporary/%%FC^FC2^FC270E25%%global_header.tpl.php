<?php /* Smarty version 2.6.6, created on 2014-04-09 04:29:57
         compiled from administrator/global_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'administrator/global_header.tpl', 49, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Admin Panel - <?php echo $this->_tpl_vars['site_name']; ?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript">
        var BLANK_URL = '<?php echo $this->_tpl_vars['adminurl']; ?>
/js/blank.html';
        var BLANK_IMG = '<?php echo $this->_tpl_vars['adminurl']; ?>
/js/spacer.gif';
        var BASE_URL = '<?php echo $this->_tpl_vars['adminurl']; ?>
/index.php';
        var SKIN_URL = '<?php echo $this->_tpl_vars['adminurl']; ?>
/js/';
    </script>
	
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/prototype.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/builder.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/effects.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/dragdrop.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/controls.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/slider.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/accordin.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/events.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/loader.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/tabs.js" type="text/javascript"></script>
    <script src="<?php echo $this->_tpl_vars['adminurl']; ?>
/js/tools.js" type="text/javascript"></script>
    
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

<body id="html-body">

	<div class="wrapper">
        <div class="header">
        
            <div class="header-top">
    			<a href="<?php echo $this->_tpl_vars['adminurl']; ?>
/home.php"><img src="<?php echo $this->_tpl_vars['adminurl']; ?>
/images/logo.png" alt="Logo" class="logo"/></a>
    			<div class="header-right">
                    <p class="super">
                        Xin chào <?php echo $_SESSION['ADMINUSERNAME']; ?>
<span class="separator">|</span><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>
<span class="separator">|</span><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
" target="_blank">Xem Trang</a><span class="separator">|</span><a href="logout.php" class="link-logout">Đăng Xuất</a>
                    </p>
            	</div>
			</div>
            
        	<div class="clear"></div>

            <div class="nav-bar">
            	<ul id="nav">
                	<li  class="  <?php if ($this->_tpl_vars['mainmenu'] == "" || $this->_tpl_vars['mainmenu'] == '1'): ?>active<?php endif; ?>  level0"> <a href="home.php" class="active"><span>Trang Chủ</span></a></li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '2'): ?>active<?php endif; ?> parent level0"> <a href="#" onclick="return false" class=""><span>Cài Đặt</span></a>
                    	<ul >
                    		<li  class="   level1"> <a href="settings_general.php" class=""><span>Cài Đặt Chung</span></a></li>
                    		<li  class="   level1"> <a href="settings_meta.php" class=""><span>Cài Đặt Thẻ Meta</span></a></li>
                            <li  class="   last level1"> <a href="settings_static.php" class=""><span>Trang Tĩnh</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '4'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Bài Đăng</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="stories_manage.php" class=""><span>Quản Lý Bài Đăng</span></a></li>
                            <li  class="   level1"> <a href="stories_validate.php" class=""><span>Xác Nhận Bài Đăng</span></a></li>
                            <li  class="   last level1"> <a href="stories_reported.php" class=""><span>Báo Lỗi Bài Đăng</span></a></li>
                        </ul>
                    </li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '6'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Kênh</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="ch_manage.php" class=""><span>Quản Lý Kênh</span></a></li>
                            <li  class="   last level1"> <a href="ch_create.php" class=""><span>Tạo Kênh</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '7'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Thành Viên</span></a>
                    	<ul >
						    <li  class="   level1"> <a href="members_manage.php" class=""><span>Quản Lý Thành Viên</span></a></li>
							<li  class="   level1"> <a href="members_create.php" class=""><span>Tạo Thành Viên</span></a></li>
                            <li  class="   last level1"> <a href="members_newsletter.php" class=""><span>Gửi Thư</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '11'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Quảng Cáo</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="ads_manage.php" class=""><span>Quản Lý Quảng Cáo</span></a></li>
                            <li  class="   last level1"> <a href="ads_create.php" class=""><span>Tạo Quảng Cáo</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '5'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Cấm IP</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="bans_ip.php" class=""><span>IP Bị Cấm</span></a></li>
                            <li  class="   last level1"> <a href="bans_ip_add.php" class=""><span>Thêm IP</span></a></li>
                        </ul>
                    </li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '12'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Quản Trị Viên</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="admins_manage.php" class=""><span>Quản Lý Quản Trị Viên</span></a></li>
                            <li  class="   last level1"> <a href="admins_create.php" class=""><span>Tạo Quản Trị Viên</span></a></li>
                        </ul>
                    </li>
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if ($this->_tpl_vars['mainmenu'] == '13'): ?>active<?php endif; ?>   parent level0"> <a href="#"  onclick="return false" class=""><span>Sitemap</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="sitemap.php"   class=""><span>Tạo Sitemap</span></a></li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>