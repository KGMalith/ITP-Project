<?php
include 'dbconnect.php';
if(isset($_GET['cpid'])){

    $cpid = mysqli_real_escape_string($con,$_GET['cpid']);

    $sql = "SELECT convertStatus FROM convertpaddy WHERE cp_ID='" . $cpid ."'";
    $result = mysqli_query($con,$sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $status = $row['convertStatus'];
        if($status==1){
            header("Location: ../Item/Stock/addConvertPaddyStockTable.php?delete=UnSuccess");
            exit();
        }else{
            $sql = "DELETE FROM convertpaddy WHERE cp_ID='". $cpid."'";
            $result2 = mysqli_query($con,$sql);
            if($result2){
                header("Location: ../Item/Stock/addConvertPaddyStockTable.php?delete=Success");
                exit();
            }else{
                header("Location: ../Item/Stock/addConvertPaddyStockTable.php?error=SQLError");
                exit();
            }
        }
    }else{
        header("Location: ../Item/Stock/addConvertPaddyStockTable.php?error=SQLError");
        exit();
    }
    

}


?>