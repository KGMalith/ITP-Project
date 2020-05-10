<?php
include 'dbconnect.php';
if(isset($_GET['id'])){

    $sinvid = $_GET['id'];

    $sql = "DELETE FROM sellinginvoiceitem WHERE sinlistTableid='". $sinvid."'";
    $result = mysqli_query($con,$sql);

    if($result){
        $sql = "DELETE FROM sellinginvoicelist WHERE id='". $sinvid."'";
        $reslt = mysqli_query($con,$sql);
        if($reslt){
            header("Location: ../Billing/SellingInvoiceList.php?delete=Success");
            exit();
        }else{
            header("Location: ../Billing/SellingInvoiceList.php?error=SQLError");
            exit(); 
        }

    }else{
        header("Location: ../Billing/SellingInvoiceList.php?error=SQLError");
        exit();
    }



}
