<?php
include 'dbconnect.php';

$query = "SELECT * FROM vendor ORDER BY VenID DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['VenID'];

if ($lastid == '') {
    $vendorid = "VEN1";
} else {
    $vendorid = substr($lastid, 3);
    $vendorid = intval($vendorid);
    $vendorid = "VEN" . ($vendorid + 1);
}
