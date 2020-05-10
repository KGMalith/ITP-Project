<?php
include '../inc/dbconnect.php';

SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
    header("Location: ../Login.php");
}

if (isset($_GET["sellinvid"])) {

    $sellninvoicelistid = $_GET["sellinvid"];
    $sql = "SELECT i.itemName,si.itemQuan5kg,si.itemPrice5kg,si.actualAmount5kg,si.itemQuan10kg,si.itemPrice10kg,si.actualAmount10kg,si.itemQuan25kg,si.itemPrice25kg,si.actualAmount25kg,si.discount,si.subTotal FROM sellinginvoicelist s, sellinginvoiceitem si, items i WHERE s.id = si.sinlistTableid AND si.itemName = i.I_ID AND si.sinlistTableid = {$sellninvoicelistid}";
    $result = mysqli_query($con, $sql);


    $sql = "SELECT s.SInvoiveID,s.SellingInvDate,s.finalAmt,c.cName,c.cMNumber,c.cLNumber,c.cEmail,c.cAddress,c.cCity,o.Order_ID FROM sellinginvoicelist s, orderm o, customer c WHERE s.orderID = o.OrderM_ID AND s.CusID = c.customerID AND s.id ={$sellninvoicelistid}";
    $resultset = mysqli_query($con, $sql);
    $resl = mysqli_fetch_assoc($resultset);
    $invoiceid = $resl['SInvoiveID'];
    $customername  = $resl['cName'];
    $customeraddress = $resl['cAddress'];
    $customercity = $resl['cCity'];
    $customermobile = $resl['cMNumber'];
    $customerland = $resl['cLNumber'];
    $customeremail = $resl['cEmail'];
    $finalAmount = $resl['finalAmt'];
    $orderid = $resl['Order_ID'];
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BuyingInvoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="../dist/img/RICE2.jpg" class="brand-image img-circle elevation-3"> &nbsp; Nuwan Rice Mill
                        <small class="float-right">Date: <?php echo date('d/m/y') ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Nuwan Rice Mill</strong><br>
                        No.47 Main Road,<br>
                        Anuradhapura.<br>
                        Phone: (+94) 0775100250<br>
                        Email: nuwanricemill@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?php echo $customername ?></strong><br>
                        <?php echo $customeraddress ?><br>
                        <?php echo $customercity ?><br>
                        Phone: <?php echo $customermobile ?><br>
                        Land:<?php echo $customerland ?><br>
                        Email: <?php echo $customeremail ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Invoice: <b><?php echo $invoiceid ?></b><br>
                    Order ID : <b><?php echo $orderid ?></b>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Item Name</th>
                                <th style="width: 5%">Quantity<br>(5KG)</th>
                                <th style="width: 10%">Price<br>(5KG)</th>
                                <th style="width: 10%">Actual Amount<br>(5KG)</th>
                                <th style="width: 8%">Quantity<br>(10KG)</th>
                                <th style="width: 10%">Price<br>(10KG)</th>
                                <th style="width: 10%">Actual Amount<br>(10KG)</th>
                                <th style="width: 8%">Quantity<br>(25KG)</th>
                                <th style="width: 10%">Price<br>(25KG)</th>
                                <th style="width: 10%">Actual Amount<br>(25KG)</th>
                                <th style="width: 10%">Discount</th>
                                <th style="width: 10%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $itemName = $row['itemName'];
                                $quantity5 = $row['itemQuan5kg'];
                                $price5 = $row['itemPrice5kg'];
                                $actualAmount5 = $row['actualAmount5kg'];
                                $quantity10 = $row['itemQuan10kg'];
                                $price10 = $row['itemPrice10kg'];
                                $actualAmount10 = $row['actualAmount10kg'];
                                $quantity25 = $row['itemQuan25kg'];
                                $price25 = $row['itemPrice25kg'];
                                $actualAmount25 = $row['actualAmount25kg'];
                                $discount = $row['discount'];
                                $subtotal = $row['subTotal'];
                            ?>
                                <tr>

                                    <td><?php echo $itemName ?></td>
                                    <td><?php echo $quantity5 ?></td>
                                    <td><?php echo $price5 ?></td>
                                    <td><?php echo $actualAmount5 ?></td>
                                    <td><?php echo $quantity10 ?></td>
                                    <td><?php echo $price10 ?></td>
                                    <td><?php echo $actualAmount10 ?></td>
                                    <td><?php echo $quantity25 ?></td>
                                    <td><?php echo $price25 ?></td>
                                    <td><?php echo $actualAmount25 ?></td>
                                    <td><?php echo $discount ?></td>
                                    <td><?php echo $subtotal ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="../dist/img/credit/money.png" alt="Money">
                    <img src="../dist/img/credit/cheque.png" alt="Chequebook">
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Final Amounts</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Total:</th>
                                <td><?php echo $finalAmount ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>