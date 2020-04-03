<?php

    include 'dbconnect.php';

    if(isset($_GET['customerid'])){
        
        $userId = $_GET['customerid'];   
        $query = "DELETE FROM customer WHERE customerID = '".$userId."' ";
        $result = mysqli_query($con,$query);

        if($result){

                header("Location: ../Customer/CustomerTable.php?delete=Success");
        }else{
            header("Location: ../Customer/CustomerTable.php?error=SQLError");
        }

    }


?>