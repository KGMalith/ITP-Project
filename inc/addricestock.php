<?php
include 'dbconnect.php';
if(isset($_POST['addriceStock'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $date = mysqli_real_escape_string($con, $_POST['refilldate']);
    $stock5 = mysqli_real_escape_string($con, $_POST['quan5']);
    $stock10 = mysqli_real_escape_string($con, $_POST['quan10']);
    $stock25 = mysqli_real_escape_string($con, $_POST['quan25']);

    if(empty($itemid)){
        header("Location: ../Item/Stock/addRiceStock.php?error=emptyitem");
        exit();
    }

    if(empty($stock5) || empty($stock10) || empty($stock25)){
        header("Location: ../Item/Stock/addRiceStock.php?error=emptystock");
        exit();
    }

    $sql = "INSERT INTO  ricestock(itemID,stockaddDate,stock5kg,stock10kg,stock25kg) VALUES('$itemid','$date','$stock5','$stock10','$stock25')";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: ../Item/Stock/addRiceStock.php?Register=Success");
        exit();
    }else{
        header("Location: ../Item/Stock/addRiceStock.php?error=SQLError");
        exit();
    }
}

?>