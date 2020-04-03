<?php
include 'dbconnect.php';
if(isset($_POST['addvtype'])){

    $VehicleTypeName = mysqli_real_escape_string($con,$_POST['VTypename']);
    $Description = mysqli_real_escape_string($con, $_POST['description']);

    if(empty($VehicleTypeName)){
        header("Location: ../Vehicle/AddVehicleType.php?error=emptyFields&desc=".$Description);
        exit();
    }
    $sql = "SELECT V_typeName FROM vehicletype WHERE V_typeName='".$VehicleTypeName."'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        header("Location: ../Vehicle/AddVehicleType.php?error=nametaken&desc=" . $Description);
        exit();
    }
    else{
        $query = "INSERT INTO vehicletype(V_typeName,V_typeDesc) VALUES('$VehicleTypeName','$Description')";
        mysqli_query($con,$query);

        header("Location: ../Vehicle/AddVehicleType.php?Register=Success");
        exit();
    }
}

?>