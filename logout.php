<?php
	session_start();
	session_destroy();
	header("refresh:3; url=index.html");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="refresh" content="3; url=index.html">
		<title>Twitter following/followers/blocking list importer and exporter PHP</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<div class="main">
			Logged out, Move to <a href="index.html">index.html</a> after 3 seconds...
		</div>
	</body>
</html>