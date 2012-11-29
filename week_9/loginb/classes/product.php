<?php
require_once("table.php");
require_once("color.php");
require_once("supplier.php");

class Product extends Table
{
    protected $tableName = "products";
    
    public static function getProducts()
    {
        $db = new Database();
        $products = $db->getArray("SELECT `id` FROM `products`");
        $ret = array();
        foreach($products as $product)
        {
            $ret[] = new Product($product->id);
        }
        return $ret;
    }
    
    public function getColors()
    {
        if(!$this->id)
        {
            return null;
        }
        $colors = $this->getArray("SELECT `id` FROM `colors` WHERE `product_id` = $this->id;");
        $ret = array();
        foreach($colors as $color)
        {
            $ret[] = new Color($color->id);
        }
        return $ret;
    }
    
    public function getSuppliers()
    {
        if(!$this->id)
        {
            return null;
        }
        $suppliers = $this->getArray("SELECT `supplier_id` FROM `products_has_suppliers` WHERE `product_id` = $this->id;");
        $ret = array();
        foreach($suppliers as $supplier)
        {
            $ret[] = new Supplier($supplier->supplier_id);
        }
        return $ret;
    }
    
    public function addColor($clr)
    {
        $color = new Color();
        $color->color = $clr;
        $color->product_id = $this->id;
        $color->save();
    }
    
    //supplier may be: id of supplier, name (new), Supplier object
    public function addSupplier($supply)
    {
        if(is_numeric($supply))
        {
            $supplier = new Supplier($supply);
        }
        else if(is_string($supply))
        {
            $supplier = new Supplier();
            $supplier->name = $supply;
            $supplier->save();
        }
        else if($supply instanceof Supplier)
        {
            $supplier = $supply;
        }
        if(!isset($supplier))
        {
            throw new Exception("Invalid supplier data provided.");
            return false;
        }
        
        $so = new StdClass();
        $so->product_id = $this->id;
        $so->supplier_id = $supplier->id;
        $this->insert("products_has_suppliers", $so);
    }
    
    public function __get($key)
    {
        switch($key)
        {
            case "colors":
                return $this->getColors();
            break;
            case "manufacturers":
            case "suppliers":
                return $this->getSuppliers();
            break;
            default:
                return parent::__get($key);
            break;
        }
        
    }
}












