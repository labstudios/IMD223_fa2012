<?php
require_once("employee.php");

class HourlyEmployee extends Employee
{
    private $inTime;
    private $outTime;
    
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
}