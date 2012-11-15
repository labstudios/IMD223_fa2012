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
}