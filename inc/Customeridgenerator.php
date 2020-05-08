<?php
include 'dbconnect.php';

$query = "SELECT * FROM customer ORDER BY CusID DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['CusID'];

if ($lastid == '') {
    $cutomerid = "CUS1";
} else {
    $cutomerid = substr($lastid, 3);
    $cutomerid = intval($cutomerid);
    $cutomerid = "CUS" . ($cutomerid + 1);
}

?>