<?php
include 'dbconnect.php';

$query = "SELECT * FROM vehicletype ORDER BY vehicleTId DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['vehicleTId'];

if ($lastid == '') {
    $vehitypid = "VEHT1";
} else {
    $vehitypid = substr($lastid, 4);
    $vehitypid = intval($vehitypid);
    $vehitypid = "VEHT" . ($vehitypid + 1);
}
