<?php
include 'dbconnect.php';
if(isset($_GET['Gid'])){

    $Gid = mysqli_real_escape_string($con,$_GET['Gid']);

    $sql = "DELETE FROM expensegroup WHERE ExpGID ='".$Gid."'";
    $result = mysqli_query($con,$sql);
    if($result){

        header("Location: ../Expenses/ExpensesGroupTable.php?delete=Success");
        exit();
    }else{
        header("Location: ../Expenses/ExpensesGroupTable.php?error=SQLError");
        exit();
    }


}
