<?php
    include 'dbconnect.php';

    $query = "SELECT * FROM buyinginvoicelist ORDER BY BInvoiceID DESC LIMIT 1";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['BInvoiceID'];

    if($lastid == ''){
        $binvoiceid = "BINVOICE1";
    }else{
        $binvoiceid = substr($lastid,8);
        $binvoiceid = intval($binvoiceid);
        $binvoiceid = "BINVOICE" .($binvoiceid + 1);
        
    }
