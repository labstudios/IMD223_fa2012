<?php require_once("database.php"); $db = new Database();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Add a new Product</title>
    <style>
        label{
            display: block;
            padding: 7px;
        }
    </style>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="addproduct.php">
<label>Name: <input type="text" name="name" /></label>
<label>Price: <input type="text" name="price" /></label>
<label>Quantity: <input type="text" name="qty" /></label>
<label>Colors <small>comma separated</small>: <input type="text" name="colors" /></label>
<?php
    $suppliers = $db->getArray("SELECT * FROM `suppliers`");
 ?>
 <h4>Suppliers:</h4>
 <?php
    foreach($suppliers as $supplier)
    {
        ?>
<label><input type="checkbox" name="suppliers[]" value="<?php echo $supplier->id; ?>" /><?php echo $supplier->name; ?></label>
        <?php
    }
 ?>
<input type="submit" />
</form>


</body>
</html>






