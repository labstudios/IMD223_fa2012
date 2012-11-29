<?php
session_start();

require_once("classes/user.php");
//verify post data
if(empty($_POST['username']) ||
    empty($_POST['password1']) ||
    empty($_POST['password2']))
    {
        $_SESSION['error'] = "Not all fields provided.";
        header("Location: ./");
        exit;
    }

//verify user name does not exist
if(User::getUserByName($_POST['username']))
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

//insert the new user
$newUser = new User();
$newUser->username = $_POST['username'];
$newUser->password = $_POST['password1'];
$newUser->save();
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