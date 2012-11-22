<?php
require_once("database.php");

class Supplier extends Database
{
    
    private $data;
    
    public function Supplier($id = null)
    {
        parent::__construct();
        $this->data = new StdClass();
        if($id)
        {
            $this->data = $this->getItem("SELECT * FROM `suppliers` WHERE `id` = $id;");
        }
    }
    
    public static function allSuppliers()
    {
        $db = new Database();
        $suppliers = $db->getArray("SELECT `id` FROM `suppliers`");
        $ret = array();
        foreach($suppliers as $supplier)
        {
            $ret[] = new Supplier($supplier->id);
        }
        return $ret;
    }
    
    public function save()
    {
        if(!isset($this->data->id))
        {
            $this->insert("suppliers",$this->data);
            $this->data = $this->getItem("SELECT * FROM `suppliers` ORDER BY `id` DESC LIMIT 1");
        }
    }
    
    public function __get($key)
    {
        if(isset($this->data->$key))
        {
            return $this->data->$key;
        }
        else
        {
            return null;
        }
    }
    
    public function __set($key, $val)
    {
        switch($key)
        {
            case "name":
                $this->data->name = trim($val);
            break;
            default:
                throw new Exception("Unable to set $key on this object.");
            break;
        }
    }
}






