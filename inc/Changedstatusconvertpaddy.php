<?php
include 'dbconnect.php';

if(isset($_GET['cpid'])){

    $cpid = mysqli_real_escape_string($con,$_GET['cpid']);
    $enddate = date('Y-m-d');

    $sql = "UPDATE convertpaddy SET endDate='". $enddate."',convertStatus= '1' WHERE cp_ID='". $cpid."'";
    $result = mysqli_query($con,$sql);

    if($result){
        header("Location: ../Item/Stock/addConvertPaddyStockTable.php?status=Success");
        exit();

    }else{
        header("Location: ../Item/Stock/addConvertPaddyStockTable.php?error=SQLError");
        exit();
    }
}

?>