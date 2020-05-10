<?php

    include 'dbconnect.php';

    if(isset($_GET['itemid'])){
        
        $ItemId = $_GET['itemid'];   
        $query = "DELETE FROM items WHERE I_ID = '".$ItemId."' ";
        $result = mysqli_query($con,$query);

        if($result){

                header("Location: ../Item/ItemTable.php?delete=Success");
        }else{
            header("Location: ../Item/ItemTable.php?error=SQLError");
        }

    }


?>