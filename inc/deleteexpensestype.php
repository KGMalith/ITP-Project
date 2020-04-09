<?php
include 'dbconnect.php';
if(isset($_GET['Tid'])){

    $Tid = mysqli_real_escape_string($con,$_GET['Tid']);

    $sql = "DELETE FROM expensetype WHERE ExpTID ='".$Tid."'";
    $result = mysqli_query($con,$sql);
    if($result){

        header("Location: ../Expenses/ExpensesTypeTable.php?delete=Success");
        exit();
    }else{
        header("Location: ../Expenses/ExpensesTypeTable.php?error=SQLError");
        exit();
    }


}

?>