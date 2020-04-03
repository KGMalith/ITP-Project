<?php
   

    if(isset($_POST['addCustomer'])){

        require 'dbconnect.php';


        $name = mysqli_real_escape_string($con,$_POST['cname']);
        $mobile = mysqli_real_escape_string($con,$_POST['mnumber']);
        $land = mysqli_real_escape_string($con,$_POST['lnumber']);
        $mail = mysqli_real_escape_string($con,$_POST['email']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $city = mysqli_real_escape_string($con,$_POST['city']);
        $district = mysqli_real_escape_string($con,$_POST['District']);

        if(empty($name)||empty($mobile)||empty($address)||empty($city)||empty($district)){
            header("Location: ../Customer/AddCustomerDetails.php?error=emptyFields&name=".$name."&mobile=".$mobile."&address=".$address."&city=".$city."&district=".$district);
            exit();
        }

        else if(!preg_match("/^\d{10}+$/",$mobile)){
            header("Location: ../Customer/AddCustomerDetails.php?error=invalidmobile&name=".$name."&land=".$land."&email=".$mail."&address=".$address."&city=".$city."&district=".$district);
            exit();
        }
        /* else if(!preg_match("/^\d{10}+$/",$land)){
            header("Location: ../Customer/AddCustomerDetails.php?error=invalidland&name=".$name."&mobile=".$mobile."&address=".$address."&city=".$city."&district=".$district);
            exit(); */
        

        /* else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../Customer/AddCustomerDetails.php?error=invalidEmail&name=".$name."&mobile=".$mobile."&land=".$land."&address=".$address."&city=".$city."&district=".$district);
            exit();
        }  */
       
        $sql = "SELECT cName FROM customer WHERE cName=?";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../Customer/AddCustomerDetails.php?error=SQLError");
            exit(); 
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                header("Location: ../Customer/AddCustomerDetails.php?error=CustomerTaken&mobile=".$mobile."&land=".$land."&email=".$mail."&address=".$address."&city=".$city."&district=".$district);
            exit();
            }
            else{
                $sql = "INSERT INTO customer(cName,cMNumber,cLNumber,cEmail,cAddress,cCity,cDistrict) VALUES(?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../Customer/AddCustomerDetails.php?error=SQLError");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"sssssss",$name,$mobile,$land,$mail,$address,$city,$district);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Customer/AddCustomerDetails.php?Register=Success");
                    exit();
                }

            }

            

        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);


    }

    else{
        header("Location: ../Customer/AddCustomerDetails.php");
        exit(); 
    }

?>