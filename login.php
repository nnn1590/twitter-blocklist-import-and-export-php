<?php
	session_start();

	require_once "config.php";
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK_URL));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	header('Location: '.$connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token'])));
?>
