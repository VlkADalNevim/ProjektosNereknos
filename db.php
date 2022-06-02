<?php
    $dbservername = 'sql307.epizy.com';
    $dbusername = 'epiz_31599999';
    $dbpassword = 'FtxnQQ9xMj';
    $dbname = "epiz_31599999_mel";
    $connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysql_error());
    }
    
?>