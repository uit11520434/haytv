<?php /* Smarty version 2.6.6, created on 2014-02-22 06:15:42
         compiled from myfancy_bit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_member_profilepicture', 'myfancy_bit.tpl', 4, false),array('insert', 'get_time_to_days_ago', 'myfancy_bit.tpl', 11, false),array('modifier', 'stripslashes', 'myfancy_bit.tpl', 5, false),array('modifier', 'fullname', 'myfancy_bit.tpl', 9, false),array('modifier', 'vnseo', 'myfancy_bit.tpl', 12, false),array('modifier', 'bb', 'myfancy_bit.tpl', 22, false),array('modifier', 'smiley', 'myfancy_bit.tpl', 22, false),array('modifier', 'number_format', 'myfancy_bit.tpl', 48, false),)), $this); ?>
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
    <section class="itemPost">
        <div class="userAvatar">
            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

            <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="avatar"><img src="<?php echo $this->_tpl_vars['profilepicture']; ?>
"></a>
        </div>
        <div class="itemContent">
        <span class="userName">
            <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('fullname', true, $_tmp) : fullname($_tmp)); ?>
</a>
        </span>
            <span class="time"><?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['phase'] == 0):  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_time_to_days_ago', 'time' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['time_added'])), $this);  else:  if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['phase'] == 1):  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_time_to_days_ago', 'time' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['ttime'])), $this);  else:  require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_time_to_days_ago', 'time' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['htime'])), $this);  endif;  endif; ?></span>
            <span class="title"><a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['story']; ?>
</a></span>
            <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['type'] == 1): ?>
                <div class="imgWrap">
                    <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
                        <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
                        <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
                            <img class="imgovui" src="<?php echo $this->_tpl_vars['purl']; ?>
/t/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['folder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic']; ?>
"/>
                        </a>
                        <?php endif; ?>
                        <div class="blogWrap">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['node'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('bb', true, $_tmp) : bb($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>

                        </div>
                    </a>
                </div>
            <?php else: ?>
                <div class="imgWrap <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>youtube<?php endif; ?>">
                    <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
                        <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank"><img  class="imgovui" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw.jpg" /></a>
                    <?php else: ?>
                        <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
                            <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
                                <img class="imgovui" src="<?php echo $this->_tpl_vars['purl']; ?>
/t/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['folder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic']; ?>
"/>
                            </a>
                        <?php else: ?>
                            <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
                                <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
                                    <img class="imgovui" src="http://i.ytimg.com/vi/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg"/>
                                    <i class="ovsp ovsp-play"></i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="postInfo">
                <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
                    <span class="viewCount" votes="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['view']; ?>
" score="0" title="Lượt xem"><i class="fa fa-eye"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['view'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
 lượt xem</span>
                    <span class="pointCount" votes="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['total_count']; ?>
" score="0" title="Điểm"><i class="fa fa-star"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['total_count'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
 điểm</span>
                    <span class="commentCount" title="Bình luận"><i class="fa fa-comment"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['comments'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
 bình luận</span>
                </a>
                <div class="social">
                    <div class="btn-social btn-fb fb-like fb_edge_widget_with_comment fb_iframe_widget" data-action="like" data-share="false" data-width="90" data-layout="button_count" data-show-faces="false" data-send="false" data-href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
<?php endfor; endif; ?>