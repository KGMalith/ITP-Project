<?php
include 'dbconnect.php';

if(isset($_POST['updategroup'])){

    $ID = mysqli_real_escape_string($con, $_POST['groupid']);
    $expgid = mysqli_real_escape_string($con,$_POST['expgrupid']);
    $GName = mysqli_real_escape_string($con, $_POST['expensegroupname']);
    $Description = mysqli_real_escape_string($con, $_POST['description']);

    if(empty($ID)||empty($GName)||empty($Description)){
        header("Location: ../Expenses/ExpensesGroup.php?error=emptyFields&id=".$ID."&gid=".$expgid);
        exit();
    }
    $sql = "SELECT ExpGName FROM expensegroup WHERE ExpGName='$GName' AND ExpGID != '$ID'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../Expenses/ExpensesGroup.php?error=nametaken&id=" . $ID . "&gid=" . $expgid. "&egroup=". $GName. "&desc=". $Description);
        exit();
    }

    $query = "UPDATE expensegroup SET ExpGName='$GName',Descrip='$Description' WHERE ExpGID='$ID'";
    mysqli_query($con, $query);

    header("Location: ../Expenses/ExpensesGroupTable.php?Update=Success");


}


?>