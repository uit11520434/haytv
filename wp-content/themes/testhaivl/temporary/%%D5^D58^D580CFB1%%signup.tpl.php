<?php /* Smarty version 2.6.6, created on 2014-03-04 09:25:29
         compiled from signup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'signup.tpl', 4, false),)), $this); ?>
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
 <?php echo $this->_tpl_vars['lang11']; ?>
</a>
    <div class="header">
        	<center><a href="http://myfancy.org"><img src="http://myfancy.org/images/logo-large.png" /></center>
    	<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"><h1><?php echo $this->_tpl_vars['site_name']; ?>
</h1></a>
    </div>
    <div class="content">
    <div id="signup-desc" class="description">    
            <h2><?php echo $this->_tpl_vars['lang12']; ?>
 <?php echo $this->_tpl_vars['site_name']; ?>
</h2>
            <h3><?php echo $this->_tpl_vars['lang9']; ?>
<br/><?php echo $this->_tpl_vars['lang13']; ?>
.</h3>
            <div class="spcl-button-wrap">
            	<a class="spcl-button facebook badge-facebook-connect" label="LoginFormFacebookButton" next="" href="https://www.facebook.com/dialog/permissions.request?app_id=<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
&display=page&next=<?php echo $this->_tpl_vars['baseurl']; ?>
/&response_type=code&fbconnect=1&perms=email,user_birthday,user_about_me"><?php echo $this->_tpl_vars['lang14']; ?>
</a><br>
				<?php if ($this->_tpl_vars['TC'] == '1'): ?>
				<a class="spcl-button twitter" label="LoginFormTwitterButton" next="" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/twitter_signin.php"><?php echo $this->_tpl_vars['lang252']; ?>
</a>
				<?php endif; ?>
            </div>
            <p class="message">
                <?php echo $this->_tpl_vars['lang15']; ?>
<br/>
                <a id="no-facebook-account" href="javascript:void(0);"><?php echo $this->_tpl_vars['lang16']; ?>
</a>.
            </p>
        </div>
        
        <div id="signup-desc-done" class="description" style="display:none;">
            <h2><?php echo $this->_tpl_vars['lang17']; ?>
</h2>
            <h3><?php echo $this->_tpl_vars['lang18']; ?>
<br/>
            <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"><?php echo $this->_tpl_vars['lang19']; ?>
</a></h3>
        </div>
        
        <div id="request-invite-block" style="display:none;">
            <form id="form-signup-login" class="generic" action="">
            <div class="field">
                <label><?php echo $this->_tpl_vars['lang20']; ?>
</label>
                <input id="signup-request-email" type="email" class="text" placeholder="<?php echo $this->_tpl_vars['lang21']; ?>
" maxlength="200"/>
                <input type="hidden" name="CSRFToken"  id="CSRFToken" value="1">
            </div>
            <div class="action">
            	<a id="get-email-invitation" class="button" href="javascript:void(0);"><?php echo $this->_tpl_vars['lang22']; ?>
</a>
            </div>
            <p id="signup-msg" class="message red" style="display:none;"></p>
            </form>
        </div>
        <div id="request-invite-loading" style="display:none;">
        	<a class="button loading" href="javascript:void(0);"></a>
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
		url:\' ';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/sendinvitation.php\',
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