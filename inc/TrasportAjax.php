<?php
    include 'dbconnect.php';

    if(isset($_POST['vtypeID']) && !empty($_POST['vtypeID'])){
        $query = $con ->query("SELECT * FROM vehicle WHERE V_typeId = ".$_POST['vtypeID']. " ORDER BY VRegistrationNo Asc");

        $rowCount = $query->num_rows;
        if($rowCount > 0){
            echo '<option value="" selected disabled>Select Vehicle</option>';
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['VehicleID'].'">'.$row['VRegistrationNo'].'</option>';
            }
        }else{
            echo '<option>Vehicle Not Available</option>';
        }

    }

    if(isset($_POST['VehicleID']) && !empty($_POST['VehicleID'])){
        $query = $con ->query("SELECT e.name,e.id FROM employee e,vehicle v WHERE e.id = v.id AND VehicleID=".$_POST['VehicleID']. " ORDER BY e.name Asc");

        $rowCount = $query->num_rows;

        if($rowCount > 0 ){
            echo '<option selected disabled>Select Driver</option>';
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option>Driver Not Available</option>';
        }

    }


?>