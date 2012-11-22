<?php 
require_once("classes/product.php");  
?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>My Products</title>
</head>

<body>
<div>
<?php 
    $products = Product::getProducts();
    
    foreach($products as $product)
    {
        echo "<a href=\"details.php?id=$product->id\">$product->name</a> \r\n";
    }
?>
</div>

</body>
</html>