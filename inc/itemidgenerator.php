<?php
include 'dbconnect.php';

$query = "SELECT * FROM items ORDER BY itemID DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['itemID'];

if ($lastid == '') {
    $itemid = "ITEM1";
} else {
    $itemid = substr($lastid, 4);
    $itemid = intval($itemid);
    $itemid = "ITEM" . ($itemid + 1);
}
