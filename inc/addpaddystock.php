<?php
include 'dbconnect.php';
if(isset($_POST['addpaddystock'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $initializedDate = mysqli_real_escape_string($con, $_POST['initdate']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $description = mysqli_real_escape_string($con, $_POST['des']);

    if(empty($itemid)){
        header("Location: ../Item/Stock/addPaddyStock.php?error=emptyitem");
        exit();
    }

    if(empty($quantity)){
        header("Location: ../Item/Stock/addPaddyStock.php?error=emptyquan");
        exit();
    }

    $sql = "SELECT itemID FROM paddystock WHERE itemID='". $itemid."'";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        header("Location: ../Item/Stock/addPaddyStock.php?error=ItemTaken");
        exit();
    }

    $sql = "INSERT INTO paddystock(itemID,initDate,quantity,Descrp) VALUES('$itemid','$initializedDate','$quantity','$description')";
    $result = mysqli_query($con,$sql);

    if($result){
        header("Location: ../Item/Stock/addPaddyStock.php?Register=Success");
        exit();
    }else{
        header("Location: ../Item/Stock/addPaddyStock.php?error=SQLError");
        exit();
    }

}

?>