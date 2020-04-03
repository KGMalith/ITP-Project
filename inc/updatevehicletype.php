<?php
include 'dbconnect.php';
if(isset($_POST['updatevtype'])){

    $VehicleTypeName = mysqli_real_escape_string($con,$_POST['VTypename']);
    $Description = mysqli_real_escape_string($con, $_POST['description']);
    $VTid = mysqli_real_escape_string($con,$_POST['id']);

    if(empty($VehicleTypeName)){
        header("Location: ../Vehicle/AddVehicleType.php?error=emptyFields&desc=".$Description. "&vtid=".$VTid);
        exit();
    }
    $sql = "SELECT V_typeName FROM vehicletype WHERE V_typeName = '".$VehicleTypeName. "' AND V_typeId!='".$VTid."' ";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        header("Location: ../Vehicle/AddVehicleType.php?error=nametaken&desc=" . $Description . "&vtid=" . $VTid);
        exit();
    }
    else{
        $query = "UPDATE vehicletype SET V_typeName='".$VehicleTypeName."', V_typeDesc='".$Description. "' WHERE V_typeId='".$VTid."'";
        mysqli_query($con,$query);

        header("Location: ../Vehicle/VehicleTypeTable.php?Update=Success");
        exit();
    }
}
