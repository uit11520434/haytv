<?php /* Smarty version 2.6.6, created on 2014-04-09 06:46:00
         compiled from tag_anhdep.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'makeseo', 'tag_anhdep.tpl', 15, false),array('modifier', 'stripslashes', 'tag_anhdep.tpl', 18, false),array('modifier', 'bb', 'tag_anhdep.tpl', 22, false),array('modifier', 'smiley', 'tag_anhdep.tpl', 22, false),array('modifier', 'truncateHTML', 'tag_anhdep.tpl', 22, false),)), $this); ?>
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/masonry.pkgd.min.js"></script>
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.infinitescroll.min.js"></script>
<div class="friendsintro" style="height:90px;"><div class="welcome"><p class="p-1">Chuyên trang Ảnh đẹp</p>
<p class="p-2">Chia sẻ ảnh girl xinh, cảnh đẹp, thời trang, thiết kế, nghệ thuật</p>
<p class="p-3">Chú ý: Không đăng ảnh hài hước tại đây, bài vi phạm sẽ bị xóa.</p></div>
<div class="btn"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?file=1&tag=ảnh%20đẹp" class="btn-pal"><span>Tải lên từ máy</span></a><a> 
		<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?tag=ảnh%20đẹp" class="btn-ol"><span>Đăng từ linh</span></a>
	</div>
</div>
<div id="masonry" class="infinite-scroll">

<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['posts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<div class="item masonry-brick">
		<a class="wrap" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" class="jump_stop">
		<div class="avatar">
			<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
				<img  class="ovui" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
			<?php else: ?>
				<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['type'] == 1): ?>
					<div>
					<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['node'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('bb', true, $_tmp) : bb($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)))) ? $this->_run_mod_handler('truncateHTML', true, $_tmp, 200) : truncateHTML($_tmp, 200)); ?>

					</div>
				<?php else: ?>		
					<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
						<img src="<?php echo $this->_tpl_vars['purl'][$this->_sections['i']['index']]; ?>
/t/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['folder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic']; ?>
"/>
						<div style="background-color: #FFFFFF;height: 15px;margin-top: -15px;position: absolute;width: 228px;"></div>			
					<?php else: ?>
						<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
						<img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg"/>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		</a>
		<div class="info">
			<p class="name"><a href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" target="_blank"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>
</a> <span class="title2"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>
</span></p>
			<p>
				<span id="view_count" class="view" votes="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['view']; ?>
" score="0"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['view']; ?>
</span>
				<span id="total_count" class="total_count" votes="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['total_count']; ?>
" score="0"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['total_count']; ?>
</span>
				<span class="comment"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['comments']; ?>
</span>
				<!--<span id="love_count_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" class="loved" votes="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['favclicks']; ?>
" score="0"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['favclicks']; ?>
</span>-->
				<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['nsfw'] == '1'): ?>
					<span style="margin-left: 10px; background-color: #3B5998; color: #FFFFFF; padding: 2px 5px; font-size: 9px; border-radius: 3px;">18+</span>
				<?php endif; ?>
			</p>
		</div>
		
	</div>
<?php endfor; endif; ?>
</div>
<nav id="page-nav">
  <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/tag/Girl-Xinh?page=2"></a>
</nav>
<?php echo '
<script>
  $(function(){

    var $container = $(\'#masonry\');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: \'.item\',
        columnWidth: 248
      });
    });

    $container.infinitescroll({
      navSelector  : \'#page-nav\',    // selector for the paged navigation 
      nextSelector : \'#page-nav a\',  // selector for the NEXT link (to page 2)
      itemSelector : \'.item\',     // selector for all items you\'ll retrieve
      loading: {
          finishedMsg: \'Đả tải hết.\',
		  msgText: \'\', 
          img: \'';  echo $this->_tpl_vars['imageurl'];  echo '/loading.gif\'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they\'re ready
        $newElems.animate({ opacity: 1 });
          $container.masonry( \'appended\', $newElems, true ); 
        });
      }
    );
  });
</script>
'; ?>