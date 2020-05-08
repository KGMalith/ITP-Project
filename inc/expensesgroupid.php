<?php
include 'dbconnect.php';

$query = "SELECT * FROM expensegroup ORDER BY ExpGroupID DESC LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['ExpGroupID'];

if ($lastid == '') {
    $expgroupid = "EXPG1";
} else {
    $expgroupid = substr($lastid, 4);
    $expgroupid = intval($expgroupid);
    $expgroupid = "EXPG" . ($expgroupid + 1);
}



?>