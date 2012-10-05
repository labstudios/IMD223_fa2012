<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>First PHP Example</title>
</head>

<body>
    <?php include("navigation.php"); ?>
    
    <?php
        $names = array();
        $names[] = "Fred";
        array_push($names, "George", "Frederick");
        $names[] = "Walter";
        
        $employee = array();
        $employee['firstName'] = "Bob";
        $employee['lastName'] = "Phills";
        $employee['job'] = "Master of Custodian Arts";
        
        $employee = (Object) $employee;
    ?>
    <pre>
        <?php 
        print_r($employee);
        var_dump($employee); ?>
    </pre>
    <div>
        <?php
            for($i = 0; $i < count($names);++$i)
            {
                echo $names[$i]."<br />\r\n";
            }
        ?>
        <p>
            <?php
                foreach($employee as $key => $value)
                {
                    echo "$key: $value<br />\r\n\t\t";
                }
            ?>
        </p>
    </div>
    <div>
        <h3>This is some content.</h3>
        <p>Morbi aliquet semper tortor eget sagittis. Etiam fringilla lacinia nunc. Donec mattis luctus elit, a commodo mi rutrum quis. Pellentesque accumsan sem hendrerit justo dignissim sollicitudin id consectetur neque. Vivamus mattis nulla quam. Integer a lectus sit amet neque imperdiet ultrices. Proin dictum sagittis ullamcorper. Integer at turpis eu odio fringilla posuere in porta lacus. Nullam id dui nunc, ac euismod orci. Proin laoreet quam scelerisque sem ullamcorper vel interdum nisl pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris magna nulla, condimentum quis malesuada vel, hendrerit non quam. Aenean volutpat ornare neque. Mauris eget sem sem, vel elementum orci. In eu lacus orci.</p>
        <p>Morbi aliquet semper tortor eget sagittis. Etiam fringilla lacinia nunc. Donec mattis luctus elit, a commodo mi rutrum quis. Pellentesque accumsan sem hendrerit justo dignissim sollicitudin id consectetur neque. Vivamus mattis nulla quam. Integer a lectus sit amet neque imperdiet ultrices. Proin dictum sagittis ullamcorper. Integer at turpis eu odio fringilla posuere in porta lacus. Nullam id dui nunc, ac euismod orci. Proin laoreet quam scelerisque sem ullamcorper vel interdum nisl pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris magna nulla, condimentum quis malesuada vel, hendrerit non quam. Aenean volutpat ornare neque. Mauris eget sem sem, vel elementum orci. In eu lacus orci.</p>
        <p>Morbi aliquet semper tortor eget sagittis. Etiam fringilla lacinia nunc. Donec mattis luctus elit, a commodo mi rutrum quis. Pellentesque accumsan sem hendrerit justo dignissim sollicitudin id consectetur neque. Vivamus mattis nulla quam. Integer a lectus sit amet neque imperdiet ultrices. Proin dictum sagittis ullamcorper. Integer at turpis eu odio fringilla posuere in porta lacus. Nullam id dui nunc, ac euismod orci. Proin laoreet quam scelerisque sem ullamcorper vel interdum nisl pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris magna nulla, condimentum quis malesuada vel, hendrerit non quam. Aenean volutpat ornare neque. Mauris eget sem sem, vel elementum orci. In eu lacus orci.</p>
    </div>
    <div>
        <h3>There is some PHP below.</h3>
        <?php 
            echo "But you probably wouldn't notice if we hadn't told you.";
        ?>
    </div>
    <?php include("navigation.php"); ?>
</body>
</html>