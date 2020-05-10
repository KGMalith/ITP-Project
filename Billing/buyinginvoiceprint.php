<?php
include '../inc/dbconnect.php';

if (isset($_GET["byninvid"])) {

    $byninvoicelistid = $_GET["byninvid"];
    $sql = "SELECT bi.itemName,i.itemName,bi.itemQuantity,bi.itemPrice,bi.actualAmount,bi.discount,bi.humidity,bi.total FROM buyinginvoicelist b,buyinginvoiceitem bi,items i WHERE bi.inlistTableId = b.id AND bi.itemName = i.I_ID AND bi.inlistTableId = {$byninvoicelistid}";
    $result = mysqli_query($con, $sql);


    $sql = "SELECT b.BInvoiceID,v.vName,v.vMNumber,v.vLNumber,v.vEmail,v.vAddress,v.vCity,b.finalAmount FROM buyinginvoicelist b,vendor v WHERE b.vendorid = v.vendorID AND b.id ={$byninvoicelistid}";
    $resultset = mysqli_query($con, $sql);
    $resl = mysqli_fetch_assoc($resultset);
    $invoiceid = $resl['BInvoiceID'];
    $vendorname  = $resl['vName'];
    $vendoraddress = $resl['vAddress'];
    $vendercity = $resl['vCity'];
    $vendormobile = $resl['vMNumber'];
    $vendorland = $resl['vLNumber'];
    $vendoremail = $resl['vEmail'];
    $finalAmount = $resl['finalAmount'];
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
                        <strong><?php echo $vendorname ?></strong><br>
                        <?php echo $vendoraddress ?><br>
                        <?php echo $vendercity ?><br>
                        Phone: <?php echo $vendormobile ?><br>
                        Land:<?php echo $vendorland ?><br>
                        Email: <?php echo $vendoremail ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Invoice: <b><?php echo $invoiceid ?></b><br>
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
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Actual Amount</th>
                                <th>Discount</th>
                                <th>Humidity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $itemName = $row['itemName'];
                                $quantity = $row['itemQuantity'];
                                $price = $row['itemPrice'];
                                $actualAmount = $row['actualAmount'];
                                $discount = $row['discount'];
                                $humidity = $row['humidity'];
                                $subtotal = $row['total'];
                            ?>
                                <tr>

                                    <td><?php echo $itemName ?></td>
                                    <td><?php echo $quantity ?></td>
                                    <td><?php echo $price ?></td>
                                    <td><?php echo $actualAmount ?></td>
                                    <td><?php echo $discount ?></td>
                                    <td><?php echo $humidity ?></td>
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