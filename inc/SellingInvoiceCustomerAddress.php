<?php
include 'dbconnect.php';

$output='';
$sql = "SELECT cAddress FROM customer WHERE customerID='".$_POST['CustomerID']."' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$output .= '<input id="Customeraddress"  type="text" name="Customeraddress" class="form-control" value="' . $row["cAddress"] . '" readonly/>';


echo $output;
