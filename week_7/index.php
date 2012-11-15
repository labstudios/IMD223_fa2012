<?php 
require_once("database.php"); 
$db = new Database(); 
?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>My Products</title>
</head>

<body>
<div>
<?php 
    $products = $db->getArray("SELECT * FROM `products`;");
    //Database::preOut($products);
    
    foreach($products as $product)
    {
        echo "<a href=\"details.php?id=$product->id\">$product->name</a> \r\n";
    }
?>
</div>

</body>
</html>