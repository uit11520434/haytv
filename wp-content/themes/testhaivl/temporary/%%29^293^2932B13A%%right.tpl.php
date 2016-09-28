<?php /* Smarty version 2.6.6, created on 2014-04-09 06:54:24
         compiled from right.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'right.tpl', 32, false),array('modifier', 'truncate', 'right.tpl', 37, false),array('modifier', 'makeseo', 'right.tpl', 79, false),array('modifier', 'mb_truncate', 'right.tpl', 96, false),array('insert', 'get_advertisement', 'right.tpl', 68, false),)), $this); ?>
	<div class="side-bar">
		<div class="msg-box notice" style="font-size:12px;">
			<b>Vào Facebook để duyệt sướng hơn! Bạn không vào được? Xem hướng dẫn <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/cach-vao-facebook-khi-bi-chan-moi-nhat-nam-2014.html">cách vào Facebook</a>.</b>
		</div>
		<div>
			<a class="bts spaceBottom" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit" style="float: left; width: 278px; color: white">Click để bắt đầu chia sẻ những bức ảnh vui!</a>
			<div class="clear"></div>
		</div>

<div id="tabs">
          <ul>
            <li><a data="tuan">Tuần</a></li>
            <li><a data="thang">Tháng</a></li>
            <li><a data="nam">Năm</a></li>
          </ul>
          <span id="slogo">
            <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers"><label for="slogo">Bảng Xếp Hạng</label></a>
            <img alt="Top Overs" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/top-logo.png" width="21" height="21" />
          </span>
          <div class="current">
          </div>
        </div>

                  <!-- 
		  <span id="slogo">                 
              <center> <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers"><img alt="Top Overs" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/xephang.png" width="300" height="60" /> </center>     
               <div class="top-10">
                                          <center> <h3> <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/topusers"><label for="slogo">Bảng Xếp Hạng</label></h3></center> 
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
			<li class="widget-content">
			<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['top'][$this->_sections['i']['index']]['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
			<img src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php if ($this->_tpl_vars['top'][$this->_sections['i']['index']]['profilepicture'] == ""): ?>noprofilepicture.jpg<?php else:  echo $this->_tpl_vars['top'][$this->_sections['i']['index']]['profilepicture'];  endif; ?>?<?php echo time(); ?>
" style="width:40px;height:40px;">
			</a>
				<ul>
				<li>
					<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo $this->_tpl_vars['top'][$this->_sections['i']['index']]['USERID']; ?>
"><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['top'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "...", true) : smarty_modifier_truncate($_tmp, 10, "...", true)); ?>
</strong></a>
				</li>
				<li>
					Số bài: <strong><?php echo $this->_tpl_vars['top'][$this->_sections['i']['index']]['posts']; ?>
</strong>
				</li>
				<li>
					<?php echo $this->_tpl_vars['lang286']; ?>
: <strong><?php echo $this->_tpl_vars['top'][$this->_sections['i']['index']]['points']; ?>
</strong>
				</li>
				</ul>
			</li>
			</ul>
			<?php endfor; endif; ?>
			<div class="clearfix"></div>
		</div>-->
				<div class="social-block">
            <h3><?php echo $this->_tpl_vars['lang153']; ?>
</h3>
            <div class="facebook-like">
				<div class="fb-like" data-href="http://www.facebook.com/<?php echo $this->_tpl_vars['FACEBOOK_PROFILE']; ?>
" data-send="false" data-width="290" data-show-faces="true"></div>
			</div>
            <div class="twitter-follow">
            	<a href="http://twitter.com/<?php echo $this->_tpl_vars['twitter']; ?>
" class="twitter-follow-button"><?php echo $this->_tpl_vars['lang149']; ?>
 @<?php echo $this->_tpl_vars['twitter']; ?>
</a>
            </div>            
            <div class="google-plus">
            	<p><?php echo $this->_tpl_vars['lang150']; ?>
</p>
            	<g:plusone size="medium" href="<?php echo $this->_tpl_vars['baseurl']; ?>
"></g:plusone>
            </div>
        </div>
		
        <div id="moving-boxes">
            <div class="s-300" id="bottom-s300">            
            	<?php if ($_SESSION['FILTER'] == '1' && $this->_tpl_vars['NSFWADS']): ?>
        	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 10)), $this); ?>

            <?php else: ?>
        	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 10)), $this); ?>

			<?php endif; ?>
            </div>
<?php if ($this->_tpl_vars['r'][0]['PID'] != "" && $this->_tpl_vars['rhome'] == '1'): ?>
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
	<div class="popular-block">
	<h3><?php echo $this->_tpl_vars['lang251']; ?>
</h3>
	<ol>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['r']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<a class="wrap" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
            <?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
				<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw_thumb.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
			<?php else: ?>
				<?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['pic'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['purlR'][$this->_sections['i']['index']]; ?>
/t/s-<?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
						<img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
                                     	<?php elseif ($this->_tpl_vars['r'][$this->_sections['i']['index']]['contents'] != ""): ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-text.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-error.jpg" alt="Không tìm thấy dữ liệu" />
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<h4><?php if ($this->_tpl_vars['truncate'] == '1'):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8'));  else:  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></h4>
         		<h4><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a></h4>
			<p class="meta"><span class="comment"><fb:comments-count href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments-count></span><span class="loved"><?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['favclicks']; ?>
</span><span class="viewed"><?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['postviewed']; ?>
</span>
			</p>
		</li>
	</a>
	<?php endfor; endif; ?>
	</ol>
	</div>
</div>
<?php endif; ?>
</div>
</div>