<?php
include 'dbconnect.php';
if(isset($_POST['addvtype'])){

    $VehicleTypeid = mysqli_real_escape_string($con,$_POST['vehiTypeID']);
    $VehicleTypeName = mysqli_real_escape_string($con, $_POST['VTypename']);

    if(empty($VehicleTypeName)){
        header("Location: ../Vehicle/AddVehicleType.php?error=emptyFields");
        exit();
    }
    $sql = "SELECT V_typeName FROM vehicletype WHERE V_typeName='".$VehicleTypeName."'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        header("Location: ../Vehicle/AddVehicleType.php?error=nametaken");
        exit();
    }
    else{
        $query = "INSERT INTO vehicletype(vehicleTId,V_typeName) VALUES('$VehicleTypeid','$VehicleTypeName')";
        mysqli_query($con,$query);

        header("Location: ../Vehicle/AddVehicleType.php?Register=Success");
        exit();
    }
}

?>