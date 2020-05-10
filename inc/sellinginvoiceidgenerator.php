<?php
include 'dbconnect.php';

$query = "SELECT * FROM sellinginvoicelist ORDER BY SInvoiveID DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['SInvoiveID'];

if ($lastid == '') {
    $sinvoiceid = "SINVOICE1";
} else {
    $sinvoiceid = substr($lastid, 8);
    $sinvoiceid = intval($sinvoiceid);
    $sinvoiceid = "SINVOICE" . ($sinvoiceid + 1);
}
