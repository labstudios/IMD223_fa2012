<?php require_once("checkLogin.php"); ?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Untitled 1</title>
</head>

<body>
Hello, <?php echo $user->username; ?>, don't you feel special?
Why don't you <a href="logout.php">Log out</a> now?

</body>
</html>