<?php
	$ids2 = array();
	$cursor2 = -1;
	if (!isset($_GET['what_imexport'])) die('ERROR: what_imexport is not define or it\'s null');
	if ($_GET['what_imexport'] !== "friends" && $_GET['what_imexport'] !== "followers" && $_GET['what_imexport'] !== "blocks" && $_GET['what_imexport'] !== "mutes/users")
		die('ERROR: Unknown what to export: ('.$_GET['what_imexport'].')');
	$what_imexport2 = $_GET['what_imexport']."/ids";
	do {
		$result2 = $connection->get($what_imexport2, ['cursor' => $cursor2]);
		if (!is_array($result2->ids)) {
			die('ERROR: Not array ('.gettype($result2->ids).')');
		}
		foreach ($result2->ids as $id) {
			array_push($ids2,$id."\n");
		}
		$cursor2 = $result2->next_cursor;
	} while ($cursor2 != 0);
?>
