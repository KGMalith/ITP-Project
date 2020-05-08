<?php
    include 'dbconnect.php';

    if(isset($_POST['updatevehicle'])){
        $vehicleid = mysqli_real_escape_string($con,$_POST['vehiID']);
        $vehi_ID = mysqli_real_escape_string($con,$_POST['Vehicleid']);
        $RegNO = mysqli_real_escape_string($con, $_POST['registerno']);
        $cassyNO = mysqli_real_escape_string($con, $_POST['chasisno']);
        $ModelNO = mysqli_real_escape_string($con, $_POST['modelno']);
        $EnginNO = mysqli_real_escape_string($con, $_POST['engineno']);
        $Type = mysqli_real_escape_string($con, $_POST['vehicletype']);
        $D_Name = mysqli_real_escape_string($con, $_POST['DriverName']);
        $Ve_Owner = mysqli_real_escape_string($con, $_POST['vehicleowner']);
        $Sts = mysqli_real_escape_string($con, $_POST['vehiclestatus']);


     if (empty($RegNO) || empty($ModelNO) || empty($cassyNO) || empty($EnginNO) || empty($Type) || empty($D_Name) || empty($Ve_Owner) || empty($Sts)) {
        header("Location: ../Vehicle/VehicleDetails.php?error=emptyFields&vehiid=". $vehicleid."&Vid=". $vehi_ID);
        exit();
    } 

    if ($Type == 'Select') {
        header("Location: ../Vehicle/VehicleDetails.php?error=emptyVType&vehiid=". $vehicleid."&regno=" . $RegNO . "&modelNo=" . $ModelNO . "&casyNo=" . $cassyNO . "&EngineNo=" . $EnginNO . "&owner=" . $Ve_Owner . "&stats=" . $Sts. "&Vid=".$vehi_ID);
        exit();
    } elseif ($D_Name == 'Select') {
        header("Location: ../Vehicle/VehicleDetails.php?error=emptydriver&vehiid=". $vehicleid."&regno=" . $RegNO . "&modelNo=" . $ModelNO . "&casyNo=" . $cassyNO . "&EngineNo=" . $EnginNO . "&owner=" . $Ve_Owner . "&stats=" . $Sts . "&Vid=" . $vehi_ID);
        exit();
    } elseif ($Ve_Owner == 'Select') {
        header("Location: ../Vehicle/VehicleDetails.php?error=emptyowner&vehiid=". $vehicleid."&regno=" . $RegNO . "&modelNo=" . $ModelNO . "&casyNo=" . $cassyNO . "&EngineNo=" . $EnginNO . "&stats=" . $Sts . "&Vid=" . $vehi_ID);
        exit();
    } elseif ($Sts == 'Select') {
        header("Location: ../Vehicle/VehicleDetails.php?error=emptystatus&vehiid=". $vehicleid."&regno=" . $RegNO . "&modelNo=" . $ModelNO . "&casyNo=" . $cassyNO . "&EngineNo=" . $EnginNO . "&owner=" . $Ve_Owner . "&Vid=" . $vehi_ID);
        exit();
    }

    $query = "SELECT VRegistrationNo FROM vehicle WHERE VRegistrationNo='" . $RegNO . "' AND VehicleID != '".$vehi_ID."'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) > 0) {
        header("Location: ../Vehicle/VehicleDetails.php?error=registernotaken&vehiid=". $vehicleid."&modelNo=" . $ModelNO . "&casyNo=" . $cassyNO . "&EngineNo=" . $EnginNO . "&owner=" . $Ve_Owner . "&stats=" . $Sts . "&Vid=" . $vehi_ID."&regno=" . $RegNO);
        exit();
    }

    $query = "SELECT ChassisNo FROM vehicle WHERE ChassisNo='" . $cassyNO . "' AND VehicleID != '".$vehi_ID."'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) > 0) {
        header("Location: ../Vehicle/VehicleDetails.php?error=chassynotaken&vehiid=". $vehicleid."&modelNo=" . $ModelNO . "&EngineNo=" . $EnginNO . "&owner=" . $Ve_Owner . "&stats=" . $Sts . "&Vid=" . $vehi_ID . "&casyNo=" . $cassyNO);
        exit();
    }


    $sql= "UPDATE vehicle SET VehID ='$vehicleid',VRegistrationNo='$RegNO',ModelNo='$ModelNO',ChassisNo='$cassyNO',EngineNo='$EnginNO',V_typeId='$Type',id='$D_Name',VOwner='$Ve_Owner',Status='$Sts' WHERE VehicleID='$vehi_ID'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: ../Vehicle/VehicleTable.php?Update=Success");
        exit();
    } else {
        header("Location: ../Vehicle/VehicleTable.php?error=SQLError");
        exit();
    }







    }


?>