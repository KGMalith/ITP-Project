<?php
   

    if(isset($_POST['addvendor'])){

        require 'dbconnect.php';

        $vendrID = mysqli_real_escape_string($con,$_POST['venID']);
        $name = mysqli_real_escape_string($con,$_POST['vname']);
        $mobile = mysqli_real_escape_string($con,$_POST['mnumber']);
        $land = mysqli_real_escape_string($con,$_POST['lnumber']);
        $mail = mysqli_real_escape_string($con,$_POST['email']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $city = mysqli_real_escape_string($con,$_POST['city']);
        $district = mysqli_real_escape_string($con,$_POST['District']);
        $vendor_id = mysqli_real_escape_string($con,$_POST['vendorid']);

        if(empty($name)||empty($mobile)||empty($address)||empty($city)||empty($district)){
            header("Location: ../Vendor/VendorDetails.php?error=emptyFields&VendorID=". $vendrID."&name=".$name."&mobile=".$mobile."&address=".$address."&city=".$city."&district=".$district."&venid=".$vendor_id);
            exit();
        }

        else if(!preg_match("/^\d{10}+$/",$mobile)){
            header("Location: ../Vendor/VendorDetails.php?error=invalidmobile&VendorID=" . $vendrID . "&name=".$name."&land=".$land."&email=".$mail."&address=".$address."&city=".$city."&district=".$district."&venid=".$vendor_id);
            exit();
        }
        /* else if(!preg_match("/^\d{10}+$/",$land)){
            header("Location: ../Vendor/VendorDetails.php?error=invalidland&name=".$name."&mobile=".$mobile."&address=".$address."&city=".$city."&district=".$district);
            exit(); */
        

        /* else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../Vendor/VendorDetails.php?error=invalidEmail&name=".$name."&mobile=".$mobile."&land=".$land."&address=".$address."&city=".$city."&district=".$district);
            exit();
        }  */
       
        $sql = "SELECT vName FROM vendor WHERE vName=? AND vendorID != {$vendor_id}";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../Vendor/VendorDetails.php?error=SQLError");
            exit(); 
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                header("Location: ../Vendor/VendorDetails.php?error=VendorTaken&VendorID=" . $vendrID . "&name=".$name."&mobile=".$mobile."&land=".$land."&email=".$mail."&address=".$address."&city=".$city."&district=".$district."&venid=".$vendor_id);
            exit();
            }
            else{
                $sql = "UPDATE vendor SET VenID=?,vName= ?,vMNumber=?,vLNumber=?,vEmail=?,vAddress=?,vCity=?,vDistrict=? WHERE vendorID= {$vendor_id} ";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../Vendor/VendorDetails.php?error=SQLError");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"ssssssss",$vendrID,$name,$mobile,$land,$mail,$address,$city,$district);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Vendor/VendorTable.php?Update=Success");
                    exit();
                }

            }

            

        }

        mysqli_stmt_close($stmt);
        mysqli_close($con);


    }

    else{
        header("Location: ../Vendor/VendorTable.php");
        exit(); 
    }

?>