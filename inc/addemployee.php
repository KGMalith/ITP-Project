<?php
    include 'dbconnect.php';
    include 'empidgenerator.php';

if(isset($_POST['addemployee'])){

        $EmpID = mysqli_real_escape_string($con, $_POST['empid']);
        $EmpFullName = mysqli_real_escape_string($con, $_POST['empfullname']);
        $EmpName = mysqli_real_escape_string($con, $_POST['empname']);
        $Birthday = mysqli_real_escape_string($con, $_POST['birthday']);
        $Gender = mysqli_real_escape_string($con, $_POST['gender']);
        $NICNum = mysqli_real_escape_string($con, $_POST['nicnum']);
        $MNumber = mysqli_real_escape_string($con, $_POST['mobilenum']);
        $EmpAddress = mysqli_real_escape_string($con, $_POST['empadd']);
        $JoinDate = mysqli_real_escape_string($con, $_POST['joindate']);
        $EmpType = mysqli_real_escape_string($con, $_POST['emptype']);
        $Designation = mysqli_real_escape_string($con, $_POST['designation']);
        $LicenseNum = mysqli_real_escape_string($con,$_POST['licencenum']);

        if (empty($EmpID) || empty($EmpFullName) || empty($EmpName) || empty($Birthday) || empty($Gender) || empty($NICNum) || empty($MNumber) || empty($EmpAddress) || empty($JoinDate) || empty($EmpType) || empty($Designation)) {
            header("Location: ../Employee/AddEmployee.php?error=emptyFields");
            exit(); 

        }else{

        $sql = "SELECT fullname FROM employee WHERE fullname=?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../Employee/AddEmployee.php?error=SQLError");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $EmpFullName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rows = mysqli_stmt_num_rows($stmt);

            if ($rows > 0) {
                header("Location: ../Employee/AddEmployee.php?error=FnameTaken&id=" . $EmpID . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation. "&licence=".$LicenseNum);
                exit();

            }elseif($Gender == 'select'){
                header("Location: ../Employee/AddEmployee.php?error=nogender&id=" . $EmpID ."&fullname=".$EmpFullName. "&name=" . $EmpName . "&birthday=" . $Birthday . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&licence=" . $LicenseNum);
                exit();
            }elseif($EmpType == 'select'){
                header("Location: ../Employee/AddEmployee.php?error=noetype&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&desig=" . $Designation . "&licence=" . $LicenseNum);
                exit();
            }elseif($Designation == 'select'){
                header("Location: ../Employee/AddEmployee.php?error=noedesig&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&licence=" . $LicenseNum);
                exit();
            }elseif($Designation == 'Driver' && empty($LicenseNum)){
                header("Location: ../Employee/AddEmployee.php?error=emptyLicen&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation);
                exit();
            
            } else if($Designation != 'Driver' && !empty($LicenseNum)){
                header("Location: ../Employee/AddEmployee.php?error=cannotenterLicen&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation);
                exit();
            }else {

                if (!file_exists($_FILES['inpFile']['tmp_name']) || !is_uploaded_file($_FILES['inpFile']['tmp_name'])){
                    $stats = 0;
                    $sql = "INSERT INTO employee(empid,fullname,name,dob,gender,nicnum,mnumber,empaddress,jondate,emptype,designation,DrivingLicenNum,Imgstatus) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../Employee/AddEmployee.php?error=SQLError");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "sssssssssssss", $EmpID, $EmpFullName, $EmpName, $Birthday, $Gender, $NICNum, $MNumber, $EmpAddress, $JoinDate, $EmpType, $Designation,$LicenseNum ,$stats);
                        mysqli_stmt_execute($stmt);

                        header("Location: ../Employee/AddEmployee.php?Register=Success");
                        exit();
                    }
                    

                }else{

                    $file = $_FILES['inpFile'];
                    $fileName = $_FILES['inpFile']['name'];
                    $fileTmpName = $_FILES['inpFile']['tmp_name'];
                    $fileSize = $_FILES['inpFile']['size'];
                    $fileError = $_FILES['inpFile']['error'];
                    $fileType = $_FILES['inpFile']['type'];

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 3145728) {
                                $fileNameNew  = "profile" . $empid . "." . $fileActualExt;
                                $fileDestination = '../Uploads/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);

                                $stats = 1;
                                $sql = "INSERT INTO employee(empid,fullname,name,dob,gender,nicnum,mnumber,empaddress,jondate,emptype,designation,DrivingLicenNum,Imglocation,Imgstatus) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                $stmt = mysqli_stmt_init($con);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: ../Employee/AddEmployee.php?error=SQLError");
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $EmpID, $EmpFullName, $EmpName, $Birthday, $Gender, $NICNum, $MNumber, $EmpAddress, $JoinDate, $EmpType, $Designation,$LicenseNum, $fileDestination, $stats);
                                    mysqli_stmt_execute($stmt);

                                    header("Location: ../Employee/AddEmployee.php?Register=Success");
                                    exit();
                                }
                                

                            } else {
                                header("Location: ../Employee/AddEmployee.php?error=filesize&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&licence=" . $LicenseNum);
                                exit();
                            }
                        } else {
                            header("Location: ../Employee/AddEmployee.php?error=uploaderror&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&licence=" . $LicenseNum);
                            exit();
                        }
                    } else {
                        header("Location: ../Employee/AddEmployee.php?error=formatnotallowed&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&licence=" . $LicenseNum);
                        exit();
                    }
                }
               
                                
            }

        }
        
    }

       
  
        


    
}



?>