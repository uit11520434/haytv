<?php
/**
 * @file
 * Take the user when they return from Twitter. Get access tokens.
 * Verify credentials and redirect to based on response from Twitter.
 */

/* Start session and load lib */
session_start();
require_once('twitteroauth/twitteroauth.php');
include("include/config.php");
include("include/functions/import.php");

/* If the oauth_token is old redirect to the connect page. */
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
  $_SESSION['oauth_status'] = 'oldtoken';
  header('Location: ./clearsessions.php');
}

/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

/* Request access tokens from twitter */
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

/* Save the access tokens. Normally these would be saved in a database for future use. */
$_SESSION['access_token'] = $access_token;

/* Remove no longer needed request tokens */
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);

/* If HTTP response is 200 continue otherwise send to connect page to retry */
if (200 == $connection->http_code) {
  /* The user has been verified and the access tokens can be saved for future use */
  $_SESSION['status'] = 'verified';

		if(isset($access_token->error)){  
			// Something's wrong, go back to square 1  
			header('Location: twitter_login.php'); 
		} else { 
			// Let's find the user by its ID  
			
			$query = "SELECT * FROM members WHERE username ='" .$access_token['screen_name'] ."'";  
			$result = $conn->execute($query);
			// If not, let's add it to the database  
			if($result->fields['USERID']==""){  
						$_SESSION['USERNAME']=$access_token['screen_name'];
						header("Location:$config[baseurl]/twitter_signup");
			}
			else
			{
						$_SESSION['USERID']=$result->fields['USERID'];
						$_SESSION['EMAIL']=$result->fields['email'];
						$_SESSION['USERNAME']=$result->fields['username'];
						$_SESSION['VERIFIED']=$result->fields['verified'];
						$_SESSION['FILTER']=$result->fields['filter'];
						$setlang = $result->fields['mylang'];
						$redirect = $_SESSION['location'];
						if($redirect == "")
						{
							if ( $config[regredirect] == 1)
							{header("Location:$config[baseurl]/index.php".$addlang);exit;}
							else
							{header("Location:$config[baseurl]/settings".$addlang);exit;}
						}
						else
						{
							header("Location:".$config[baseurl].$redirect);exit;
						}
						$_SESSION['location'] = "";
			}
		}
	} else {
  /* Save HTTP status for error dialog on connnect page.*/
  header('Location: ./clearsessions.php');
}

