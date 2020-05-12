<?php
include 'dbconnect.php';
if(isset($_POST['updatestock'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $date = mysqli_real_escape_string($con, $_POST['refilldate']);
    $stock5 = mysqli_real_escape_string($con, $_POST['quan5']);
    $stock10 = mysqli_real_escape_string($con, $_POST['quan10']);
    $stock25 = mysqli_real_escape_string($con, $_POST['quan25']);
    $riceSID = mysqli_real_escape_string($con,$_POST['ricestid']);

    if(empty($itemid)){
        header("Location: ../Item/Stock/addRiceStockDetails.php?error=emptyitem&iname=". $itemid. "&refilldate=". $date. "&quan5u=". $stock5. "&quan10u=". $stock10. "&quan25u=". $stock25. "&addS_ID=". $riceSID);
        exit();
    }

    if(empty($stock5) || empty($stock10) || empty($stock25)){
        header("Location: ../Item/Stock/addRiceStockDetails.php?error=emptystock&iname=" . $itemid . "&refilldate=" . $date . "&quan5u=" . $stock5 . "&quan10u=" . $stock10 . "&quan25u=" . $stock25 . "&addS_ID=" . $riceSID);
        exit();
    }

    $sql = "UPDATE ricestock SET itemID='$itemid',stockaddDate='$date',stock5kg='$stock5',stock10kg='$stock10',stock25kg='$stock25' WHERE rs_ID='". $riceSID."'";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: ../Item/Stock/addRiceStockTable.php?Update=Success");
        exit();
    }else{
        header("Location: ../Item/Stock/addRiceStockTable.php?error=SQLError");
        exit();
    }
}
