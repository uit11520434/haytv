<?php /* Smarty version 2.6.6, created on 2014-01-21 21:45:23
         compiled from contact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'contact.tpl', 34, false),)), $this); ?>
<?php if ($this->_tpl_vars['error'] != ""): ?>
<p class="form-message error middle"><?php echo $this->_tpl_vars['error']; ?>
<br /></p>
<?php elseif ($this->_tpl_vars['message'] != ""): ?>
<p class="form-message success middle"><?php echo $this->_tpl_vars['message']; ?>
<br /></p>
<?php endif; ?>
<div id="main" class="middle">
    <div id="content-holder">
        <div class="b9gcs-soft-box static" >
            <div class="content contact-container contact-wrapper">
                <form id="cntctfrm" class="modal" action="<?php echo $this->_tpl_vars['baseurl']; ?>
/contact" name="cntctfrm" method="POST">
                    <h3><?php echo $this->_tpl_vars['lang205']; ?>
</h3>
                    <div class="info" style="">
                    	<p><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/faq"><?php echo $this->_tpl_vars['lang226']; ?>
</a></p>
                    </div>
                    
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang227']; ?>
</h4>
                            <div class="topic">
                                <select name="topic">
                                <option value="">-- <?php echo $this->_tpl_vars['lang228']; ?>
 --</option>
                                <option value="bug" <?php if ($this->_tpl_vars['topic'] == 'bug'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang229']; ?>
</option>
                                <option value="question" <?php if ($this->_tpl_vars['topic'] == 'question'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang230']; ?>
</option>
                                <option value="feedback" <?php if ($this->_tpl_vars['topic'] == 'feedback'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang231']; ?>
</option>
                                <option value="business" <?php if ($this->_tpl_vars['topic'] == 'business'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang232']; ?>
</option>
                                </select>
                            </div>
                        </label>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4><?php echo $this->_tpl_vars['lang233']; ?>
</h4>
                        	<input type="text" class="text " name='subject' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="200" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible"><?php echo $this->_tpl_vars['lang234']; ?>
</p>
                    </div>
                    
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang235']; ?>
</h4>
                            <textarea name="msg" class="form-textarea " maxlength="600" placeholder=""><?php echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                        </label>
                        <p class="info" style="visibility:visible"><?php echo $this->_tpl_vars['lang236']; ?>
</p>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4><?php echo $this->_tpl_vars['lang237']; ?>
</h4>
                        	<input type="text" class="text" name='name' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="200" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible"></p>
                    </div>
                    
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang238']; ?>
</h4>
                            <input type="text" class="text " name='email' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="200" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible"><?php echo $this->_tpl_vars['lang239']; ?>
</p>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4><?php echo $this->_tpl_vars['site_name']; ?>
 <?php echo $this->_tpl_vars['lang1']; ?>
 <span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                        	<input type="text" class="text " name='username' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="30" placeholder=""/>
                        </label>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4><?php echo $this->_tpl_vars['lang240']; ?>
 <span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                        	<input type="text" class="text " name='os' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['os'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" maxlength="50" placeholder=""/>
                        </label>
                        <p class="info" style="visibility:visible"><?php echo $this->_tpl_vars['lang241']; ?>
</p>
                    </div>
                    
                    <div class="field">
                        <label>
                        	<h4><?php echo $this->_tpl_vars['lang242']; ?>
</h4>
                            <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/include/captcha.php" /><br />
                        	<input type="text" class="text " name='imagecode' value="" maxlength="5" placeholder=""/>
                        </label>
                    </div>
                    <input type="hidden" name="msgsub" value="1" />
                </form>
            </div>
            <div class="actions">
            	<ul class="buttons">
            		<li><a class="button" href="#" onclick="document.cntctfrm.submit();"><?php echo $this->_tpl_vars['lang29']; ?>
</a></li>
            	</ul>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">