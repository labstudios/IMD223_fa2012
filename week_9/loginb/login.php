<?php
session_start();
//create database connection
require_once("classes/user.php");
//verify post data
if(empty($_POST['username']) ||
    empty($_POST['password1']))
    {
        $_SESSION['error'] = "Not all fields provided.";
        header("Location: ./");
    }
//verify new encryption against the one
//stored in the database
$user = User::checkLogin($_POST['username'], $_POST['password1']);
if($user)
{
    //store logged in user
    $_SESSION['userId'] = $user->id;    
}

 ?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Logging in . . . </title>
</head>

<body>
You are now logged in. You can now visit
<a href="securepage.php">this secure page.</a>


</body>
</html>