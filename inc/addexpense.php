<?php
include 'dbconnect.php';
if(isset($_POST['addexpense'])){

    $Date = mysqli_real_escape_string($con,$_POST['date']);
    $ExGID = mysqli_real_escape_string($con, $_POST['expensegroup']);
    $ExTID = mysqli_real_escape_string($con, $_POST['expensetype']);
    $Amount = mysqli_real_escape_string($con, $_POST['amount']);
    $PType = mysqli_real_escape_string($con, $_POST['check1']);

    if(empty($Date) || empty($ExGID) || empty($ExTID) || empty($Amount) || empty($PType)){
        header("Location:../Expenses/AddExpense.php?error=emptyFields");
        exit();
    }

    $query = "INSERT INTO expense(Date,ExpGID,ExpTID,Amount,PMethod) VALUES ('$Date','$ExGID','$ExTID','$Amount','$PType')";
    $result = mysqli_query($con,$query);

    if($result){
        header("Location:../Expenses/AddExpense.php?Register=Success");
        exit();
    }else{
        header("Location:../Expenses/AddExpense.php?error=SQLError");
        exit(); 
    }

}


?>