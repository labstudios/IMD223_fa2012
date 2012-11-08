<?php
//make sure to set your database data as appropriate below
$db = new mysqli("localhost", "example3", "pass123", "example3");

if($db->connect_errno)
{
    die("Database unavailable");
}