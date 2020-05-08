<?php

    if(isset($_POST['addItem'])){
        
        require 'dbconnect.php';


        $name = mysqli_real_escape_string($con,$_POST['iname']);
        $quan5kg = mysqli_real_escape_string($con,$_POST['qun5']);
        $pri5kg = mysqli_real_escape_string($con,$_POST['pri5']);
        $quan10kg = mysqli_real_escape_string($con,$_POST['qun10']);
        $pri10kg = mysqli_real_escape_string($con,$_POST['pri10']);
        $quan25kg = mysqli_real_escape_string($con,$_POST['qun25']);
        $pri25kg = mysqli_real_escape_string($con,$_POST['pri25']);
        $descrip = mysqli_real_escape_string($con,$_POST['des']);
        $item_ID = mysqli_real_escape_string($con,$_POST['itemid']);

        if(!isset($_POST['check1']) && !isset($_POST['check2']) && !isset($_POST['check3']))
        {
            header("Location: ../Item/ItemDetails.php?error=checkbox&name=".$name."&qun5=".$quan5kg. "&pri5=". $pri5kg . "&qun10=" . $quan10kg . "&pri10=" . $pri10kg . "&qun25=" . $quan25kg . "&pri25=" . $pri25kg . "&des=" . $descrip . "&iteID=" . $item_ID);
            exit();
        }


        $sql = "SELECT iName FROM item WHERE iName='.$name.' AND itemID != '".$item_ID."'";
        $result = mysqli_query($con,$sql);

        if($result){
            if(mysqli_num_rows($result) > 0){
            header("Location: ../Item/ItemDetails.php?error=ItemTaken&qun5=" . $quan5kg . "&pri5=" . $pri5kg . "&qun10=" . $quan10kg . "&pri10=" . $pri10kg . "&qun25=" . $quan25kg . "&pri25=" . $pri25kg . "&des=" . $descrip . "&iteID=" . $item_ID);
            exit();
            }else{
                $sql = "UPDATE item SET iName='$name',5KGQuantity='$quan5kg',5KGPrice='$pri5kg',10KGQuantity='$quan10kg',10KGPrice='$pri10kg',25KGQuantity='$quan25kg',25KGPrice='$pri25kg',description='$descrip' WHERE itemID='".$item_ID."'";
                $result = mysqli_query($con,$sql);

                if($result){
                header("Location: ../Item/ItemTable.php?Update=Success");
                exit();
                }else{
                header("Location: ../Item/ItemDetails.php?error=SQLError");
                exit();
                }

             

            }

        }else{
        header("Location: ../Item/ItemDetails.php?error=SQLError");
        exit(); 
        }


    }


    else{
        header("Location: ../Item/Item.php");
        exit(); 
    }

?>