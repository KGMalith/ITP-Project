<?php
    include 'dbconnect.php';
    if(isset($_GET['eid']) && isset($_GET['days'])){
        $EMP_ID = mysqli_real_escape_string($con, $_GET['eid']);
        $Leave_ID = mysqli_real_escape_string($con,$_GET['leaveid']);
        $Days = mysqli_real_escape_string($con, $_GET['days']);

        if($Days < date('m/d/Y')){
            header("location: ../Employee/Leave/RemoveLeave.php?error=cannotdelete&empid=".$EMP_ID);
            exit();
        }

        $query = "DELETE FROM empleave WHERE LeaveID = '". $Leave_ID. "' AND empid ='". $EMP_ID."'";
        mysqli_query($con,$query);
        header("Location: ../Employee/Leave/RemoveLeave.php?delete=Success&empid=" . $EMP_ID);
        exit();

    }


?>