<?php
    require_once("hourlyemployee.php");
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Employee Example</title>
</head>

<body>
<?php
$employee = new Employee(); //creates an instance of the class
$emp2 = new Employee("bob", "simmons");
$emp3 = new Employee("justin", "walker");
$emp4 = new HourlyEmployee("george", "jetson", 7.8524);
Employee::employeeCount();
$employee->setFirstName("Fred");
$employee->setLastName("nickson");
$employee->setSalary(20569.32597);
?>
<div>
    <?php Employee::printEmployees(); ?>
</div>
<?php
    $emp4->clockIn();
    sleep(10);
    $emp4->clockOut();
?>

</body>
</html>