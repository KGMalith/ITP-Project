<?php
include 'dbconnect.php';

if(isset($_POST['addpaddy'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $startdate = mysqli_real_escape_string($con, $_POST['startdate']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $status = mysqli_real_escape_string($con,$_POST['status']);

    if(empty($itemid)){
        header("Location: ../Item/Stock/addConvertPaddyStock.php?error=emptyitem");
        exit();
    }

    $sql = "INSERT INTO convertpaddy(itemID,startDate,quantity,convertStatus) VALUES('$itemid','$startdate','$quantity','$status')";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: ../Item/Stock/addConvertPaddyStock.php?Register=Success");
        exit();
    }else{
        header("Location: ../Item/Stock/addConvertPaddyStock.php?error=SQLError");
        exit();
    }
}


?>