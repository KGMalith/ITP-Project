<?php
include 'dbconnect.php';
if(isset($_GET['tid'])){

    $tid = mysqli_real_escape_string($con,$_GET['tid']);

    $sql = "SELECT t_d_status,OrderM_ID FROM transport WHERE t_Id='".$tid."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $tdsts = $row['t_d_status'];
    $omid = $row['OrderM_ID'];

    if($tdsts == 1){

        $sql = "DELETE FROM transport WHERE t_Id='" . $tid . "'";
        mysqli_query($con,$sql);
        header("Location: ../Transport/TransportHandlingTable.php?delete=Success");
        exit();
    }
    else
    {

        $sql = "UPDATE orderm SET t_status ='0' WHERE OrderM_ID='".$omid."'";
        mysqli_query($con,$sql);

        $sql2 = "DELETE FROM transport WHERE t_Id='" . $tid . "'";
        mysqli_query($con,$sql2);

        header("Location: ../Transport/TransportHandlingTable.php?delete=Success");
        exit();
    }

}

?>