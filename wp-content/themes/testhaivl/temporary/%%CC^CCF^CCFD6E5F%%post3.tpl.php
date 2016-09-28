<?php /* Smarty version 2.6.6, created on 2014-02-22 07:04:37
         compiled from post3.tpl */ ?>
<script src="<?php echo $this->_tpl_vars['baseurl']; ?>
/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="http://rev.ckeditor.com/ckeditor/trunk/7505/_samples/sample.js" type="text/javascript"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul class="sub-menu-tabs">
                <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit"><i class="fa fa-picture-o"></i> <?php echo $this->_tpl_vars['lang100']; ?>
</a></li>
                <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit?t=v"><i class="fa fa-video-camera"></i> <?php echo $this->_tpl_vars['lang101']; ?>
</a></li>
                <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/post"><i class="fa fa-quote-right"></i> Truyện cười</a></li>
                <li class="active"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/post?t=2"><i class="fa fa-rss-square"></i> Báo hay</a></li>
                <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/post?t=1"><i class="fa fa-comments"></i> Tâm sự</a></li>
                <div class="clear"></div>
            </ul>

            <?php if ($this->_tpl_vars['error'] != ""): ?>
                <p class="alert alert-danger"><?php echo $this->_tpl_vars['error']; ?>
</p>
            <?php elseif ($this->_tpl_vars['message'] != ""): ?>
                <p class="alert alert-info"><?php echo $this->_tpl_vars['message']; ?>
</p>
            <?php endif; ?>
            <div id="content-holder">
                <div class="content form_photo">
                    <form class="form-horizontal"  enctype="multipart/form-data"  action="<?php echo $this->_tpl_vars['baseurl']; ?>
/post?t=2" method="post">
                        <input type="hidden" name="type" value="Blog"/>
                        <input id="post_type" type="hidden" name="post_type" value="Blog"/>
                        <input id="blog_type" type="hidden" name="blog_type" value="2"/>
                        <h3><i class="fa fa-rss-square"></i> Đăng bài: Báo hay trong ngày,tin nổi bật</h3>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $this->_tpl_vars['lang111']; ?>
</label>
                            <div class="col-sm-8">
                                <input id="post_title" type="text" class="form-control" name="title" maxlength="120" value="" required/>
                                <p class="info" ><?php echo $this->_tpl_vars['lang112']; ?>
</p>
                            </div>
                        </div>
                        <!--
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Thông điệp của bạn <span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></label>
                            <div class="col-sm-8">
                                <input id="post_title2" type="text" class="form-control" name="title2" maxlength="80" value=""/>
                                <p class="info" >Bạn có thể đăng những nhận xét, cản nghĩ về bài đăng bạn muốn chia sẻ</p>
                            </div>
                        </div>
                        -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Ảnh đại diện</label>
                            <div class="col-sm-8">
                                <input id="photo_file_upload" class="form-control" type="file" name="image" required/>
                                <p class="info"><?php echo $this->_tpl_vars['lang107']; ?>
</p>
                            </div>
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $this->_tpl_vars['lang113']; ?>
 <span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></label>
                            <div class="col-sm-8">
                                <input id="photo_tag_input" type="text" class="form-control" name="tags" value="<?php echo $this->_tpl_vars['tag']; ?>
" placeholder="Ví dụ: Châu Tinh Trì,Phim Hài"/>
                                <p class="info" >Gắn thẻ giúp tạo trang riêng cho chuyện mục của bạn</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $this->_tpl_vars['lang115']; ?>
 <span>(<?php echo $this->_tpl_vars['lang114']; ?>
)</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="source" value="" maxlength="300"/>
                                <p class="info" ><?php echo $this->_tpl_vars['lang116']; ?>
</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <label class="checkbox" for="checkbox-nsfw">
                                    <input type="checkbox" value="1" id="checkbox-nsfw" data-toggle="checkbox" name="nsfw"/> <?php echo $this->_tpl_vars['lang117']; ?>

                                </label>
                            </div>
                        </div>
                        <div class="actions">
                            <button type="submit" class="btn btn-primary"><?php echo $this->_tpl_vars['lang120']; ?>
</button>
                            <a class="btn btn-default" href="/"><?php echo $this->_tpl_vars['lang119']; ?>
</a>
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
    </div>
</div>
