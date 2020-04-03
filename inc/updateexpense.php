<?php
include 'dbconnect.php';
if(isset($_POST['updateexpense'])){

    $Date = mysqli_real_escape_string($con,$_POST['date']);
    $ExGID = mysqli_real_escape_string($con, $_POST['expensegroup']);
    $ExTID = mysqli_real_escape_string($con, $_POST['expensetype']);
    $Amount = mysqli_real_escape_string($con, $_POST['amount']);
    $PType = mysqli_real_escape_string($con, $_POST['check1']);
    $ID = mysqli_real_escape_string($con,$_POST['id']);

    if(empty($Date) || empty($ExGID) || empty($ExTID) || empty($Amount) || empty($PType)){
        header("Location:../Expenses/ViewExpense.php?error=emptyFields&id=".$ID);
        exit();
    }


    $query = "UPDATE expense SET Date='$Date',ExpGID='$ExGID',ExpTID='$ExTID',Amount='$Amount',PMethod='$PType' WHERE EXPID='$ID'";
    $result = mysqli_query($con,$query);

    if($result){
        header("Location:../Expenses/ExpenseTable.php?Update=Success");
        exit();
    }else{
        header("Location:../Expenses/ExpenseTable.php?error=SQLError");
        exit(); 
    }

}


?>