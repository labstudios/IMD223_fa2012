<?php

session_start();
require_once("classes/database.php");
$db = new Database();
$loggedIn = false;
if(!empty($_SESSION['userId']))
{
    //get the user
    $user = $db->getItem("SELECT * FROM `users` WHERE `id` = '".$_SESSION['userId']."'");
    if(!empty($user->id))
    {
        $loggedIn = true;
    }
}

if(!$loggedIn)
{
    header("Location: ./");
}