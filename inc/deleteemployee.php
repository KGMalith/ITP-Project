<?php
include 'dbconnect.php';
if (isset($_GET['eid'])) {

    $empId = $_GET['eid'];
    $query = "DELETE FROM employee WHERE id = '" . $empId . "' ";
    $result = mysqli_query($con, $query);

    if ($result) {

        header("Location: ../Employee/EmployeeTable.php?delete=Success");
    } else {
        header("Location: ../Employee/EmployeeTable.php?error=SQLError");
    }
}

?>