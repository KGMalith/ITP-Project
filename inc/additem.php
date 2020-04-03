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


        if(!isset($_POST['check1']) && !isset($_POST['check2']) && !isset($_POST['check3']))
        {
            header("Location: ../Item/AddItem.php?error=checkbox&name=".$name."&des=".$descrip);
            exit();
        }


        $sql = "SELECT iName FROM item WHERE iName=?";
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
                header("Location: ../Item/AddItem.php?error=ItemTaken&qun5=".$quan5kg."&pri5=".$pri5kg."&qun10=".$quan10kg."&pri10=".$pri10kg."&qun25=".$quan25kg."&pri25=".$pri25kg."&des=".$descrip);
            exit();
            }
            else{
                $sql = "INSERT INTO item(iName,5KGQuantity,5KGPrice,10KGQuantity,10KGPrice,25KGQuantity,25KGPrice,description) VALUES(?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../Item/AddItem.php?error=SQLError");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"ssssssss",$name,$quan5kg,$pri5kg,$quan10kg,$pri10kg,$quan25kg,$pri25kg,$descrip);
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