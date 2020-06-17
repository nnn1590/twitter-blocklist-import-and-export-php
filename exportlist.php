<?php
	session_start();

	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=".$_SESSION['account_info']->screen_name."_".date("Ymd").".csv");
	header("Content-Transfer-Encoding: binary");

	require_once "config.php";
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

	$ids = array();
	$cursor = -1;
	do {
		$result = $connection->get("blocks/ids", ['cursor' => $cursor]);
			if (!is_array($result->ids)) {
				die('ERROR: Not array ('.gettype($result->ids).')');
			}
			foreach ($result->ids as $id) {
				echo $id;
				if ($id !== end($result->ids)) {
					echo "\n";  // The CSV that used to be available for download in the Twitter Web Client didn't have a newline at end of file.
				}
			}
			$cursor = $result->next_cursor;
	} while ($cursor != 0);
?>
