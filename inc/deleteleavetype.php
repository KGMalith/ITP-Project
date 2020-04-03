<?php
include 'dbconnect.php';
if(isset($_GET['Lid'])){
    $id = mysqli_real_escape_string($con,$_GET['Lid']);
    $query = "DELETE FROM leavetype WHERE Lid = '".$id."'";
    $result = mysqli_query($con,$query);

    if($result){
        header("Location: ../Employee/Leave/LeaveTypeTable.php?delete=Success");
        
    }else{
        header("Location: ../Employee/Leave/LeaveTypeTable.php?error=SQLError");
    }
    
}

?>