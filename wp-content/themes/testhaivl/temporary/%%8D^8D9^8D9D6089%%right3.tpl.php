<?php /* Smarty version 2.6.6, created on 2013-12-31 08:00:59
         compiled from right3.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_advertisement', 'right3.tpl', 21, false),)), $this); ?>
﻿	<div style="margin: 0 6px 15px 6px;overflow: hidden;">
	</div>
</div>

 <div class="side-bar">
     <?php if ($_SESSION['USERID'] == ""): ?>
        <div class="spcl-button-wrap" style="margin-bottom: 10px;">
                    <a  id="facebook_login" class="spcl-button facebook badge-facebook-connect" label="LoginFormFacebookButton" next="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/fblogin.php?m=<?php echo $this->_tpl_vars['eurl']; ?>
"><?php echo $this->_tpl_vars['lang25']; ?>
</a>
                     
         </div>
		<?php else: ?>
		<div id="side-bar-upload">
            <a class="spcl-button blue" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit" label="Header">Click để bắt đầu chia sẻ hình ảnh và video vui !</a>
        </div> 
        <?php endif; ?>
		 
		
        <?php if ($this->_tpl_vars['viewpage'] != '1'): ?>
		
		<div class="s-300">
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 2)), $this); ?>

			<?php if ($_SESSION['USERID'] == ""): ?>
			<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => $this->_tpl_vars['HOMERIGHT1AdID'])), $this); ?>

			<?php else: ?>
				<iframe width="300px" scrolling="no" height="400px" frameborder="0" marginwidth="0" marginheight="0" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/shoutcloud.php"></iframe>
			<?php endif; ?>    
        </div>
              
        <div id="tabs">
          <ul>
            <li><a data="tuan">Tuần</a></li>
            <li><a data="thang">Tháng</a></li>
            <li><a data="nam">Năm</a></li>
          </ul>
          <span id="slogo">
            <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top"><label for="slogo">Bảng Xếp Hạng</label></a>
            <img alt="Top Overs" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/top-logo.png" width="21" height="21" />
          </span>
          <div class="current">
          </div>
        </div>

		<div class="right-ovui">
				<h3><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/online">Thành viên hoạt động gần đây</a></h3>
				<div class="who_online">
				   <ul>
					</ul>
					<div class="clear"> </div>
				</div>
			 </div>
		 <div class="social-block">
            <h3>Ủng hộ xứ nghệ nhé bạn :)</h3>
            <div class="facebook-like">
                <div class="fb-like" data-href="https://www.facebook.com/xungheonlinecom" data-send="false" data-width="280" data-show-faces="true"></div>
            </div>
			<!--
           <div class="twitter-follow">
                <a href="http://twitter.com/<?php echo $this->_tpl_vars['twitter']; ?>
" class="twitter-follow-button"><?php echo $this->_tpl_vars['lang149']; ?>
 @<?php echo $this->_tpl_vars['twitter']; ?>
</a>
            </div>     -->         
            <div class="google-plus">
                <p> +1 nếu bạn thấy vui</p>
                <g:plusone size="medium" href="<?php echo $this->_tpl_vars['baseurl']; ?>
"></g:plusone>
            </div> 
        </div>
		
        <div id="moving-boxes">
        <div class="s-300">
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'value' => 'var', 'AID' => 17)), $this); ?>

			 <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 27)), $this); ?>

        </div>
       
		 </div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['viewpage'] == '1'): ?>
		<?php if ($_SESSION['USERID'] == ""): ?>
        <div class="s-300">
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => $this->_tpl_vars['INFORIGHT1AdID'])), $this); ?>

		
        </div>
		<div class="s-300">
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'value' => 'var', 'AID' => '5')), $this); ?>

			<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 5)), $this); ?>

        </div>
		<?php else: ?>
		
		<?php endif; ?>
		<div class="right-ovui tinmoi"> 
            <h3>Bài viết mới</h3>
                    <ol>  
                        
                    </ol>
         </div> 
        <div class="right-ovui baimoi">
            <h3>Bài mới</h3>
                    <ol> 
                    </ol>
         </div> 
    <div id="moving-boxes">
        <div class="right-ovui noibat">
            <h3>Có thể bạn sẽ thích</h3>
                    <ol>  
                    </ol>
			
         </div>
		 <div class="right-ovui binhchon">
            <h3>Giúp xứ nghệ duyệt bài này</h3>
                    <ol>   
                    </ol>
			
         </div>
        

        <?php endif; ?>
        
     </div> 
 </div> 