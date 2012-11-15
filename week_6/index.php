<?php require_once("connect.php");?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>My Products</title>
</head>

<body>
<div>
<?php 
    $productData = $db->query("SELECT * FROM `products`;");
    
    if($db->errno)
    {
        die("Error: ".$db->error." Info: ". $db->info);
    }
    while($product = $productData->fetch_object())
    {
        //print_r($product); //good for testing
        echo "<a href=\"details.php?id=$product->id\">$product->name</a> \r\n";
    }
?>
</div>

</body>
</html>