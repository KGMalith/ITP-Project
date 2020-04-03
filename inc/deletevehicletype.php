<?php
    include 'dbconnect.php';

    if(isset($_GET['VTid'])){
    
        $id = mysqli_real_escape_string($con,$_GET['VTid']);
        $query = "DELETE FROM vehicletype WHERE V_typeId='".$id."'";
        $result = mysqli_query($con,$query);
        if($result){
            header("Location: ../Vehicle/VehicleTypeTable.php?delete=Success");
            exit();
        }else{
            header("Location: ../Vehicle/VehicleTypeTable.php?error=SQLError");
            exit(); 
        }
    
    }
   

?>