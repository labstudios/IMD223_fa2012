<?php
session_start();
require_once("classes/user.php");
$loggedIn = false;
if(!empty($_SESSION['userId']))
{
    //get the user
    $user = new User($_SESSION['userId']);
    if($user && $user->id)
    {
        $loggedIn = true;
    }
}

if(!$loggedIn)
{
    //header("Location: ./");
    echo "not logged in.";
}