<?php
require_once("employee.php");

class HourlyEmployee extends Employee
{
    private $_inTime;
    private $_outTime;
    
    public function HourlyEmployee($fname = "", $lname = "", $amount = 0)
    {
        parent::__construct($fname, $lname);
        $this->setSalary($amount);
    }
    
    public function printName()
    {
        echo "$this->firstName $this->lastName makes ".$this->getFormattedSalary()." an hour.";
    }
    
    public function clockIn()
    {
        $this->inTime = time();
    }
    
    public function clockOut()
    {
        $this->outTime = time();
        
        $diff = $this->outTime - $this->inTime;
        echo "$this->firstName worked for $diff seconds.";
    }
    
    public function __get($key)
    {
        switch($key)
        {
            case "inTime":
                return $this->_inTime;
            break;
            case "outTime":
                return $this->_outTime;
            break;
            default:
                return parent::__get($key);
            break;
        }
    }
    
    public function __set($key, $val)
    {
        switch($key)
        {
            case "inTime":
                $this->_inTime = $val;
            break;
            case "outTime":
                $this->_outTime = $val;
            break;
            default:
                parent::__set($key, $val);
            break;
        }
    }
}