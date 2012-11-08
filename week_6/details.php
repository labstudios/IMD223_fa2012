<?php require_once("connect.php");

if(empty($_GET['id']))
{
   die("We better make a redirect"); 
}

$result = $db->query("SELECT * FROM `products` WHERE `id` = ".$_GET['id'].";");
if($result->num_rows == 0)
{
    die("redirect here as well");
}
$product = $result->fetch_object();
setlocale(LC_MONETARY, 'en_US');
?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Details | <?php echo $product->name; ?></title>
</head>

<body>

<h3><?php echo $product->name; ?></h3>
<p><?php echo money_format("%n", $product->price); ?></p>
<?php
if($product->qty > 0)
{
    ?><p><a href="#">Buy now!!</a></p><?php
}
else
{
    ?><p>Check back later! We'll get more!</p><?php
}
?>

</body>
</html>