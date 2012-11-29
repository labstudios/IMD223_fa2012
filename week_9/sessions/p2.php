<?php session_start(); ?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Untitled 1</title>
</head>

<body>
<?php 
if(!empty($_SESSION['dummydata']))
{
    echo $_SESSION['dummydata'];
}
else
{
    echo "I got nothin'.";
}

?>


</body>
</html>