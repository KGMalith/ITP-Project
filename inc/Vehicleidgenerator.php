<?php
include 'dbconnect.php';

$query = "SELECT * FROM vehicle ORDER BY VehID DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['VehID'];

if ($lastid == '') {
    $vehiid = "VEH1";
} else {
    $vehiid = substr($lastid, 3);
    $vehiid = intval($vehiid);
    $vehiid = "VEH" . ($vehiid + 1);
}
