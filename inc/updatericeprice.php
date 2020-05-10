<?php
include 'dbconnect.php';
if(isset($_POST['updateprice'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $price5  = mysqli_real_escape_string($con, $_POST['pri5']);
    $price10 = mysqli_real_escape_string($con, $_POST['pri10']);
    $price25 = mysqli_real_escape_string($con, $_POST['pri25']);
    $descrip = mysqli_real_escape_string($con, $_POST['des']);
    $ricepid = mysqli_real_escape_string($con,$_POST['itemid']);

    if(!isset($_POST['check1'])){
        header("Location: ../Item/Stock/RicePriceDetails.php?error=checkbox&iteID=" . $ricepid . "&pri5=" . $price5 . "&pri10=" . $price10 . "&pri25=" . $price25 . "&des=" . $descrip. "&iname=". $itemid);
        exit();
    }
    if(empty($itemid)){
        header("Location: ../Item/Stock/RicePriceDetails.php?error=emptyitem&iteID=". $ricepid. "&pri5=". $price5. "&pri10=". $price10. "&pri25=". $price25. "&des=". $descrip . "&iname=" . $itemid);
        exit();
    }

    if(empty($price5) && empty($price10) && empty($price25)){
        header("Location: ../Item/Stock/RicePriceDetails.php?error=emptyprice&iteID=" . $ricepid . "&pri5=" . $price5 . "&pri10=" . $price10 . "&pri25=" . $price25 . "&des=" . $descrip . "&iname=" . $itemid);
        exit();
    }

    $sql = "SELECT item_ID FROM riceprice WHERE item_ID='" . $itemid . "' AND rpID != '". $ricepid."'";
    $result = mysqli_query($con,$sql);
    if($result){

        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0){
            header("Location: ../Item/Stock/RicePriceDetails.php?error=ItemTaken&iteID=" . $ricepid . "&pri5=" . $price5 . "&pri10=" . $price10 . "&pri25=" . $price25 . "&des=" . $descrip . "&iname=" . $itemid);
            exit(); 
        }else{
            $sql = "UPDATE riceprice SET item_ID='$itemid',price5kg='$price5',price10kg='$price10',price25kg='$price25',Descrip='$descrip' WHERE rpID='". $ricepid."'";
            mysqli_query($con,$sql);
            header("Location: ../Item/Stock/RicePriceTable.php?Update=Success");
            exit(); 
        }
    }else{
        header("Location: ../Item/Stock/RicePriceTable.php?error=SQLError");
        exit();
    }




}
