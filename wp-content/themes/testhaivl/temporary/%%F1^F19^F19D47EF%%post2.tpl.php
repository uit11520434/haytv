<?php /* Smarty version 2.6.6, created on 2014-02-17 14:17:54
         compiled from post2.tpl */ ?>
<?php if ($this->_tpl_vars['error'] != ""): ?>
<p class="form-message error"><?php echo $this->_tpl_vars['error']; ?>
</p>
<?php elseif ($this->_tpl_vars['message'] != ""): ?>
<p class="form-message success"><?php echo $this->_tpl_vars['message']; ?>
</p>
<?php endif; ?>
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="http://rev.ckeditor.com/ckeditor/trunk/7505/_samples/sample.js" type="text/javascript"></script>
<div id="main">
    <div id="content-holder">
        <div id="scriptolution-soft-post" class="scriptolution-soft-box static">
        
            <div class="head">
                <ul class="switch">
                	<li class="tab_photo "><a class="photo" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit"><?php echo $this->_tpl_vars['lang100']; ?>
</a></li>
                	<li class="tab_video "><a class="video" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?t=v"><?php echo $this->_tpl_vars['lang101']; ?>
</a></li>
					<li class="tab_blog"><a class="blog" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/post">Chém gió</a></li>
					<li class="tab_tamsu current"><a class="blog" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/post?t=1">Tâm sự</a></li>
					<li class="tab_tinnong"><a class="blog" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/post?t=2">Báo hay</a></li>
                </ul>
            </div>
        
            <div class="content form_photo">
                <form id="form-scriptolution-soft-post-image" class="modal" action="<?php echo $this->_tpl_vars['baseurl']; ?>
/post" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="type" value="Blog"/>
                    <input id="post_type" type="hidden" name="post_type" value="Blog"/>
					<input id="blog_type" type="hidden" name="blog_type" value="1"/>
                    <h3>Đăng bài: hỏi đáp, tâm sự, nhờ tư vấn</h3>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang111']; ?>
</h4>
                            <input id="post_title" type="text" class="text tipped" name="title" maxlength="80" value=""/>
                            <p class="info" ><?php echo $this->_tpl_vars['lang112']; ?>
</p>
                        </label>
                    </div>
					<div class="field">
                        <label>
                            <h4>Thông điệp của bạn <span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                            <input id="post_title2" type="text" class="text tipped" name="title2" maxlength="80" value=""/>
                            <p class="info" >Bạn có thể đăng những nhận xét, cản nghĩ về bài đăng bạn muốn chia sẻ</p>
                        </label>
                    </div>
					<div class="field">                  
                            <textarea cols="80" id="node" name="node" rows="10"></textarea>
							<?php echo '
			<script type="text/javascript">
			//<![CDATA[

			CKEDITOR.replace( \'node\',
				{
					extraPlugins : \'bbcode\',
					// Remove unused plugins.
					removePlugins : \'bidi,button,dialogadvtab,div,filebrowser,flash,format,forms,horizontalrule,iframe,indent,justify,liststyle,pagebreak,showborders,stylescombo,table,tabletools,templates\',
					// Width and height are not supported in the BBCode format, so object resizing is disabled.
					disableObjectResizing : true,
					// Define font sizes in percent values.
					fontSize_sizes : "30/30%;50/50%;100/100%;120/120%;150/150%;200/200%;300/300%",
					toolbar :
					[
						[\'Source\', \'-\', \'NewPage\',\'-\',\'Undo\',\'Redo\'],
						[\'Find\',\'Replace\',\'-\',\'SelectAll\',\'RemoveFormat\'],
						[\'Link\', \'Unlink\', \'Image\',\'SpecialChar\'],
						[\'Bold\', \'Italic\',\'Underline\'],
						[\'TextColor\'],
						[\'FontSize\'],
						[\'BulletedList\',\'-\',\'Blockquote\'],
						[\'Maximize\'],[\'colors\'],[\'styles\'],[\'paragraph\'],
					],
					
			} );

			//]]>
			</script>'; ?>

                    </div>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang113']; ?>
<span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                            <input id="photo_tag_input" type="text" class="text tag_input tipped" name="tags" value="" placeholder="Ví dụ: Châu Tinh Trì,Phim Hài"/>
                            <p class="info" >Gắn thẻ giúp tạo trang riêng cho chuyện mục của bạn, ví dụ <a href="http://www.ovui.vn/tag/Larva-2013">Larva 2013</a></p>
                        </label>
                    </div>
                    <div class="field">
                        <label>
                            <h4><?php echo $this->_tpl_vars['lang115']; ?>
<span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></h4>
                            <input type="text" class="text tipped" name="source" value="" maxlength="300"/>
                            <p class="info" ><?php echo $this->_tpl_vars['lang116']; ?>
</p>
                        </label>                    
                    </div>
                    <hr />
                    <div class="field checkbox">
                    	<label for="submit-nsfw">
                    	<input id="submit-nsfw" type="checkbox" class="checkbox" name="nsfw" value="1" /><?php echo $this->_tpl_vars['lang117']; ?>
</label>
                    </div>                
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
            	$(\'#form-scriptolution-soft-post-image\').submit();
            });
            </script>
            '; ?>

        </div>
    </div>
</div>

<div class="side-bar">
	<!--
    <div class="msg-box notice">
    	<h3><?php echo $this->_tpl_vars['lang121']; ?>
</h3>
    	<p>Số lượng bài đăng tối đa trong 24h : <?php echo $this->_tpl_vars['quota']; ?>
</p>
    </div>
	-->
    <div class="msg-box">
        <h3><?php echo $this->_tpl_vars['lang123']; ?>
</h3>
        <ul class="submit-info">
            <li><b><?php echo $this->_tpl_vars['lang127']; ?>
</b></li>
            <li><b><?php echo $this->_tpl_vars['lang128']; ?>
</b></li>
            <li><b><?php echo $this->_tpl_vars['lang129']; ?>
</b></li>
			<li>Bạn có thể sử dụng các ký tự trong bộ emoticons của yahoo như : :)) , =)) ,:| ...</li>
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