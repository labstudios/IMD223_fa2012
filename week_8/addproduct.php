<?php require_once("database.php");

$db = new Database();

//Database::preOut($_POST); //for testing
//------------------------------
//Write the insert query. Note: sqlCall would be replaced
// by the query function if using mysqli straight up
//First, we need to sanitize

/*$data = (Object) filter_input_array(POST, FILTER_SANITIZE_STRING);
$db->sqlCall("INSERT INTO `products` (`name`, `price`,`qty`)".
            " VALUES ('$data->name', '$data->price', '$data->qty');");*/
//------------------------------

//Quick insert function in database class, if form directly correlates with
//ALL table field names

//$db->insert("products", $_POST);

//------------------------------

//With more complex form information, we need to segment out our data
$product = new StdClass();

$product->name = $_POST['name'];
$product->price = $_POST['price'];
$product->qty = $_POST['qty'];
$colors = explode(",", $_POST['colors']);
$suppliers = $_POST['suppliers'];
//add the new product
$db->insert("products", $product);
//get the last product
$product = $db->getItem("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 1");

//add the colors

foreach($colors as $color)
{
    $co = new StdClass();
    $co->color = trim($color);
    $co->product_id = $product->id;
    $db->insert("colors", $co);
}

//relate the suppliers

foreach($suppliers as $supplierId)
{
    $so = new StdClass();
    $so->product_id = $product->id;
    $so->supplier_id = $supplierId;
    $db->insert("products_has_suppliers", $so);
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