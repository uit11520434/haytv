<?php /* Smarty version 2.6.6, created on 2013-12-31 08:00:59
         compiled from posts_user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'makeseo', 'posts_user.tpl', 1, false),array('modifier', 'stripslashes', 'posts_user.tpl', 1, false),array('modifier', 'mb_truncate', 'posts_user.tpl', 1, false),array('modifier', 'strip_mq_gpc', 'posts_user.tpl', 16, false),array('modifier', 'smiley', 'posts_user.tpl', 29, false),array('modifier', 'tagsexplode', 'posts_user.tpl', 105, false),array('insert', 'get_time_to_days_ago', 'posts_user.tpl', 32, false),array('insert', 'get_fav_status', 'posts_user.tpl', 43, false),array('insert', 'get_unfav_status', 'posts_user.tpl', 52, false),)), $this); ?>
					<li class=" gag-link" data-url="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" data-text="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8')); ?>
" gagId="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" itemType="list" id="entry-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
">
                        <div class="content">
                            <div class="img-wrap">
                                <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
                                	<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" /></a>
                                <?php else: ?>
                                	<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
                                	<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" /></a>
                                    <?php else: ?>
                                        <?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
                                        <center>
										<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>">
										<img style="max-width:460px" src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
										<img style="position:relative;top:-200px;" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/play.png"></img></a>
                                        </center>
                                        <?php elseif ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['contents'] != ""):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['contents'])) ? $this->_run_mod_handler('strip_mq_gpc', true, $_tmp) : strip_mq_gpc($_tmp)); ?>

										<?php else: ?>
										<a target="_blank" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/error.jpg" alt="<?php echo $this->_tpl_vars['lang264']; ?>
" /></a>
										<?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <?php if ($this->_tpl_vars['displaywm'] == '0' && $this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
							<div class="watermark-clear"></div>
							<?php endif; ?>
                        </div>
                        <div style="position:relative;width:220px;float:right">
                            <div class="info b9gcs-stop" id="action-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" >
                               <h1><a target="_blank" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" class="jump_focus"><?php if ($this->_tpl_vars['truncate'] == '1'):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8'));  else:  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>
 <span class="title2"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['p']['story2'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('smiley', true, $_tmp) : smiley($_tmp)); ?>
</span><?php endif; ?></a></h1>
                                <h4>
                                    <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                                    <p><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_time_to_days_ago', 'time' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['time_added'])), $this); ?>
</p>
                                </h4>                                
                                <p>
                                    <span class="comment">
                                    <fb:comments-count href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments-count>
                                    </span>
                                    <span id="love_count_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" class="loved" votes="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['favclicks']; ?>
" score="0"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['favclicks']; ?>
</span>
									<span class="viewed"><?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['postviewed']; ?>
</span>
                                </p>
								<ul class="actions">
                                	<?php if ($_SESSION['USERID'] != ""): ?>
                                        <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_fav_status', 'value' => 'var', 'assign' => 'isfav', 'PID' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID'])), $this); ?>

                                        <?php if ($this->_tpl_vars['isfav'] == '1'): ?>
                                        <li>
                                            <a id="vote-down-btn-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" class="unlove badge-vote-down "  entryId="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang180']; ?>
</span></a>
                                        </li>
                                        <li>
                                            <a class="vote love loved" id="post_love_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" rel="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang144']; ?>
</span></a>
                                        </li>
                                        <?php else: ?>
                                        	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_unfav_status', 'value' => 'var', 'assign' => 'isunfav', 'PID' => $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID'])), $this); ?>

                                        	<?php if ($this->_tpl_vars['isunfav'] == '1'): ?>
                                            <li>
                                                <a id="vote-down-btn-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" class="unlove badge-vote-down unloved "  entryId="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang180']; ?>
</span></a>
                                            </li>
                                            <li>
                                                <a class="vote love " id="post_love_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" rel="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang144']; ?>
</span></a>
                                            </li>
                                            <?php else: ?>
                                            <li>
                                                <a id="vote-down-btn-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" class="unlove badge-vote-down "  entryId="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang180']; ?>
</span></a>
                                            </li>
                                        	<li>
                                                <a class="vote love " id="post_love_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" rel="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang144']; ?>
</span></a>
                                            </li>
                                            <?php endif; ?>
                                    	<?php endif; ?>
                                    <?php else: ?>
                                    <li>
                                    	<a id="vote-down-btn-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" class="unlove badge-vote-down " entryId="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><span><?php echo $this->_tpl_vars['lang180']; ?>
</span></a>
                                    </li>
                                    <li>
                                    	<a class="vote love " id="post_love_<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" rel="<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><span><?php echo $this->_tpl_vars['lang144']; ?>
</span></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="sharing-box ">
                                    <hr class="arrow" />
                                    <ul class="sharing ">
                                        <li class="facebook" id="share1-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
">
                                        	<span id="list-share-twitter-<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
">
												<?php if ($this->_tpl_vars['share1'] == 1): ?>
													<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8')); ?>
" data-url="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" data-count="horizontal" data-via="">&nbsp;</a>		
												<?php elseif ($this->_tpl_vars['share1'] == 2): ?>
													<fb:share-button href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/" type="button_count"></fb:share-button>
												<?php else: ?>
													<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>?ref=fb&amp;width=80&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:20px;" allowTransparency="true"></iframe>
												<?php endif; ?>
                                            </span>
											<div style="float:right" class="facebook-share-btn">
												<?php if ($this->_tpl_vars['share2'] == 1): ?>
													<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8')); ?>
" data-url="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" data-count="horizontal" data-via="">&nbsp;</a>		
												<?php elseif ($this->_tpl_vars['share2'] == 2): ?>
													<fb:share-button href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/" type="button_count"></fb:share-button>
												<?php else: ?>
													<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>?ref=fb&amp;width=80&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:20px;" allowTransparency="true"></iframe>
												<?php endif; ?>
											</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tags">
                                	<span>
                                		<?php echo ((is_array($_tmp=$this->_tpl_vars['posts'][$this->_sections['i']['index']]['tags'])) ? $this->_run_mod_handler('tagsexplode', true, $_tmp) : tagsexplode($_tmp)); ?>

                                	</span>
                                </div>
                                <?php if ($this->_tpl_vars['fixenabled'] == '1'): ?><a class="fix" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/fix/<?php echo $this->_tpl_vars['posts'][$this->_sections['i']['index']]['PID']; ?>
"><?php echo $this->_tpl_vars['lang142']; ?>
</a><?php endif; ?>
                            </div>
                        </div>
                    </li>