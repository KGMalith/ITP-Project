<?php
   

    if(isset($_POST['addCustomer'])){

        require 'dbconnect.php';

        $cusID = mysqli_real_escape_string($con,$_POST['customer_ID']);
        $name = mysqli_real_escape_string($con,$_POST['cname']);
        $mobile = mysqli_real_escape_string($con,$_POST['mnumber']);
        $land = mysqli_real_escape_string($con,$_POST['lnumber']);
        $mail = mysqli_real_escape_string($con,$_POST['email']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $city = mysqli_real_escape_string($con,$_POST['city']);
        $district = mysqli_real_escape_string($con,$_POST['District']);
        $customer_id = mysqli_real_escape_string($con,$_POST['customerid']);

        if(empty($name)||empty($mobile)||empty($address)||empty($city)||empty($district)){
            header("Location: ../Customer/CustomerDetails.php?error=emptyFields&custID=". $cusID."&name=".$name."&mobile=".$mobile."&address=".$address."&city=".$city."&district=".$district."&cusid=".$customer_id);
            exit();
        }

        else if(!preg_match("/^\d{10}+$/",$mobile)){
            header("Location: ../Customer/CustomerDetails.php?error=invalidmobile&custID=" . $cusID . "&name=".$name."&land=".$land."&email=".$mail."&address=".$address."&city=".$city."&district=".$district."&cusid=".$customer_id);
            exit();
        }
        /* else if(!preg_match("/^\d{10}+$/",$land)){
            header("Location: ../Customer/CustomerDetails.php?error=invalidland&name=".$name."&mobile=".$mobile."&address=".$address."&city=".$city."&district=".$district);
            exit(); */
        

        /* else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../Customer/CustomerDetails.php?error=invalidEmail&name=".$name."&mobile=".$mobile."&land=".$land."&address=".$address."&city=".$city."&district=".$district);
            exit();
        }  */
       
        $sql = "SELECT cName FROM customer WHERE cName=? AND customerID !={$customer_id}";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../Customer/CustomerDetails.php?error=SQLError");
            exit(); 
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                header("Location: ../Customer/CustomerDetails.php?error=CustomerTaken&custID=" . $cusID . "&name=".$name."&mobile=".$mobile."&land=".$land."&email=".$mail."&address=".$address."&city=".$city."&district=".$district."&cusid=".$customer_id);
            exit();
            }
            else{
                $sql = "UPDATE customer SET CusID=?, cName= ?,cMNumber=?,cLNumber=?,cEmail=?,cAddress=?,cCity=?,cDistrict=? WHERE customerID= {$customer_id} ";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../Customer/CustomerDetails.php?error=SQLError");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"ssssssss",$cusID,$name,$mobile,$land,$mail,$address,$city,$district);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Customer/CustomerTable.php?Update=Success");
                    exit();
                }

            }

            

        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);


    }

    else{
        header("Location: ../Customer/CustomerTable.php");
        exit(); 
    }

?>