<?php

    include 'dbconnect.php';

    if(isset($_GET['vendorid'])){
        
        $userId = $_GET['vendorid'];   
        $query = "DELETE FROM vendor WHERE vendorID = '".$userId."' ";
        $result = mysqli_query($con,$query);

        if($result){

                header("Location: ../Vendor/VendorTable.php?delete=Success");
        }else{
            header("Location: ../Vendor/VendorTable.php?error=SQLError");
        }

    }


?>