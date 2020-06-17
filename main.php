<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Twitter blocklist importer and exporter PHP</title>
	</head>
	<body>
		<h1>Welcome, <?php session_start();
			session_start();

			require_once "config.php";
			require "vendor/autoload.php";
			use Abraham\TwitterOAuth\TwitterOAuth;

			echo(htmlspecialchars($_SESSION['account_info']->name.'(@'.$_SESSION['account_info']->screen_name.')'));
		?>!</h1>
		<s><!-- TODO: Implement --><a href="import.html">(TODO)Import</a></s><br>
		<a href="export.html">Export</a><br>
		<a href="logout.php">Logout(destory php session)</a>
		<hr>
		<a href="https://github.com/nnn1590/twitter-blocklist-import-and-export-php">Source code</a>
	</body>
</html>
