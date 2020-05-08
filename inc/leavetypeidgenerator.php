<?php
    include 'dbconnect.php';

    $query = "SELECT * FROM leavetype ORDER BY leaveTypeId DESC LIMIT 1";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['leaveTypeId'];

    if($lastid == ''){
        $leavetypid = "LVTYP1";
    }else{
        $leavetypid = substr($lastid,5);
        $leavetypid = intval($leavetypid);
        $leavetypid = "LVTYP" .($leavetypid + 1);
        
    }
