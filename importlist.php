<?php
	session_start();

	require_once "config.php";
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$uploadfile = $_FILES['filename']['tmp_name'];

	if (is_uploaded_file($uploadfile)) {
		$access_token = $_SESSION['access_token'];
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

		$ids = (array)file($uploadfile);
		if (!is_array($ids)) {
			die('ERROR: Not array ('.gettype($ids).')');
		}
		foreach ($ids as $id) {
			if ($id !== "") {
				$connection->post("blocks/create", ['user_id' => $id, 'include_entities' => false, 'skip_status' => true]);
			}
		}
	} else {
		echo "ERROR: Please select a file.";
	}
?>
