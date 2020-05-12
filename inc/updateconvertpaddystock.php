<?php
include 'dbconnect.php';

if(isset($_POST['updatepaddy'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $startdate = mysqli_real_escape_string($con, $_POST['startdate']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $cpid = mysqli_real_escape_string($con,$_POST['conpaddyid']);

    if(empty($itemid)){
        header("Location: ../Item/Stock/addConvertPaddyStockDetails.php?error=emptyitem&iname=". $itemid. "&date=". $startdate. "&quantity=". $quantity. "&cppid=". $cpid);
        exit();
    }

    $sql = "UPDATE convertpaddy SET itemID='". $itemid. "',startDate='". $startdate. "',quantity='". $quantity. "' WHERE cp_ID='". $cpid."'";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: ../Item/Stock/addConvertPaddyStockTable.php?Update=Success");
        exit();
    }else{
        header("Location: ../Item/Stock/addConvertPaddyStockTable.php?error=SQLError");
        exit();
    }
}
