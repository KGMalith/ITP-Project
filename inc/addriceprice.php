<?php
include 'dbconnect.php';
if(isset($_POST['addricePrice'])){

    $itemid = mysqli_real_escape_string($con,$_POST['itemName']);
    $price5  = mysqli_real_escape_string($con, $_POST['pri5']);
    $price10 = mysqli_real_escape_string($con, $_POST['pri10']);
    $price25 = mysqli_real_escape_string($con, $_POST['pri25']);
    $descrip = mysqli_real_escape_string($con, $_POST['des']);

    if(!isset($_POST['check1'])){
        header("Location: ../Item/Stock/RicePriceAdd.php?error=checkbox");
        exit();
    }
    if(empty($itemid)){
        header("Location: ../Item/Stock/RicePriceAdd.php?error=emptyitem");
        exit();
    }

    if(empty($price5) && empty($price10) && empty($price25)){
        header("Location: ../Item/Stock/RicePriceAdd.php?error=emptyprice");
        exit();
    }

    $sql = "SELECT item_ID FROM riceprice WHERE item_ID='". $itemid."'";
    $result = mysqli_query($con,$sql);
    if($result){

        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0){
            header("Location: ../Item/Stock/RicePriceAdd.php?error=ItemTaken");
            exit(); 
        }else{
            $sql = "INSERT INTO riceprice(item_ID,price5kg,price10kg,price25kg,Descrip) VALUES('$itemid','$price5','$price10','$price25','$descrip')";
            mysqli_query($con,$sql);
            header("Location: ../Item/Stock/RicePriceAdd.php?Register=Success");
            exit(); 
        }
    }else{
        header("Location: ../Item/Stock/RicePriceAdd.php?error=SQLError");
        exit();
    }




}


?>