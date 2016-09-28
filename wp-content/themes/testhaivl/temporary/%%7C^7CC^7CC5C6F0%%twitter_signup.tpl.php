<?php /* Smarty version 2.6.6, created on 2014-02-27 06:37:02
         compiled from twitter_signup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'twitter_signup.tpl', 4, false),)), $this); ?>
<!DOCTYPE html>
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?php echo $this->_tpl_vars['lang254']; ?>
" dir="LTR">
<head>
<title><?php echo ((is_array($_tmp=$this->_tpl_vars['pagetitle'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</title>
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta content="width=device-width; initial-scale=1.0;" name="viewport" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/connect.css" media="screen,projection" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>

<body id="page-signup">

<div class="signup-wrapper">
    <a class="signup-login-btn" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><?php echo $this->_tpl_vars['lang10']; ?>
<b><?php echo $this->_tpl_vars['lang11']; ?>
</b></a>
    <div class="header">
    	<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"><h1><?php echo $this->_tpl_vars['site_name']; ?>
</h1></a>
    </div>
    <div class="content">
       
        <div id="signup-desc-done" class="description" style="display:block;">
            <h2><?php echo $this->_tpl_vars['lang17']; ?>
</h2>
        </div>
        
        <div id="request-invite-block" style="display:block;">
            <form id="form-signup-login" class="generic" action="">
            <div class="field">
                <label><?php echo $this->_tpl_vars['lang20']; ?>
</label>
                <input id="signup-request-email" type="email" class="text" placeholder="<?php echo $this->_tpl_vars['lang21']; ?>
" maxlength="200"/>
                <input type="hidden" name="CSRFToken"  id="CSRFToken" value="1">
            </div>
            <div class="action">
            	<a id="get-email-invitation" class="button" href="javascript:void(0);"><?php echo $this->_tpl_vars['lang265']; ?>
</a>
            </div>
            <p id="signup-msg" class="message red" style="display:block;"></p>
            </form>
        </div>
        <div id="request-invite-loading" style="display:block;">
        	<a class="button loading" href="javascript:void(0);"></a>
        </div>    
		<div id="signup-desc-done" class="description" style="display:block;">
            <h3><?php echo $this->_tpl_vars['lang253']; ?>
<br/>
			<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"><?php echo $this->_tpl_vars['lang19']; ?>
</a>
            </h3>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<?php echo '
<script type="text/javascript">
$(\'#no-facebook-account\').click(function(){
	$(\'.message\').css(\'display\',\'none\');
	$(\'#request-invite-block\').css(\'display\',\'block\');
	
	});
$(\'#get-email-invitation\').click(function(){
sendinvitation($(\'#signup-request-email\').val(),$(\'#CSRFToken\').val());
$(\'#request-invite-loading\').css(\'display\',\'block\');	
});
function sendinvitation(email,csrf){
	jQuery.ajax({
		type:\'POST\',
		url:\' ';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/twitter_sendinvitation.php\',
		data:\'email=\'+email+\'&csrf=\'+csrf,
		success:function(e){
		if(e !=""){alert(e);}else{
			$(\'#request-invite-loading\').css(\'display\',\'none\');
			$(\'#request-invite-block\').css(\'display\',\'none\');
		$(\'#signup-desc\').css(\'display\',\'none\');
			$(\'#signup-desc-done\').css(\'display\',\'block\');	
			}
		}
		});
}
</script>
'; ?>

</body>
</html>