<?php
include 'dbconnect.php';
if(isset($_POST['updateorder'])){

    $oMID = mysqli_real_escape_string($con,$_POST['odermid']);
    $oID = mysqli_real_escape_string($con, $_POST['orderid']);
    $orderdate = mysqli_real_escape_string($con, $_POST['orderdate']);
    $delidate = mysqli_real_escape_string($con, $_POST['diliverydate']);
    $cusId = mysqli_real_escape_string($con, $_POST['cusId']);
    $status = mysqli_real_escape_string($con, $_POST['check1']);


    if ($status == 'Yes' && empty($delidate)) {
        header("Location: ../order/OrdereDetails.php?error=ddaterequire&omid=". $oMID."&orid=". $oID."&ordate=".$orderdate."&delidate=". $delidate."&cumid=". $cusId."&sts=". $status);
        exit();
    }

    if ($status == 'Yes' && $orderdate > $delidate) {
        header("Location: ../order/OrdereDetails.php?error=ddatemissmatch&omid=" . $oMID . "&orid=" . $oID . "&ordate=" . $orderdate . "&delidate=" . $delidate . "&cumid=" . $cusId . "&sts=" . $status);
        exit();
    }

    $sql = "UPDATE orderm SET Order_ID=?,customerID=?,Order_Date=?,Order_D_Date=?,D_Status=? WHERE OrderM_ID=?";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../Order/OrderTable.php?error=SQLError");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $oID, $cusId, $orderdate, $delidate, $status, $oMID);
        mysqli_stmt_execute($stmt);
        header("Location: ../Order/OrderTable.php?Register=Success");
        exit();
    }

}

?>