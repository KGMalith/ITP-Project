<?php

    include 'dbconnect.php';

    if(isset($_GET['itemid'])){
        
        $rpId = $_GET['itemid'];   
        $query = "DELETE FROM riceprice WHERE rpID = '". $rpId."' ";
        $result = mysqli_query($con,$query);

        if($result){

                header("Location: ../Item/Stock/RicePriceTable.php?delete=Success");
        }else{
            header("Location: ../Item/Stock/RicePriceTable.php?error=SQLError");
        }

    }
