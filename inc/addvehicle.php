<?php
include 'dbconnect.php';

if(isset($_POST['addvehicle'])){

    $vehid = mysqli_real_escape_string($con,$_POST['vehiID']);
    $RegistrationNo = mysqli_real_escape_string($con,$_POST['registerno']);
    $ModelNO = mysqli_real_escape_string($con, $_POST['modelno']);
    $ChassisNo = mysqli_real_escape_string($con, $_POST['chasisno']);
    $EngineNo = mysqli_real_escape_string($con, $_POST['engineno']);
    $VehicleType = mysqli_real_escape_string($con, $_POST['vehicletype']);
    $Driver = mysqli_real_escape_string($con, $_POST['DriverName']);
    $Owner = mysqli_real_escape_string($con, $_POST['vehicleowner']);
    $Status = mysqli_real_escape_string($con, $_POST['vehiclestatus']);

    if(empty($RegistrationNo) ||empty($ModelNO) ||empty($ChassisNo) ||empty($EngineNo) ||empty($VehicleType) ||empty($Driver) ||empty($Owner) ||empty($Status)){
        header("Location: ../Vehicle/AddVehicle.php?error=emptyFields");
        exit();
    }

    if($VehicleType == 'Select'){
        header("Location: ../Vehicle/AddVehicle.php?error=emptyVType&regno=".$RegistrationNo."&modelNo=".$ModelNO."&casyNo=".$ChassisNo."&EngineNo=".$EngineNo."&owner=".$Owner."&stats=".$Status);
        exit();
    }
    elseif($Driver == 'Select'){
        header("Location: ../Vehicle/AddVehicle.php?error=emptydriver&regno=" . $RegistrationNo . "&modelNo=" . $ModelNO . "&casyNo=" . $ChassisNo . "&EngineNo=" . $EngineNo . "&owner=" . $Owner . "&stats=" . $Status);
        exit();
    }elseif($Owner == 'Select'){
        header("Location: ../Vehicle/AddVehicle.php?error=emptyowner&regno=" . $RegistrationNo . "&modelNo=" . $ModelNO . "&casyNo=" . $ChassisNo . "&EngineNo=" . $EngineNo . "&stats=" . $Status);
        exit();
    }
    elseif($Status=='Select'){
        header("Location: ../Vehicle/AddVehicle.php?error=emptystatus&regno=" . $RegistrationNo . "&modelNo=" . $ModelNO . "&casyNo=" . $ChassisNo . "&EngineNo=" . $EngineNo . "&owner=" . $Owner );
        exit();
    }
   
    $query = "SELECT VRegistrationNo FROM vehicle WHERE VRegistrationNo='".$RegistrationNo."'";
    $results = mysqli_query($con,$query);
    if(mysqli_num_rows($results) > 0){
        header("Location: ../Vehicle/AddVehicle.php?error=registernotaken&modelNo=" . $ModelNO . "&casyNo=" . $ChassisNo . "&EngineNo=" . $EngineNo . "&owner=" . $Owner. "&stats=".$Status);
        exit();
    }

    $query = "SELECT ChassisNo FROM vehicle WHERE ChassisNo='".$ChassisNo."'";
    $results = mysqli_query($con,$query);
    if(mysqli_num_rows($results) > 0){
        header("Location: ../Vehicle/AddVehicle.php?error=chassynotaken&regno=". $RegistrationNo."&modelNo=" . $ModelNO . "&EngineNo=" . $EngineNo . "&owner=" . $Owner . "&stats=" . $Status);
        exit();
    }

    $sql = "INSERT INTO vehicle (VehID,VRegistrationNo,ModelNo,ChassisNo,EngineNo,V_typeId,id,VOwner,Status) VALUES('$vehid','$RegistrationNo','$ModelNO','$ChassisNo','$EngineNo','$VehicleType','$Driver','$Owner','$Status')";
    $result = mysqli_query($con,$sql);

    if($result){
        header("Location: ../Vehicle/AddVehicle.php?Register=Success");
        exit();
    }else{
        header("Location: ../Vehicle/AddVehicle.php?error=SQLError");
        exit();
    }

}



?>