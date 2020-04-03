<?php

    if(isset($_POST['Register'])){
        require 'dbconnect.php';

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['pass_confirmation']);
        $repassword = mysqli_real_escape_string($con,$_POST['pass']);
        
        if(empty($username)||empty($email)||empty($password)||empty($repassword)){
            header("Location: ../Register.php?error=emptyFields");
            exit();
        }

        else if(!preg_match("/^[a-zA-Z]*$/",$username)){
            header("Location: ../Register.php?error=invalidusername&mail=".$email);
            exit();
        }
        else if($password !== $repassword ){
            header("Location: ../Register.php?error=passwordcheck&uname=".$username."&mail=".$email);
            exit();
        }

        else {
            $sql = "SELECT uname FROM user WHERE uname=?";
            $stmt = mysqli_stmt_init($con);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../Register.php?error=SQLError");
                exit(); 
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                
                if($resultCheck > 0){
                    header("Location: ../Register.php?error=UserTaken&mail=".$email);
                exit();     
                }
                else{
                    $sql = "INSERT INTO user(uname,email,password) VALUES(?,?,?)";
                    $stmt = mysqli_stmt_init($con);

                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../Register.php?error=SQLError");
                        exit(); 
                    }
                    else{

                        $hashedpwd = password_hash($password,PASSWORD_BCRYPT);

                        mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../Register.php?Register=Success");
                        exit(); 
                    }

                }
                 
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }

    else{
        header("Location: ../Register.php");
        exit(); 
    }
?>