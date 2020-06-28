<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Twitter following/followers/blocking list importer and exporter PHP</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<div class="main">
			<h1>Hello, <?php
				session_start();
				if (isset($_SESSION['account_info'])) {
					echo(htmlspecialchars($_SESSION['account_info']->name.'(@'.$_SESSION['account_info']->screen_name.')!'));
				} else {
					echo(htmlspecialchars('Anonymous! (Seems not to be logged in.)'));
				}
			?></h1>
			<div class="note_warning">
				WARNING: This app/tool does not specifically consider Twitter API rate limits or account lock/suspend.
				Please be careful when using...<br><br>
				警告: このアプリ/ツールはTwitter APIのレートリミットやアカウントのロック/凍結について特に考慮していません。
				使用する場合は気をつけてください…
			</div>
			<div class="bullet">
				<div>Following</div>
				<a href="following_import.html">Import</a>
				<a href="following_export.html">Export</a>
			</div>
			<div class="bullet">
				<div>Followers</div>
				<a href="followers_export.html">Export</a>
			</div>
			<div class="bullet">
				<div>Blocking</div>
				<a href="blocking_import.html">Import</a>
				<a href="blocking_export.html">Export</a>
			</div>
			<div class="bullet">
				<div>Muting users</div>
				<a href="muting_import.html">Import</a>
				<a href="muting_export.html">Export</a>
			</div>
			<div class="bullet">
				<div>Pending follower requests</div>
				<a href="incoming_follow_requests_export.html">Export</a>
			</div>
			<br>
			<a href="logout.php">Logout(destory php session)</a>
			<hr>
			<a href="https://github.com/nnn1590/twitter-blocklist-import-and-export-php">Source code</a>
		</div>
	</body>
</html>
