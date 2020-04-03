<?php 
    require 'dbconnect.php';

    if(isset($_POST['change'])){
        $pass = mysqli_real_escape_string($con,$_POST['pass_confirmation']);
        $re_pass = mysqli_real_escape_string($con,$_POST['pass']); 
        $id = $_GET['id'];

        $hashedpwd = password_hash($pass,PASSWORD_BCRYPT);

        $sql = "UPDATE user SET password = '".$hashedpwd ."' WHERE userid='".$id ."'";
        $result = mysqli_query($con,$sql);

            if($result){
                header("Location: ../index.php?update=success");
                exit();
            }
            else{
                header("Location: ../Change-password.php?error=SQLError");
                exit();
            }
                
           

    }
?>