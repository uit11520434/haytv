<?php /* Smarty version 2.6.6, created on 2014-04-09 05:07:44
         compiled from submit3.tpl */ ?>
<?php if ($this->_tpl_vars['error'] != ""): ?>
<p class="form-message error"><?php echo $this->_tpl_vars['error']; ?>
</p>
<?php elseif ($this->_tpl_vars['message'] != ""): ?>
<p class="form-message success"><?php echo $this->_tpl_vars['message']; ?>
</p>
<?php endif; ?>
<div id="main">
    <div id="content-holder">
        <div id="b9gcs-soft-post" class="b9gcs-soft-box static">
        
            <div class="head">
                <ul class="switch">
                	<li class="tab_photo "><a class="photo" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit"><?php echo $this->_tpl_vars['lang100']; ?>
</a></li>
					<?php if ($this->_tpl_vars['vupload'] == '1'): ?>
                	<li class="tab_video "><a class="video" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?t=v"><?php echo $this->_tpl_vars['lang101']; ?>
</a></li>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['tupload'] == '1'): ?>
			<li class="tab_text current"><a class="text" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?t=t"><?php echo $this->_tpl_vars['lang289']; ?>
</a></li>
					<?php endif; ?>
                </ul>
            </div>
        
            <div class="content form_photo">
                <form id="form-b9gcs-soft-post-image" class="modal" action="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?t=t" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="type" value="Text"/>
                    <input id="post_type" type="hidden" name="post_type" value="Text"/>
                    <h3><?php echo $this->_tpl_vars['lang290']; ?>
</h3>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang291']; ?>
</h4><br /><br /><br />
                            <textarea id="contents" name="contents"></textarea>
                            <script type="text/javascript">CKEDITOR.replace('contents');</script>
                        </label>
                    </div>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang111']; ?>
</h4>
                            <input id="post_title" type="text" class="text tipped" name="title" maxlength="60" value=""/>
                            <p class="info" style="visibility:hidden"><?php echo $this->_tpl_vars['lang112']; ?>
</p>
                        </label>
                    </div>
					<div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang269']; ?>
</h4>
							<select name="CID" id="CID">
                            <option value=""><?php echo $this->_tpl_vars['lang270']; ?>
</option>
							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['c']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <option value="<?php echo $this->_tpl_vars['c'][$this->_sections['i']['index']]['CID']; ?>
"><?php echo $this->_tpl_vars['c'][$this->_sections['i']['index']]['cname']; ?>
</option>
							<?php endfor; endif; ?>
                            </select>                        
							<p class="info" style="visibility:hidden"><?php echo $this->_tpl_vars['lang271']; ?>
</p>
                        </label>
                    </div>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang113']; ?>
<span> (<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                            <input id="photo_tag_input" type="text" class="text tag_input tipped" name="tags" value="" placeholder="tag 1, tag 2, tag 3, tag 4, tag 5"/>
                            <p class="info" style="visibility:hidden"><?php echo $this->_tpl_vars['lang118']; ?>
</p>
                        </label>
                    </div>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang115']; ?>
<span> (<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                            <input type="text" class="text tipped" name="source" value="" maxlength="300"/>
                            <p class="info" style="visibility:hidden"><?php echo $this->_tpl_vars['lang116']; ?>
</p>
                        </label>                    
                    </div>
                    <hr />
					<?php if ($this->_tpl_vars['safemode'] == '1'): ?>
                    <div class="field checkbox">
                    	<label for="submit-nsfw">
                    	<input id="submit-nsfw" type="checkbox" class="checkbox" name="nsfw" value="1" /><?php echo $this->_tpl_vars['lang117']; ?>
</label>
                    </div>
					<?php endif; ?>
                </form>
            </div>
        
        
            <div class="actions">
                <ul class="buttons">
                    <li class="loading-btn" style="visibility:hidden"><a class="button loading"></a></li>
                    <li class="form-btn"><a class="cancel" href="/"><?php echo $this->_tpl_vars['lang119']; ?>
</a></li>
                    <li class="form-btn"><a class="button send" id="ekle" ><?php echo $this->_tpl_vars['lang120']; ?>
</a></li>
                </ul>
            </div>
        	<?php echo '
			<script type="text/javascript">
            $(\'input\').each(function()
			{
            	$(this).focus(function()
				{
            		$(this ).next(\'.info\').css(\'visibility\',\'visible\');
            	})
            	$(this).blur(function()
				{
            		$(this).next(\'.info\').css(\'visibility\',\'hidden\');
            	})
            });
            $(\'#ekle\').click(function(){
            	$(\'#form-b9gcs-soft-post-image\').submit();
            });
            </script>
            '; ?>

        </div>
    </div>
</div>

<div class="side-bar">
    <div class="msg-box notice">
    	<h3><?php echo $this->_tpl_vars['lang121']; ?>
</h3>
    	<p><?php echo $this->_tpl_vars['quota']; ?>
 <?php echo $this->_tpl_vars['lang122']; ?>
</p>
    </div>

    <div class="msg-box">
        <h3><?php echo $this->_tpl_vars['lang123']; ?>
</h3>
        <ul class="submit-info">
            <li><b><?php echo $this->_tpl_vars['lang124']; ?>
</b></li>
            <li><b><?php echo $this->_tpl_vars['lang125']; ?>
 </b><a href=\"http://www.google.com/imghp\" target=\"blank\"><?php echo $this->_tpl_vars['lang126']; ?>
</a><b></b></li>
            <li><b><?php echo $this->_tpl_vars['lang127']; ?>
</b></li>
            <li><b><?php echo $this->_tpl_vars['lang128']; ?>
</b></li>
            <li><b><?php echo $this->_tpl_vars['lang129']; ?>
</b></li>
            <li><?php echo $this->_tpl_vars['lang130']; ?>
</li>
            <li><?php echo $this->_tpl_vars['lang131']; ?>
</li>
            <li><b><?php echo $this->_tpl_vars['lang132']; ?>
</b></li>
            <li><b><?php echo $this->_tpl_vars['lang133']; ?>
</b></li>
            <li><?php echo $this->_tpl_vars['lang134']; ?>
 <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/rules" target="blank"><?php echo $this->_tpl_vars['lang135']; ?>
</a>.</li>                        
        </ul>
        <p class="memo"><b><?php echo $this->_tpl_vars['lang136']; ?>
:</b> <?php echo $this->_tpl_vars['lang137']; ?>
<span class="badge-js" key="!"></span></p>
    </div>
</div>
<div id="footer" class="">