<?php

    include 'dbconnect.php';
    include 'empidgenerator.php';

if(isset($_POST['updateemployee'])){

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
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $states = mysqli_real_escape_string($con,$_POST['imagestatus']);


        if (empty($EmpID) || empty($EmpFullName) || empty($EmpName) || empty($Birthday) || empty($Gender) || empty($NICNum) || empty($MNumber) || empty($EmpAddress) || empty($JoinDate) || empty($EmpType) || empty($Designation)) {
            header("Location: ../Employee/EmployeeDetails.php?error=emptyFields");
            exit(); 

        }else{

        $sql = "SELECT fullname FROM employee WHERE fullname='$EmpFullName' AND id != '$id'";
        $result = mysqli_query($con,$sql);
        $rows= mysqli_num_rows($result);
        

            if ($rows > 0) {
                header("Location: ../Employee/EmployeeDetails.php?error=FnameTaken&id=" . $EmpID . "&fullname=" . $EmpFullName. "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation."&id=".$id."&empid=". $EmpID. "&statusimg=". $states . "&licence=" . $LicenseNum);
                exit();

            }elseif($Gender == 'select'){
                header("Location: ../Employee/EmployeeDetails.php?error=nogender&id=" . $EmpID ."&fullname=".$EmpFullName. "&name=" . $EmpName . "&birthday=" . $Birthday . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&id=" . $id . "&empid=" . $EmpID . "&statusimg=" . $states . "&licence=" . $LicenseNum );
                exit();
            }elseif($EmpType == 'select'){
                header("Location: ../Employee/EmployeeDetails.php?error=noetype&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&desig=" . $Designation . "&id=" . $id . "&empid=" . $EmpID . "&statusimg=" . $states . "&licence=" . $LicenseNum );
                exit();
            }elseif($Designation == 'select'){
                header("Location: ../Employee/EmployeeDetails.php?error=noedesig&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&id=" . $id . "&empid=" . $EmpID . "&statusimg=" . $states . "&licence=" . $LicenseNum );
                exit();
            } elseif ($Designation == 'Driver' && empty($LicenseNum)) {
            header("Location: ../Employee/AddEmployee.php?error=emptyLicen&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&statusimg=" . $states );
            exit();
            
            }else {

                if (!file_exists($_FILES['inpFile']['tmp_name']) || !is_uploaded_file($_FILES['inpFile']['tmp_name'])){
                    $stats = 0;
                $sql = "UPDATE employee SET fullname='$EmpFullName',name='$EmpName',dob='$Birthday',gender='$Gender',nicnum='$NICNum',mnumber='$MNumber',empaddress='$EmpAddress',jondate='$JoinDate',emptype='$EmpType',designation='$Designation',DrivingLicenNum='$LicenseNum',Imgstatus='$stats' WHERE id='$id'";
                    mysqli_query($con,$sql);
                   
                    header("Location: ../Employee/EmployeeTable.php?Update=Success");
                    exit();
                    
                    

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
                            if ($fileSize < 2097152) {
                                $fileNameNew  = "profile" . $EmpID . "." . $fileActualExt;
                                $fileDestination = '../Uploads/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);

                                $stats = 1;
                                $sql = "UPDATE employee SET fullname='$EmpFullName',name='$EmpName',dob='$Birthday',gender='$Gender',nicnum='$NICNum',mnumber='$MNumber',empaddress='$EmpAddress',jondate='$JoinDate',emptype='$EmpType',designation='$Designation',DrivingLicenNum='$LicenseNum',Imglocation ='$fileDestination' ,Imgstatus='$stats' WHERE id='$id'";
                                mysqli_query($con,$sql);
                               
                                header("Location: ../Employee/EmployeeTable.php?Update=Success");
                                exit();
                                
                                

                            } else {
                                header("Location: ../Employee/EmployeeDetails.php?error=filesize&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&id=" . $id . "&empid=" . $EmpID . "&statusimg=" . $states. "&licence=". $LicenseNum );
                                exit();
                            }
                        } else {
                            header("Location: ../Employee/EmployeeDetails.php?error=uploaderror&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&id=" . $id . "&empid=" . $EmpID . "&statusimg=" . $states. "&licence=". $LicenseNum );
                            exit();
                        }
                    } else {
                        header("Location: ../Employee/EmployeeDetails.php?error=formatnotallowed&id=" . $EmpID . "&fullname=" . $EmpFullName . "&name=" . $EmpName . "&birthday=" . $Birthday . "&gender=" . $Gender . "&nic=" . $NICNum . "&mnum=" . $MNumber . "&addres=" . $EmpAddress . "&jdate=" . $JoinDate . "&emptype=" . $EmpType . "&desig=" . $Designation . "&id=" . $id . "&empid=" . $EmpID . "&statusimg=" . $states. "&licence=". $LicenseNum );
                        exit();
                    }
                }
               
                                
            }

        
        
    }

       
  
        


    
}





?>