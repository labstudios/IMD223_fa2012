<?php 
session_start();
require_once("classes/product.php"); ?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Test Area</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>

<body>
<?php

$products = Table::build("Product")->getPage();
foreach($products as $product)
{
    echo "<a href=\"details.php?id=$product->id\">$product->name</a><br /> \r\n";
}
?>
<h3>Register with my site!</h3>
<?php if(!empty($_SESSION['error']))
        {
            echo "<div class=\"error\">".$_SESSION['error']."</div>";
            $_SESSION['error'] = null;
        }
 ?>
<form action="register.php" method="post" enctype="multipart/form-data">
    <label>User name: <input type="text" name="username" /></label>
    <label>Password: <input type="password" name="password1" /></label>
    <label>Verify: <input type="password" name="password2" /></label>
    <input type="submit" />
</form>

<h3>Login</h3>
<form action="login.php" method="post" enctype="multipart/form-data">
    <label>User name: <input type="text" name="username" /></label>
    <label>Password: <input type="password" name="password1" /></label>
    <input type="submit" />
</form>


</body>
</html>







