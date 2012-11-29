<?php
session_start();
//create database connection
require_once("classes/database.php");
$salt = "abNaGh834hYbn7hIOe2jio";
$db = new Database();
//verify post data
if(empty($_POST['username']) ||
    empty($_POST['password1']))
    {
        $_SESSION['error'] = "Not all fields provided.";
        header("Location: ./");
    }
//sanitize the user name
$username = Database::sanitize($_POST['username']);
//pull user by the provided user name
$user = $db->getItem("SELECT * FROM `users` WHERE `username` = '$username'");
//encrypt the provided password
$encPass = hash("sha256", $salt.$_POST['password1']);
//verify new encryption against the one
//stored in the database
if($user->password === $encPass)
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