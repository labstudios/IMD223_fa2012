<?php require_once("classes/product.php");

if(empty($_GET['id']))
{
   die("We better make a redirect"); 
}

$product = new Product($_GET['id']);

if(!$product->id)
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
<h4>Available Colors</h4>
<p>
<?php
    foreach($product->colors as $color)
    {
        echo $color->color."<br />";
    }
 ?>
 </p>
 <h4>Available Suppliers</h4>
 <p>
 <?php 
    foreach($product->suppliers as $supplier)
    {
        echo $supplier->name."<br />";
    }
 ?>
 </p>
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