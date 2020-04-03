<?php
include 'dbconnect.php';

$output='';
$sql = "SELECT vAddress FROM vendor WHERE vendorID='".$_POST['VendorID']."' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$output .= '<input id="Vendoraddress"  type="text" name="Vendoraddress" class="form-control" value="' . $row["vAddress"] . '" readonly/>';


echo $output;
