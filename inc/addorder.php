<?php
if(isset($_POST['addorder'])){

    require 'dbconnect.php';

    $orderid = mysqli_real_escape_string($con,$_POST['orderid']);
    $orderdate = mysqli_real_escape_string($con, $_POST['orderdate']);
    $diliverydate = mysqli_real_escape_string($con, $_POST['diliverydate']);
    $customerid = mysqli_real_escape_string($con, $_POST['cusId']);
    $status = mysqli_real_escape_string($con,$_POST['check1']);

    if(empty($customerid) || empty($status) ||empty($orderid) ||empty($orderdate)){
        header("Location: ../Order/AddOrder.php?error=emptyFields");
        exit();
    }

    if($status == 'Yes' && empty($diliverydate)){
        header("Location: ../Order/AddOrder.php?error=ddaterequire");
        exit();
    }

    if ($status == 'Yes' && $orderdate > $diliverydate) {
        header("Location: ../Order/AddOrder.php?error=ddatemissmatch");
        exit();
    }


   
        $sql = "INSERT INTO orderm(Order_ID,customerID,Order_Date,Order_D_Date,D_Status) VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Order/AddOrder.php?error=SQLError");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $orderid, $customerid, $orderdate, $diliverydate, $status);
            mysqli_stmt_execute($stmt);
            header("Location: ../Order/AddOrder.php?Register=Success");
            exit();
        }
  

}

?>