<?php
require_once("database.php");
require_once("color.php");
require_once("supplier.php");

class Product extends Database
{
    private $data;
    
    public function Product($id = null)
    {
        parent::__construct();
        $this->data = new StdClass();
        if($id)
        {
            $this->data = $this->getItem("SELECT * FROM `products` WHERE `id` = $id;");
        }
    }
    
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
                if(isset($this->data->$key))
                {
                    return $this->data->$key;
                }
                else
                {
                    return null;
                }
            break;
        }
        
    }
}












