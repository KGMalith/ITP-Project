<?php
include 'dbconnect.php';
if(isset($_GET['oid'])){
    $id = mysqli_real_escape_string($con,$_GET['oid']);
    $query = "DELETE FROM orderm WHERE OrderM_ID = '".$id."'";
    $result = mysqli_query($con,$query);

    if($result){
        header("Location: ../Order/OrderTable.php?delete=Success");
        
    }else{
        header("Location: ../Order/OrderTable.php?error=SQLError");
    }
    
}
