<?php
	session_start();

	require_once "config.php";
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$request_token = array();
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

	if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
		die('ERROR: Invalid token');
	}

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	$_SESSION['access_token'] = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$_SESSION['account_info'] = $connection->get("account/verify_credentials");
	session_regenerate_id();
	header('Location: main.php');
?>
