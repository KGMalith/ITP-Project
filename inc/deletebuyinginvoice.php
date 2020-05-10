<?php
include 'dbconnect.php';
if(isset($_GET['id'])){

    $binvid = $_GET['id'];

    $sql = "DELETE FROM buyinginvoiceitem WHERE inlistTableId='". $binvid."'";
    $result = mysqli_query($con,$sql);

    if($result){
        $sql = "DELETE FROM buyinginvoicelist WHERE id='". $binvid."'";
        $reslt = mysqli_query($con,$sql);
        if($reslt){
            header("Location: ../Billing/BuyingInvoiceList.php?delete=Success");
            exit();
        }else{
            header("Location: ../Billing/BuyingInvoiceList.php?error=SQLError");
            exit(); 
        }

    }else{
        header("Location: ../Billing/BuyingInvoiceList.php?error=SQLError");
        exit();
    }



}


?>