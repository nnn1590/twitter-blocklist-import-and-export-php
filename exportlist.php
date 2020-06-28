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
	if (!isset($_GET['what_imexport'])) die('ERROR: what_imexport is not define or it\'s null');
	if ($_GET['what_imexport'] !== "friends" && $_GET['what_imexport'] !== "followers" && $_GET['what_imexport'] !== "blocks")
		die('ERROR: Unknown what to export: ('.$_GET['what_imexport'].')');
	do {
		$result = $connection->get($_GET['what_imexport']."/ids", ['cursor' => $cursor]);
			if (!is_array($result->ids)) {
				die('ERROR: Not array ('.gettype($result->ids).')');
			}
			foreach ($result->ids as $id) {
				echo $id."\n";
				/**
				* The CSV of the block list that used to be available for download in the Twitter Web Client didn't have a newline at end of file. 
				* If you like it, uncomment here.(Don't forget to delete above 'echo $id."\n";'.)

				echo $id;
				if ($id !== end($result->ids)) {
					echo "\n";
				}
				*/
			}
			$cursor = $result->next_cursor;
	} while ($cursor != 0);
?>
