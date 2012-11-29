<?php
session_start();
//create database connection
require_once("classes/database.php");
$salt = "abNaGh834hYbn7hIOe2jio";
$db = new Database();
//verify post data
if(empty($_POST['username']) ||
    empty($_POST['password1']) ||
    empty($_POST['password2']))
    {
        $_SESSION['error'] = "Not all fields provided.";
        header("Location: ./");
        exit;
    }
//sanitize the user name
$_POST['username'] = Database::sanitize($_POST['username']);
//verify user name does not exist
$tempUser = $db->getItem("SELECT `id` FROM `users` WHERE `username` = '".
        $_POST['username']."'");
if(isset($tempUser->id))
{
    $_SESSION['error'] = "The user name ".$_POST['username']." is unavailable.";
    header("Location: ./");
    exit;
}
//verify password match
if($_POST['password1'] != $_POST['password2'])
{
    $_SESSION['error'] = "Your passwords no matchy.";
    header("Location: ./");
    exit;
}
//encrypt the password
$encPass = hash("sha256", $salt.$_POST['password1']);
//insert the new user
$newUser = new StdClass();
$newUser->username = $_POST['username'];
$newUser->password = $encPass;

$db->insert("users", $newUser, false);
?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Untitled 1</title>
</head>

<body>
You are now registered.


</body>
</html>