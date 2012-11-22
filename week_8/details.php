<?php require_once("database.php");
$db = new Database();
if(empty($_GET['id']))
{
   die("We better make a redirect"); 
}

$product = $db->getItem("SELECT * FROM `products` WHERE `id` = ".$_GET['id'].";");
if(empty($product->id))
{
    die("redirect here as well");
}

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