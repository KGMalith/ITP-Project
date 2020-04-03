<?php
    include 'dbconnect.php';

    if(isset($_POST['applyleave'])){

        $LvID = mysqli_real_escape_string($con,$_POST['leavetype']);
        $Days = mysqli_real_escape_string($con, $_POST['numdays']);
        $Descrp = mysqli_real_escape_string($con, $_POST['reason']);
        $Emp_ID = mysqli_real_escape_string($con, $_POST['employeeid']);
        $leavedate = mysqli_real_escape_string($con, $_POST['date']);

        if(empty($LvID) || empty($Days) || empty($Emp_ID) || empty($leavedate)){
            header("Location: ../Employee/Leave/ApplyLeave.php?error=emptyFields");
            exit();
        }

        $query = "INSERT INTO empleave (empid,Lid,DaysTaken,days,Reason) VALUES('$Emp_ID','$LvID','$Days','$leavedate','$Descrp')";
        mysqli_query($con,$query);

        header("Location: ../Employee/Leave/ApplyLeave.php?Register=Success");
        exit();        

    }



?>