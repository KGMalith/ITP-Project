<?php

if(isset($_POST['signin'])){
    require 'dbconnect.php';

    $username = mysqli_real_escape_string($con,$_POST['uname']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
 
    if(empty($username)||empty($password)){
        header("Location: ../Login.php?error=emptyfields");
        exit(); 
    }
    else{
        $sql = "SELECT * FROM user WHERE uname=?";
        $stmt = mysqli_stmt_init($con);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../Login.php?error=SQLError");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,'s',$username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($password ,$row['password']);
                            if($pwdCheck == false){
                                header("Location: ../Login.php?error=WrongPassword&usname=".$username);
                                exit();
                            }
                            else if($pwdCheck == true){
                            
                                    session_start();
                                    $_SESSION['userid'] = $row['userid'];
                                    $_SESSION['username'] = $row['uname'];
                                    header("Location: ../Index.php");
                                    exit();      
                            }
                            else{
                                header("Location: ../Login.php?error=WrongPassword");
                                exit(); 
                            }

                    }
                    else{
                        header("Location: ../Login.php?error=NoUser");
                exit();
                    }

            }

    }

}
else{
    header("Location: ../Index.php");
    exit();
}

?>