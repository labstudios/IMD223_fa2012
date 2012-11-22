<?php
require_once("database.php");

class Color extends Database
{
    
    private $data;
    
    public function Color($id = null)
    {
        parent::__construct();
        $this->data = new StdClass();
        if($id)
        {
            $this->data = $this->getItem("SELECT * FROM `colors` WHERE `id` = $id;");
        }
    }
    
    public function save()
    {
        if(!isset($this->data->id))
        {
            $this->insert("colors",$this->data);
            $this->data = $this->getItem("SELECT * FROM `colors` ORDER BY `id` DESC LIMIT 1");
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
            case "color":
                $this->data->color = trim($val);
            break;
            case "product_id":
                $this->data->product_id = $val;
            break;
            default:
                throw new Exception("Unable to set $key on this object.");
            break;
        }
    }
}