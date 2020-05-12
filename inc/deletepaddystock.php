<?php
    include 'dbconnect.php';

    if(isset($_GET['stkid'])){
        $stockID = mysqli_real_escape_string($con,$_GET['stkid']);

        $sql = "DELETE FROM paddystock WHERE p_ID = '". $stockID."'";
        $result = mysqli_query($con,$sql);

        if($result){
            header("Location: ../Item/Stock/addPaddyStockTable.php?delete=Success");
            exit();
        }else{
            header("Location: ../Item/Stock/addPaddyStockTable.php?error=SQLError");
            exit();
        }
    }
?>