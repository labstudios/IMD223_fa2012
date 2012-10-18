<?php

class Employee
{
    const COMPANY = "Bob's Widgets";
    private static $employees = array();
    protected $_firstName;
    protected $_lastName;
    protected $_salary;
    
    public function Employee($fname = "", $lname = "")
    {
        self::$employees[] = $this;
        if($fname != "")
        {
            $this->firstName = $fname;
        }
        if($lname != "")
        {
            $this->lastName = $lname;
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
        $this->_firstName = ucfirst($name);
    }
    
    /**
 	 * Sets the lastName variable and ensures it starts
     * with an uppercase letter
 	 * @author	Brent Allen
 	 * @param	String	name	the employee's last name.
  	*/
    public function setLastName($name)
    {
        $this->_lastName = ucfirst($name);
    }
    
    public function setSalary($amount)
    {
        $this->_salary = $amount;
    }
    
    public function getSalary()
    {
        return $this->_salary;
    }
    
    public function getFormattedSalary()
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format("%n", $this->_salary);
    }
    
    public function printName()
    {
        echo "$this->fullName makes $this->formattedSalary a year.";
    }
    
    public function __get($key)
    {
        switch($key)
        {
            case "firstName":
                return $this->_firstName;
            break;
            case "lastName":
                return $this->_lastName;
            break;
            case "fullName":
                return $this->_firstName . " " . $this->_lastName;
            break;
            case "salary":
                return $this->_salary;
            break;
            case "formattedSalary":
                return $this->getFormattedSalary();
            break;
            default:
                /*graceful return; not original functionality*/
                //return null;
                /*throw error if not available*/
                throw new Exception("This object does not carry the variable $key");
                /*retain original functionality*/
                return $this->$key; 
            break;
        }
    }
    
    public function __set($key, $val)
    {
        switch($key)
        {
            case "firstName":
                $this->_firstName = ucfirst($val);
            break;
            case "lastName":
                $this->_lastName = ucfirst($val);
            break;
            case "salary":
                 $this->_salary = $val;
            break;
            default:
                /*retain orignal functionality*/
                //$this->$key = $val; 
                /*throw error if not available*/
                throw new Exception("This object does not carry the variable $key");
            break;
        }
    }
    
    public function __destruct()
    {
        //echo "the employee has died.";
    }
}