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
			die('ERROR: $ids is not array ('.gettype($ids).')');
		}
		if (isset($_POST['mode2']) && $_POST['mode2'] == "true") {
			include("exportlist2.php");
			if (!is_array($ids2)) {
				die('ERROR: $ids2 is not array ('.gettype($ids2).')');
			}
			$ids = array_diff($ids, $ids2);
		}
		if (empty($ids)) {
			echo '$ids is empty, nothing to do. (Probably if the list is empty or mode2 you may have already followed/blocked/muted all users in the list.)';
		} else {
			echo "<details>\n\t<summary>Log</summary>\n";
			foreach ($ids as $id) {
				if ($id !== "") {
					if (!isset($_GET['what_imexport'])) die('ERROR: what_imexport is not define or it\'s null');
					switch ($_GET['what_imexport']) {
						case "friends":
							$connection->post("friendships/create", ['user_id' => $id, 'follow' => false]);
							echo "\tTried to follow: ".$id."<br>\n";
							break;
						case "blocks":
							$connection->post("blocks/create", ['user_id' => $id, 'include_entities' => false, 'skip_status' => true]);
							echo "\tTried to block: ".$id."<br>\n";
							break;
						case "mutes/users":
							$connection->post("mutes/users/create", ['user_id' => $id]);
							echo "\tTried to mute: ".$id."<br>\n";
							break;
						default:
							die('ERROR: Unknown what to import: ('.$_GET['what_imexport'].')');
							break;
					}
				}
			}
			echo "</details>\nDone.";
		}
	} else {
		echo "ERROR: Please select a file.";
	}
?>
