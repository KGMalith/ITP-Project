<?php
    include 'dbconnect.php';
    if(isset($_POST['addleave'])){
        $leavetyid = mysqli_real_escape_string($con,$_POST['leavtypID']);
        $lname = mysqli_real_escape_string($con,$_POST['leavename']);
        $emptype = mysqli_real_escape_string($con, $_POST['emptype']);
        $noofdays = mysqli_real_escape_string($con, $_POST['numdays']);
        $description = mysqli_real_escape_string($con, $_POST['description']);

        if(empty($lname) || empty($emptype) ||empty($noofdays)){
            header("Location: ../Employee/Leave/AddLeaveType.php?error=emptyFields");
            exit();
        }
        if($emptype == 'select'){
            header("Location: ../Employee/Leave/AddLeaveType.php?error=noetype&levname=".$lname."&days=".$noofdays."&desc=".$description);
            exit();
        }

        $sql = "SELECT LeaveName FROM leavetype WHERE LeaveName = '".$lname. "' AND EmpType ='". $emptype."'";
        $resultset = mysqli_query($con,$sql);
        if(mysqli_num_rows($resultset) > 0){
            header("Location: ../Employee/Leave/AddLeaveType.php?error=nametaken&type=".$emptype."&days=".$noofdays."&desc=".$description);
            exit();
        }else{
            $query = "INSERT INTO leavetype(leaveTypeId,LeaveName,EmpType,NoofDays,Description) VALUES ('$leavetyid','$lname','$emptype','$noofdays','$description')";
            mysqli_query($con,$query);

            header("Location: ../Employee/Leave/AddLeaveType.php?Register=Success");
            exit();
        }
        
    }

?>