<?php /* Smarty version 2.6.6, created on 2014-03-31 02:46:17
         compiled from lang2.tpl */ ?>
	<form name="langselectvi" id="langselectvi" method="post" style="padding:0; margin:0">
    <input type="hidden" name="language" value="vi" />
    </form>
    <form name="langselecten" id="langselecten" method="post" style="padding:0; margin:0">
    <input type="hidden" name="language" value="en" />
    </form>
	
    <div id='lang'>
        <ul>
            <div class='tip-border'></div>
            <li><a href="#" onclick="document.langselectvi.submit();">VN</a></li>
            <li><a href="#" onclick="document.langselecten.submit();">EN</a></li>
        </ul>
    </div>
    
    <?php echo '
    <script type="text/javascript">
    $(function() {
    $(\'.lang\').toggle(
    function() {    
    $(\'.lang\').text("x");
    $(\'#lang\').css({ display: \'block\', opacity: 1}); 
    },
    function() {
    $(\'.lang\').html($(\'#lang_button\').attr(\'label\'));
    $(\'#lang\').css({ display: \'\'});
    }
    );
    });
    </script>
    '; ?>