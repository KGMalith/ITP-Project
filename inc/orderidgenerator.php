<?php
    include 'dbconnect.php';

    $query = "SELECT * FROM orderm ORDER BY Order_ID DESC LIMIT 1";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['Order_ID'];

    if($lastid == ''){
        $orderid = "ODR1";
    }else{
        $orderid = substr($lastid,3);
        $orderid = intval($orderid);
        $orderid = "ODR" .($orderid + 1);
        
    }

?>