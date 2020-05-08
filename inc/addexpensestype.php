<?php
include 'dbconnect.php';

if(isset($_POST['addexpensetype'])){

    $ExpnsGroupID = mysqli_real_escape_string($con,$_POST['expenseGroup']);
    $ExpnsTypeName  = mysqli_real_escape_string($con,$_POST['expensename']);

    
    if(empty($ExpnsGroupID) || empty($ExpnsTypeName)){
        header("Location: ../Expenses/AddExpensesTypes.php?error=emptyFields");
        exit();
    }

    $sql = "SELECT ExpTName FROM expensetype WHERE ExpTName='$ExpnsTypeName'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: ../Expenses/AddExpensesTypes.php?error=nametaken");
        exit();
    }

    $query = "INSERT INTO expensetype(ExpGID,ExpTName) VALUES('$ExpnsGroupID','$ExpnsTypeName')";
    mysqli_query($con,$query);

        header("Location: ../Expenses/AddExpensesTypes.php?Register=Success");
        exit();
    
}
