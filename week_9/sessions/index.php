<?php session_start();
$_SESSION['dummydata'] = "Hi!";
 ?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Session Example</title>
</head>

<body>
<?php echo $_SESSION['dummydata'];?>


</body>
</html>