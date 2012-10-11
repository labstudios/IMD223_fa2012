<?php

class Employee
{
    const COMPANY = "Bob's Widgets";
    private static $employees = array();
    protected $firstName;
    protected $lastName;
    protected $salary;
    
    public function Employee($fname = "", $lname = "")
    {
        self::$employees[] = $this;
        if($fname != "")
        {
            $this->setFirstName($fname);
        }
        if($lname != "")
        {
            $this->setLastName($lname);
        }
    }
    
    /**
 	 * Outputs to the page how many employee instances
     * have been created.
 	 * @author	Brent Allen
  	*/
    public static function employeeCount()
    {
        echo "<pre>There are ".count(self::$employees)." employees.</pre>";
    }
    
    public static function printEmployees()
    {
        foreach(self::$employees as $employee)
        {
            echo "<p>".$employee->printName()."</p>";
        }
    }
    
    /**
 	 * Sets the firstName variable and ensures it starts
     * with an uppercase letter
 	 * @author	Brent Allen
 	 * @param	String	name	the employee's first name.
  	*/
    public function setFirstName($name)
    {
        $this->firstName = ucfirst($name);
    }
    
    /**
 	 * Sets the lastName variable and ensures it starts
     * with an uppercase letter
 	 * @author	Brent Allen
 	 * @param	String	name	the employee's last name.
  	*/
    public function setLastName($name)
    {
        $this->lastName = ucfirst($name);
    }
    
    public function setSalary($amount)
    {
        $this->salary = $amount;
    }
    
    public function getSalary()
    {
        return $this->salary;
    }
    
    public function getFormattedSalary()
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format("%n", $this->salary);
    }
    
    public function printName()
    {
        echo "$this->firstName $this->lastName makes ".$this->getFormattedSalary()." a year.";
    }
    
    public function __destruct()
    {
        //echo "the employee has died.";
    }
}