<?php
include 'dbconnect.php';

if(isset($_POST['addgroup'])){

    $ExpnsGroupName = mysqli_real_escape_string($con,$_POST['expensegroupname']);
    $Desc  = mysqli_real_escape_string($con,$_POST['description']);

    if(empty($ExpnsGroupName)){
        header("Location: ../Expenses/AddExpensesGroup.php?error=emptyFields");
        exit();
    }

    $sql = "SELECT ExpGName FROM expensegroup WHERE ExpGName='.$ExpnsGroupName.'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: ../Expenses/AddExpensesGroup.php?error=nametaken&desc=".$Desc);
        exit();
    }

    $query = "INSERT INTO expensegroup(ExpGName,Descrip) VALUES('$ExpnsGroupName','$Desc')";
    mysqli_query($con,$query);

        header("Location: ../Expenses/AddExpensesGroup.php?Register=Success");
        exit();
    
}


?>