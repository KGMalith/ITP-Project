<?php

    if(isset($_POST['addItem'])){
        
        require 'dbconnect.php';


        $name = mysqli_real_escape_string($con,$_POST['iname']);
        $generatedid = mysqli_real_escape_string($con,$_POST['itemidgen']);
        $item_ID = mysqli_real_escape_string($con,$_POST['itemid']);

    

        $sql = "SELECT itemName FROM items WHERE itemName='".$name."' AND I_ID != '".$item_ID."'";
        $result = mysqli_query($con,$sql);

        if($result){
            if(mysqli_num_rows($result) > 0){
            header("Location: ../Item/ItemDetails.php?error=ItemTaken&name=". $name. "&itemid=" . $generatedid. "&iteID=". $item_ID);
            exit();
            }else{
                $sql = "UPDATE items SET itemName='$name' WHERE I_ID='".$item_ID."'";
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