<?php
include 'dbconnect.php';

$output='';
$sql = "SELECT * FROM expensetype WHERE ExpGID='".$_POST['GroupID']."' ";
$result = mysqli_query($con,$sql);
$output .='<option value="" disabled selected>Select Expense Type</option>'; 

while($row = mysqli_fetch_assoc($result)){
    $output .='<option value="'.$row["ExpTID"].'">'.$row["ExpTName"].'</option> ';
}

echo $output; 
?>
