<?php
require_once("database.php");
class Table extends Database
{
    protected $tableName = "";
    protected $tableId = "id";
    private static $columnsForTable = array();
    protected $columns;
    protected $data;
    protected $verifyFields = true; //ensure the field exists on get/set
    protected $className;
    protected $isNew = true;
    protected $autoSanitize = true; //sanitize data on save
    protected $autoTrim = true; //trim strings on setting
    
    public function Table($id = null)
    {
        parent::__construct();
        $this->data = new StdClass();
        $this->className = get_class($this);
        if(is_object($id))
        {
            $this->data = $id;
            $this->isNew = false;
        }
        else if($id)
        {
            $this->data = $this->getItem("SELECT * FROM `$this->tableName` WHERE `$this->tableId` = $id;");
            $this->isNew = false;
        }
        
        if(!isset(self::$columnsForTable[$this->tableName]))
        {
            self::$columnsForTable[$this->tableName] = $this->getArray("SHOW COLUMNS FROM `$this->tableName`");
        }
        $this->columns = self::$columnsForTable[$this->tableName];
    }
    
    public static function build($class, $id = null)
    {
        return new $class($id);
    }
    
    public function getPage($offset = 0, $limit = 30)
    {
        $ret = array();
        if($limit > 0)
        {
            $items = $this->getArray("SELECT * FROM `$this->tableName` LIMIT $offset, $limit");
        }
        else
        {
            $items = $this->getArray("SELECT * FROM `$this->tableName`");
        }
        
        foreach($items as $item)
        {
            $ret[] = new $this->className($item);
        }
        
        return $ret;
    }
    
    public function getAll()
    {
        self::getPage(0, 0);
    }
    
    public function hasField($field)
    {
        $ret = false;
        foreach($this->columns as $column)
        {
            if($column->Field == $field)
            {
                $ret = true;
                break;
            }
        }
        
        return $ret;
    }
    
    public function save()
    {
        if($this->isNew)
        {
            $this->insert($this->tableName, $this->data, $this->autoSanitize);
            $this->data = $this->getItem("SELECT * FROM `$this->tableName` ORDER BY `$this->tableId` DESC LIMIT 1");
        }
        else
        {
            $this->update($this->tableName, $this->tableId, $this->id, $this->data, $this->autoSanitize);
        }
    }
    
    public function __get($key)
    {
        if($this->verifyFields && !$this->hasField($key))
        {
            throw new Exception("$key does not exist on table $this->tableName.");
        }
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
        if($this->verifyFields && !$this->hasField($key))
        {
            throw new Exception("$key does not exist on table $this->tableName.");
            return;
        }
        $this->data->$key = $this->autoTrim && is_string($val) ? trim($val):$val;
    }
}