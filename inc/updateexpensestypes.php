<?php
include 'dbconnect.php';

if(isset($_POST['updateexpensetype'])){

    $Typeid = mysqli_real_escape_string($con,$_POST['expensTid']);
    $Groupid = mysqli_real_escape_string($con, $_POST['expenseGroup']);
    $Typename = mysqli_real_escape_string($con, $_POST['expensename']);

    if(empty($Typeid)||empty($Groupid)||empty($Typename)){
        header("Location: ../ExpensesTypes.php?error=emptyFields&id=".$Typeid);
        exit();
    }

    $sql = "SELECT ExpTName FROM expensetype WHERE ExpTName='.$Typename.' AND ExpTID != '.$Typeid.'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../Expenses/ExpensesTypes.php?error=nametaken&id=".$Typeid);
        exit();
    }

    $query = "UPDATE expensetype SET ExpGID='$Groupid',ExpTName='$Typename' WHERE ExpTID='$Typeid'";
    mysqli_query($con,$query);

    header("Location: ../Expenses/ExpensesTypeTable.php?Update=Success");

}

?>