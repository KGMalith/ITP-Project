<?php
include 'dbconnect.php';
if(isset($_GET['tid'])){
    $tid = mysqli_real_escape_string($con,$_GET['tid']);
    $date = date('d/m/Y');
   
    $sql2 = "SELECT OrderM_ID FROM transport WHERE t_Id='".$tid."'";
    $result = mysqli_query($con,$sql2);
    $row = mysqli_fetch_assoc($result);
    $omid = $row['OrderM_ID'];

    $sql = "UPDATE transport SET t_d_status ='1',dil_Date='".$date."' WHERE t_Id='".$tid."' ";
    mysqli_query($con, $sql);

    $sql3 = "UPDATE orderm SET t_d_status = '1' WHERE OrderM_ID = '".$omid."'";
    mysqli_query($con,$sql3);

    header("Location: ../Transport/TransportHandlingTable.php");
    exit();

}


?>