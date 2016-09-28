<!DOCTYPE html>
<html lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title></title>
    <link rel="shortcut icon" href="{$baseurl}/favicon.gif" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta content="width=device-width; initial-scale=1.0;" name="viewport" />
    <link rel="stylesheet" href="{$baseurl}/css/connect.css" media="screen,projection" type="text/css" />
</head>

<body id="page-signup">
    <div class="signup-wrapper">
    <div class="header">
    	<a href="{$baseurl}/"><h1 class="signup-wrapper">{$site_name}</h1></a>
    </div>
    <div class="content">
        <div class="description">
        <h2>{$lang44}</h2>
        </div>
        <form id="form-signup-login" class="generic" action="{$baseurl}/selectusername.php" method="post">
        	{if $error ne ""}
			<p id="setup-msg" class="message red">{$error}</p>
            {/if}
            <div class="field">
                <label>{$lang1}</label>
                <input id="setup-username" type="text" class="text" name="username" placeholder="{$lang1}" tabindex="1"/>
            </div>
            <div class="action">
                <input type="hidden" id="jlog" name="jlog" value="1" />
                <input id="setup-submit" type="submit" class="submit-button" value="Next"></input>
            </div>
            <p id="setup-msg" class="message red" style="display:none;"></p>
        </form>
    </div>
    </div>
    <div style="display:none;">
    </div>
	<div id="fb-root"></div>
</body>
</html>