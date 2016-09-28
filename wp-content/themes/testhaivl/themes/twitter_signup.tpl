<!DOCTYPE html>
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="{$lang254}" dir="LTR">
<head>
<title>{$pagetitle|stripslashes}</title>
<link rel="shortcut icon" href="{$baseurl}/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta content="width=device-width; initial-scale=1.0;" name="viewport" />
<link rel="stylesheet" href="{$baseurl}/css/connect.css" media="screen,projection" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>

<body id="page-signup">

<div class="signup-wrapper">
    <a class="signup-login-btn" href="{$baseurl}/login">{$lang10}<b>{$lang11}</b></a>
    <div class="header">
    	<a href="{$baseurl}"><h1>{$site_name}</h1></a>
    </div>
    <div class="content">
       
        <div id="signup-desc-done" class="description" style="display:block;">
            <h2>{$lang17}</h2>
        </div>
        
        <div id="request-invite-block" style="display:block;">
            <form id="form-signup-login" class="generic" action="">
            <div class="field">
                <label>{$lang20}</label>
                <input id="signup-request-email" type="email" class="text" placeholder="{$lang21}" maxlength="200"/>
                <input type="hidden" name="CSRFToken"  id="CSRFToken" value="1">
            </div>
            <div class="action">
            	<a id="get-email-invitation" class="button" href="javascript:void(0);">{$lang265}</a>
            </div>
            <p id="signup-msg" class="message red" style="display:block;"></p>
            </form>
        </div>
        <div id="request-invite-loading" style="display:block;">
        	<a class="button loading" href="javascript:void(0);"></a>
        </div>    
		<div id="signup-desc-done" class="description" style="display:block;">
            <h3>{$lang253}<br/>
			<a href="{$baseurl}">{$lang19}</a>
            </h3>
        </div>
    </div>
</div>

<div id="fb-root"></div>
{literal}
<script type="text/javascript">
$('#no-facebook-account').click(function(){
	$('.message').css('display','none');
	$('#request-invite-block').css('display','block');
	
	});
$('#get-email-invitation').click(function(){
sendinvitation($('#signup-request-email').val(),$('#CSRFToken').val());
$('#request-invite-loading').css('display','block');	
});
function sendinvitation(email,csrf){
	jQuery.ajax({
		type:'POST',
		url:' {/literal}{$baseurl}{literal}'+ '/twitter_sendinvitation.php',
		data:'email='+email+'&csrf='+csrf,
		success:function(e){
		if(e !=""){alert(e);}else{
			$('#request-invite-loading').css('display','none');
			$('#request-invite-block').css('display','none');
		$('#signup-desc').css('display','none');
			$('#signup-desc-done').css('display','block');	
			}
		}
		});
}
</script>
{/literal}
</body>
</html>