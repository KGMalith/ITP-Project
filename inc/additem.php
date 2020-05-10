<?php

    if(isset($_POST['addItem'])){
        
        require 'dbconnect.php';


        $name = mysqli_real_escape_string($con,$_POST['iname']);
        $idgenerated = mysqli_real_escape_string($con,$_POST['itemid']);
        


        $sql = "SELECT itemName FROM items WHERE itemName=?";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../Item/AddItem.php?error=SQLError");
            exit(); 
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                header("Location: ../Item/AddItem.php?error=ItemTaken&name=". $name);
            exit();
            }
            else{
                $sql = "INSERT INTO items(itemID,itemName) VALUES(?,?)";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../Item/AddItem.php?error=SQLError");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"ss", $idgenerated, $name);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Item/AddItem.php?Register=Success");
                    exit();
                }

            }
            
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);

    }


    else{
        header("Location: ../Item/AddItem.php");
        exit(); 
    }

?>