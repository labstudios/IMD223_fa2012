<?php require_once("classes/product.php");

$product = new Product();

$product->name = $_POST['name'];
$product->price = $_POST['price'];
$product->qty = $_POST['qty'];
$product->save();
$colors = explode(",", $_POST['colors']);
$newSuppliers = explode(",", $_POST['new_suppliers']);

//add the colors

foreach($colors as $color)
{
    $product->addColor($color);
}

//relate the suppliers

if(!empty($_POST['suppliers']))
{
    foreach($_POST['suppliers'] as $supplierId)
    {
        $product->addSupplier($supplierId);
    }
}

foreach($newSuppliers as $newSupplier)
{
    $product->addSupplier($newSupplier);
}

 ?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Adding</title>
</head>

<body>
<h3>Thanks! it has been added to the database!</h3>
<a href="./">Check it!</a>


</body>
</html>