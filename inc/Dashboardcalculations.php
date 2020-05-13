<?php

function num_of_employees(){
    include 'dbconnect.php';
    $result='';

    $sql = "SELECT COUNT(e.empid) AS TotalEmlployees FROM employee e";
    $resultset = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['TotalEmlployees'];

    echo $result;
}

function num_of_new_orders(){
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT COUNT(o.OrderM_ID) AS NewOrders FROM orderm o WHERE o.invoice_created = 0";
    $resultset = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['NewOrders'];

    echo $result;

}

function num_of_transportAction(){
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT COUNT(o.OrderM_ID) AS TransportAction FROM orderm o WHERE o.D_Status='Yes' AND o.t_status='0' AND o.t_d_status='0'";
    $resultset = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['TransportAction'];

    echo $result;
}

function num_of_delivery_pending_orders(){
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT COUNT(t.t_Id) AS TransportDelivery FROM transport t WHERE t.t_d_status = 0";
    $resultset = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['TransportDelivery'];

    echo $result;
}

function total_num_of_customers(){
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT COUNT(c.customerID) AS NoOfCustomers FROM customer c";
    $resultset = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['NoOfCustomers'];

    echo $result;
}

function calculate_current_paddy_Item($itemid){
    include 'dbconnect.php';
    $result = 0;
    $result2 = 0;
    $result3 = 0;
    $total = 0;

    $sql = "SELECT b.itemName,b.itemQuantity FROM buyinginvoiceitem b,items i WHERE b.itemName = i.I_ID AND i.itemID = '$itemid'";
    $resultset = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($resultset)){
        $quantity = $row['itemQuantity'];
        $result = $result + $quantity;
    }

    $sql = "SELECT p.quantity FROM paddystock p,items i WHERE p.itemID= i.I_ID AND i.itemID = '$itemid'";
    $resultset = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($resultset);
    $result2 = $row['quantity'];

    $sql = "SELECT c.quantity FROM convertpaddy c,items i  WHERE c.itemID = i.I_ID AND i.itemID = '$itemid' ";
    $resultset = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($resultset)){
        $quantity2 = $row['quantity'];
        $result3 = $result3 + $quantity2;
    }
    
    

    $total = (($result + $result2) - $result3);

    return $total;
    
}

function paddy_Converting_item_quantity($item){

    include 'dbconnect.php';
    $result3 = 0;

    $sql = "SELECT c.quantity FROM convertpaddy c,items i  WHERE c.itemID = i.I_ID AND i.itemID = '$item' AND convertStatus='0'";
    $resultset = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($resultset)) {
        $quantity2 = $row['quantity'];
        $result3 = $result3 + $quantity2;
    }

    return $result3;
}

function paddy_Converting_process_precentage($result){

    $presentage = floatval(($result / 10000) * 100);

    return $presentage;
}

function paddy_process_stock(){

    $item1stk = paddy_Converting_item_quantity('ITEM1');
    $item2stk = paddy_Converting_item_quantity('ITEM2');
    $item3stk = paddy_Converting_item_quantity('ITEM3');

    $resultset = ($item1stk + $item2stk +  $item3stk);

    return $resultset;
}

function get_total_paddy_stock(){
    $result = 0;

    $item1 = calculate_current_paddy_Item('ITEM1');
    $item2 = calculate_current_paddy_Item('ITEM2');
    $item3 = calculate_current_paddy_Item('ITEM3');

    $result = ($item1 + $item2 + $item3);

    return $result;
}

function get_total_paddy_stock_precentage(){

    $totalpaddy = get_total_paddy_stock();
    $result = floatval(($totalpaddy / 10000) * 100);

    return $result;
}


function get_Item_name($itemid){
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT itemName FROM items WHERE itemID = '$itemid'";
    $resultset = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['itemName'];

    echo $result;
}

function get_Item_name_chart($itemid)
{
    include 'dbconnect.php';
    $result = '';
    $sql = "SELECT itemName FROM items WHERE itemID = '$itemid'";
    $resultset = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($resultset);
    $result = $row['itemName'];

    return $result;
}


function get_total_buyed_paddy($startdate,$enddate,$itemid){
    include 'dbconnect.php';
    $data = 0;
    $rest = 0;

    $sql = "SELECT i.itemName,l.orderDate,b.itemQuantity FROM buyinginvoicelist l, buyinginvoiceitem b, items i WHERE b.itemName = i.I_ID AND b.inlistTableId = l.id AND l.orderDate >= '" . $startdate . "' AND l.orderDate <= '" . $enddate . "' AND i.itemID='$itemid'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rest = $row['itemQuantity'];
        $data = $data + $rest;
    }

    return $data;
}

function get_total_sold_rice_dateRange($startdate, $enddate, $itemid)
{
    include 'dbconnect.php';
    $data = 0;
    $rest = 0;
    $data1 = 0;
    $rest1 = 0;
    $data2 = 0;
    $rest2 = 0;

    $sql = "SELECT i.itemName,s.itemQuan5kg,s.itemQuan10kg,s.itemQuan25kg FROM sellinginvoiceitem s, sellinginvoicelist l, items i WHERE s.sinlistTableid = l.id AND i.I_ID = s.itemName AND l.SellingInvDate >= '$startdate' AND l.SellingInvDate <= '$enddate' AND i.itemID='$itemid'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rest = $row['itemQuan5kg'];
        $data = $data + $rest;

        $rest1 = $row['itemQuan10kg'];
        $data1 = $data1 + $rest1;

        $rest2 = $row['itemQuan25kg'];
        $data2 = $data2 + $rest2;
    }
    $array = array($data, $data1, $data2);
    return $array;
}

function get_total_rice_stock($itemid){
    include 'dbconnect.php';
    $data = 0;
    $data1 = 0;
    $data2 = 0;

    $sql = "SELECT r.stock5kg,r.stock10kg,r.stock25kg FROM ricestock r,items i WHERE r.itemID = i.I_ID AND i.itemID ='$itemid'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $rest = $row['stock5kg'];
        $data = $data + $rest;

        $rest1 = $row['stock10kg'];
        $data1 = $data1 + $rest1;

        $rest2 = $row['stock25kg'];
        $data2 = $data2 + $rest2;
    }

    $array = array($data, $data1, $data2);
    return $array;
}

function get_total_sold_rice_stock($itemid){
    include 'dbconnect.php';
    $data = 0;
    $rest = 0;
    $data1 = 0;
    $rest1 = 0;
    $data2 = 0;
    $rest2 = 0;
    // $currentdate = date('d/m/Y');

    $sql = "SELECT i.itemName,s.itemQuan5kg,s.itemQuan10kg,s.itemQuan25kg FROM sellinginvoiceitem s, sellinginvoicelist l, items i WHERE s.sinlistTableid = l.id AND i.I_ID = s.itemName AND i.itemID='$itemid'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $rest = $row['itemQuan5kg'];
        $data = $data + $rest;

        $rest1 = $row['itemQuan10kg'];
        $data1 = $data1 + $rest1;

        $rest2 = $row['itemQuan25kg'];
        $data2 = $data2 + $rest2;
    }
    $array = array($data, $data1, $data2);
    return $array;
}



function get_current_item_total_rice_stock($ricrType){

    $totalRice = get_total_rice_stock($ricrType);
    $totalSold = get_total_sold_rice_stock($ricrType);

    $item5kgtot = $totalRice[0];
    $item10kgtot = $totalRice[1];
    $item25kgtot = $totalRice[2];

    $item5kgsold = $totalSold[0];
    $item10kgsold = $totalSold[1];
    $item25kgsold = $totalSold[2];

    $totalitem = ($item5kgtot+ $item10kgtot+ $item25kgtot);
    $totalsolditem = ($item5kgsold+ $item10kgsold+ $item25kgsold);
    $result = ($totalitem - $totalsolditem);

    return $result;
}

function get_current_total_rice_stock($riceType1, $riceType2, $riceType3){

    $rice1 = get_current_item_total_rice_stock($riceType1);
    $rice2 = get_current_item_total_rice_stock($riceType2);
    $rice3 = get_current_item_total_rice_stock($riceType3);

    $total = ($rice1 + $rice2 + $rice3);

    return $total;
}

function get_current_total_rice_stock_presentage($result){

    $presentage = floatval(($result / 100000) * 100);
    return  $presentage;
}

function get_current_rice_stock_bag_size($ricrType)
{

    $totalRice = get_total_rice_stock($ricrType);
    $totalSold = get_total_sold_rice_stock($ricrType);

    $item5kgtot = $totalRice[0];
    $item10kgtot = $totalRice[1];
    $item25kgtot = $totalRice[2];

    $item5kgsold = $totalSold[0];
    $item10kgsold = $totalSold[1];
    $item25kgsold = $totalSold[2];

    $final5kg = ($item5kgtot - $item5kgsold);
    $final10kg = ($item10kgtot - $item10kgsold);
    $final25kg = ($item25kgtot - $item25kgsold);

    $array = array($final5kg, $final10kg, $final25kg);
    return $array;
}











?>