<?php
    include 'dbconnect.php';

    if(isset($_POST['editleave'])){
        $leavename = mysqli_real_escape_string($con,$_POST['leavename']);
        $aetype = mysqli_real_escape_string($con, $_POST['emptype']);
        $nodays = mysqli_real_escape_string($con, $_POST['numdays']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $id = mysqli_real_escape_string($con, $_POST['leaveid']);

        if (empty($leavename) || empty($aetype) || empty($nodays)) {
            header("Location: ../Employee/Leave/LeaveTypeDetails.php?error=emptyFields");
            exit();
        }
        if ($emptype == 'select') {
            header("Location: ../Employee/Leave/LeaveTypeDetails.php?error=noetype&levname=" . $leavename . "&days=" . $nodays . "&desc=" . $description. "&leavid=". $id);
            exit();
        }

        $sql = "SELECT LeaveName FROM leavetype WHERE LeaveName = '.$leavename.' AND Lid !='". $id."'";
        $resultset = mysqli_query($con, $sql);
        if (mysqli_num_rows($resultset) > 0) {
            header("Location: ../Employee/Leave/LeaveTypeDetails.php?error=nametaken&type=" . $aetype . "&days=" . $nodays . "&desc=" . $description . "&leavid=" . $id);
            exit();
        } else {
            $query = "UPDATE leavetype SET LeaveName = '$leavename',EmpType ='$aetype',NoofDays = '$nodays',Description ='$description' WHERE Lid='.$id.'";
            mysqli_query($con, $query);

            header("Location: ../Employee/Leave/LeaveTypeTable.php?Update=Success");
            exit();
        }
        
    }

?>