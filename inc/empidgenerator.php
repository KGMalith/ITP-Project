<?php
    include 'dbconnect.php';

    $query = "SELECT * FROM employee ORDER BY empid DESC LIMIT 1";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['empid'];

    if($lastid == ''){
        $empid = "EMP1";
    }else{
        $empid = substr($lastid,3);
        $empid = intval($empid);
        $empid = "EMP" .($empid + 1);
        
    }

?>