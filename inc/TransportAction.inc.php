<?php
include 'dbconnect.php';
if(isset($_POST['takeaction'])){
    
    $omid = mysqli_real_escape_string($con,$_POST['ormid']);
    $vtypeid = mysqli_real_escape_string($con, $_POST['vtypeID']);
    $vid = mysqli_real_escape_string($con, $_POST['vehID']);
    $eid = mysqli_real_escape_string($con, $_POST['DriID']);
    $orderid = mysqli_real_escape_string($con,$_POST['orderid']);
    $orderdate = mysqli_real_escape_string($con,$_POST['orderdate']);
    $cusname = mysqli_real_escape_string($con,$_POST['cusname']);
    $cusid = mysqli_real_escape_string($con, $_POST['cusId']);
    $sts = '1';
    
    if(empty($vtypeid) || empty($vid) || empty($eid)){
        header("Location : ../Transport/TransportAction.php?error=emptyFields&orderid=". $orderid."&odate=". $orderdate."&custname=". $cusname."&custid=". $cusid);
        exit();
    }

    $sql = 'SELECT vehID FROM transport WHERE vehID=? AND t_status ="1"';
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../Transport/TransportAction.php?error=SQLError&orderid=" . $orderid . "&odate=" . $orderdate . "&custname=" . $cusname . "&custid=" . $cusid);
        exit(); 
    }else{
        mysqli_stmt_bind_param($stmt, "s", $vid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if($resultCheck > 0){
            header("Location: ../Transport/TransportAction.php?error=vehicleTaken&orderid=" . $orderid . "&odate=" . $orderdate . "&custname=" . $cusname . "&custid=" . $cusid);
            exit();
        }
    }

    $sql = 'SELECT id FROM transport WHERE id=? AND t_status ="1"';
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../Transport/TransportAction.php?error=SQLError&orderid=" . $orderid . "&odate=" . $orderdate . "&custname=" . $cusname . "&custid=" . $cusid);
        exit(); 
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $eid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("Location: ../Transport/TransportAction.php?error=driverTaken&orderid=" . $orderid . "&odate=" . $orderdate . "&custname=" . $cusname . "&custid=" . $cusid);
            exit();
        }
    }

    $sql = "INSERT INTO transport(OrderM_ID,vtypeID,vehID,id,t_status) VALUES(?,?,?,?,?)";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../Transport/TransportAction.php?error=SQLError&orderid=" . $orderid . "&odate=" . $orderdate . "&custname=" . $cusname . "&custid=" . $cusid);
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "sssss", $omid, $vtypeid, $vid, $eid, $sts);
        mysqli_stmt_execute($stmt);

        $sql = "UPDATE orderm SET t_status = '$sts' WHERE OrderM_ID='$omid'";
        mysqli_query($con,$sql);

        header("Location: ../Transport/TransportActionTable.php?Register=Success");
        exit();
    }

}

?>