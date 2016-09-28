<?php /* Smarty version 2.6.6, created on 2013-12-31 04:32:48
         compiled from post_bit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'vnseo', 'post_bit.tpl', 1, false),array('modifier', 'stripslashes', 'post_bit.tpl', 6, false),array('modifier', 'bb', 'post_bit.tpl', 6, false),array('modifier', 'smiley', 'post_bit.tpl', 6, false),array('modifier', 'strpos', 'post_bit.tpl', 18, false),array('modifier', 'fullname', 'post_bit.tpl', 52, false),array('modifier', 'getTags', 'post_bit.tpl', 102, false),array('insert', 'get_user_likes', 'post_bit.tpl', 46, false),array('insert', 'get_member_profilepicture', 'post_bit.tpl', 47, false),array('insert', 'get_time_to_days_ago', 'post_bit.tpl', 48, false),array('insert', 'get_user_level', 'post_bit.tpl', 53, false),array('insert', 'get_fav_status', 'post_bit.tpl', 81, false),)), $this); ?>
					<li class=" gag-link" data-url="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" gagId="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" itemType="list" id="entry-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
">
                        
						<div class="content">
							<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['type'] == 1): ?>
							<div class="blog-container view">
								<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['node'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('bb', true, $_tmp) : bb($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>

							</div>
							<?php else: ?>		
                            <div class="img-wrap">
                                <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
                                	<a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank"><img  class="ovui" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" /></a>
									<div class="watermark-clear"></div>
                                <?php else: ?>
                                	<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
                                	<a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
										<img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['folder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic']; ?>
"/>
											
									<?php if (((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'gif') : strpos($_tmp, 'gif'))): ?>
										<img class="gifPlay" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/gifplay.png"/>
										</a>
									<?php else: ?>
										</a>
										<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID'] <= 8140): ?>
											<div style="height:5px;"></div>
										<?php endif; ?>
										<div class="watermark-clear"></div>
									<?php endif; ?>
                                    <?php else: ?>
                                        <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
                                        <a  href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" target="_blank">
										<img src="http://i.ytimg.com/vi/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg"/>
										<img class="videoPlay" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/button_play_b.png"/>										
										</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
							<?php endif; ?>
                            
                        </div>
					
                        <div style="position:relative;width:220px;float:right">
                            <div class="info scriptolution-stop" id="action-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" >
                                <h1><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" class="jump_focus" target="_blank"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>
</a> <span class="title2"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>
</span> </h1>  
								<div class="userinfo">
									<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_user_likes', 'assign' => 'userlikes', 'USERID' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['USERID'])), $this); ?>

									<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

									<!--Ðăng <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_time_to_days_ago', 'time' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['time_added'])), $this); ?>
 bởi-->
									<div>
										<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['profilepicture']; ?>
"></a>
										<div class="uinfo">
											<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('fullname', true, $_tmp) : fullname($_tmp)); ?>
</a>
											<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_user_level', 'assign' => 'alvl', 'value' => 'var', 'POINT' => $this->_tpl_vars['userlikes'])), $this); ?>

											<div class="user-bar">
											<div class="bar-blue" style="width:<?php echo $this->_tpl_vars['alvl'][3]; ?>
%;"></div>
											<div class="bar-c"><?php echo $this->_tpl_vars['alvl'][0]; ?>
 / <?php echo $this->_tpl_vars['alvl'][1]; ?>
</div>
											<div class="level">Lv: <?php echo $this->_tpl_vars['alvl'][2]; ?>
</div>
											</div>
								
										</div>
										<div class="clear"> </div>
									</div>
								</div>	
									  
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
								<!--
                                <ul class="actions"  style="">
                                    <li>
                                    	<a class="comment " href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html#comments" onclick="window.location =  '<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html#comments';"><span><?php echo $this->_tpl_vars['lang165']; ?>
</span></a>
                                    </li>
                                    <li>
                                    	<?php if ($_SESSION['USERID'] != ""): ?>
                                        <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_fav_status', 'value' => 'var', 'assign' => 'isfav', 'PID' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID'])), $this); ?>

                                        <a class="vote love <?php if ($this->_tpl_vars['isfav'] == '1'): ?>loved<?php endif; ?>" id="post_love_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" rel="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang144']; ?>
</span></a>
                                        <?php else: ?>
                                    	<a class="vote love " id="post_love_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" rel="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><span><?php echo $this->_tpl_vars['lang144']; ?>
</span></a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
								-->
                                <div class="sharing-box ">
                                    <hr class="arrow" />
                                    <ul class="sharing ">
                                        <li class="facebook" id="share1-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
">

                   <div class="facebook-share-btn" onclick="popupwindow('http://www.facebook.com/sharer/sharer.php?u=<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html?fb=share','Facebook Share',700,300)"></div>
                   <div class="facebook-btn"><div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-layout="button_count" data-show-faces="false" data-send="false" data-href="<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('vnseo', true, $_tmp, true) : vnseo($_tmp, true)); ?>
/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
.html" fb-xfbml-state="rendered"></div> </div>               
                                        </li>
                                    </ul>
                                </div>
					            
								<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['tags'] != ''): ?>
								<div class="tags">
								   <span><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/post-tag.png" title="Tags"> : <?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['tags'])) ? $this->_run_mod_handler('getTags', true, $_tmp) : smarty_modifier_getTags($_tmp)); ?>
</span>
								</div>
								<?php endif; ?>
								
                              <!--  <a class="fix" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/fix/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
"><?php echo $this->_tpl_vars['lang142']; ?>
</a> -->
                            </div>
                        </div>
						<div class="clear"></div>
                    </li>