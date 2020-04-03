<?php
include 'dbconnect.php';
if(isset($_GET['EXid'])){

    $ID = mysqli_real_escape_string($con,$_GET['EXid']);
    $sql = "DELETE FROM expense WHERE EXPID ='$ID'";

    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: ../Expenses/ExpenseTable.php?delete=Success");
        exit();
    }else{
        header("Location: ../Expenses/ExpenseTable.php?error=SQLError");
        exit();
    }

}

?>