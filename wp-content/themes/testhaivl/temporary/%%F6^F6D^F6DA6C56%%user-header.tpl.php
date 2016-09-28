<?php /* Smarty version 2.6.6, created on 2014-04-09 06:47:38
         compiled from user-header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_member_profilepicture', 'user-header.tpl', 12, false),array('insert', 'get_follow_status', 'user-header.tpl', 16, false),array('insert', 'get_relationship', 'user-header.tpl', 46, false),array('insert', 'get_user_level', 'user-header.tpl', 47, false),array('insert', 'get_user_posts', 'user-header.tpl', 48, false),array('insert', 'get_user_rank', 'user-header.tpl', 81, false),array('modifier', 'stripslashes', 'user-header.tpl', 13, false),array('modifier', 'number_format', 'user-header.tpl', 53, false),)), $this); ?>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<div class="cover-img" <?php if ($this->_tpl_vars['p']['coverpicture'] != ""): ?>style="background-image: url('<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/cover/<?php echo $this->_tpl_vars['p']['coverpicture']; ?>
?<?php echo $this->_tpl_vars['p']['updatetime']; ?>
');"<?php endif; ?>></div>

<div id="userProfile">
    <div class="profile-info">
		<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $this->_tpl_vars['p']['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'], 'l' => 1, 'w' => 120, 'h' => 120)), $this); ?>

        <a class="avatar align-left" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php echo $this->_tpl_vars['profilepicture']; ?>
?<?php echo time(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" /></a> 
        <a class="username" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['fullname'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</b> (<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
)</a>
		<?php if ($_SESSION['USERID'] != "" && $_SESSION['USERID'] != $this->_tpl_vars['p']['USERID']): ?>
		<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_follow_status', 'value' => 'var', 'assign' => 'isfollow', 'USERID' => $this->_tpl_vars['p']['USERID'])), $this); ?>

		<a id="follow_user" class="follow <?php if ($this->_tpl_vars['isfollow'] == '1'): ?>following<?php endif; ?>" href="javascript:void(0);"><?php if ($this->_tpl_vars['isfollow'] == '1'): ?>Đã theo dõi<?php else: ?>Theo dõi<?php endif; ?></a>
		<?php echo '
		<script type="text/javascript">
			$(\'#follow_user\').click(function(){
				if( $(\'#follow_user\').hasClass(\'following\')){
					$(\'#follow_user\').removeClass(\'following\');
					$(\'#follow_user\').html(\'Theo dõi\');
				followuser(-1);
				}else{
					followuser(1);
				$(\'#follow_user\').addClass(\'following\');
				$(\'#follow_user\').html(\'Đã theo dõi\');
				}
				});
			function followuser(x){
				jQuery.ajax({
					type:\'POST\',
					url:\'';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/followuser.php\',
					data:\'art=\'+x+\'&uid=\' +  \'';  echo $this->_tpl_vars['p']['USERID'];  echo '\' ,
					success:function(e){
						$(\'#followers\').html(e);
						}
					});
				}
		</script>
		'; ?>

		<?php endif; ?>
		<div class="clear"></div>
		<p class="profile-desc"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>
		<p class="profile-desc" style="font-size:0.8em;">Ngày sinh: <?php echo $this->_tpl_vars['p']['birthday']; ?>
 | Giới tính: <?php if ($this->_tpl_vars['p']['gender'] == 1): ?>Nam<?php else: ?>Nữ<?php endif; ?> | Mối quan hệ: <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_relationship', 'r' => $this->_tpl_vars['p']['relationship'])), $this); ?>
</p>
		<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_user_level', 'assign' => 'alvl', 'value' => 'var', 'POINT' => $this->_tpl_vars['p']['points'])), $this); ?>

		<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_user_posts', 'assign' => 'userposts', 'USERID' => $this->_tpl_vars['p']['USERID'])), $this); ?>


		<ul class="user-stat">
            <li>
                
                    <span class="stat-numb"><?php echo ((is_array($_tmp=$this->_tpl_vars['userposts'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</span>
                    <span class="stat-type">Bài đăng</span>
                
            </li>
            <li>
                
                    <span class="stat-numb"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['points'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</span>
                    <span class="stat-type">Tổng điểm</span>
               
            </li>
            <li>
                
                    <span class="stat-numb"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['yourviewed'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</span>
                    <span class="stat-type">Lượt xem</span>
 
            </li>
			<li>
                
                    <span class="stat-numb"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['youviewed'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
</span>
                    <span class="stat-type">T&#7893;ng ti&#7873;n</span>
 
            </li>
        </ul>
        <div id="user_badges">
			<ul class="list-badge">
				<li>
					<div class="lv" title="Xếp hạng">
						<span class="stat-type">Rank</span>
						<span class="stat-numb" ><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_user_rank', 'USERID' => $this->_tpl_vars['p']['USERID'])), $this); ?>
</span>
					</div>
				</li>
				<li>
					<div class="lv" title="Cấp độ" style="background:#DE6F0D;">
						<span class="stat-type">Level</span>
						<span class="stat-numb" ><?php echo $this->_tpl_vars['alvl'][2]; ?>
</span>
					</div>
				</li>

				<li>
					<div class="link" style="background:#328A12;">
					<a href="<?php if ($this->_tpl_vars['p']['website'] != ""):  echo ((is_array($_tmp=$this->_tpl_vars['p']['website'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  else:  echo $this->_tpl_vars['baseurl'];  endif; ?>" title="Website của tôi <?php if ($this->_tpl_vars['p']['website'] != ""):  echo ((is_array($_tmp=$this->_tpl_vars['p']['website'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  else:  echo $this->_tpl_vars['baseurl'];  endif; ?>" target="_blank" ><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/homeicon.png"></a>  
					</div>
				</li>
				
				<?php if ($this->_tpl_vars['p']['showfb'] == '1'): ?>
				<li>
					<div class="link">
						<a href="http://www.facebook.com/<?php echo $this->_tpl_vars['p']['FBID']; ?>
" title="Facebook của tôi" target="_blank" ><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/fbicon.png"></a>
					</div>
				</li>
				<?php endif; ?>
			</ul>
		</div>
    </div></div>


<div id="main">
    <div id="content-holder">		
        