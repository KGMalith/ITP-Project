<?php

function num_of_employees(){
    include 'dbconnect.php';
    $result='';

    $sql = "SELECT COUNT(e.empid) AS TotalEmlployees FROM employee e";
    $resultset = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['TotalEmlployees'];

    echo $result;
}

function num_of_new_orders(){
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT COUNT(o.OrderM_ID) AS NewOrders FROM orderm o WHERE o.invoice_created = 0";
    $resultset = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['NewOrders'];

    echo $result;

}


















?>