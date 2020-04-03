<?php

    include 'dbconnect.php';

    if(isset($_GET['itemid'])){
        
        $ItemId = $_GET['itemid'];   
        $query = "DELETE FROM item WHERE itemID = '".$ItemId."' ";
        $result = mysqli_query($con,$query);

        if($result){

                header("Location: ../Item/ItemTable.php?delete=Success");
        }else{
            header("Location: ../Item/ItemTable.php?error=SQLError");
        }

    }


?>