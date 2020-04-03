<?php
    include 'dbconnect.php';
    if(isset($_GET['vid'])){
        $ID = mysqli_real_escape_string($con,$_GET['vid']);
        $sql = "DELETE FROM vehicle WHERE VehicleID='".$ID."' ";
        $result = mysqli_query($con,$sql);
        if($result){
            header("Location: ../Vehicle/VehicleTable.php?delete=Success");
            exit();
        }else{
        header("Location: ../Vehicle/VehicleTable.php?error=SQLError");
        exit();
        }

    }



?>