<?php
include '../inc/dbconnect.php';
include '../inc/buyinginvoiceidgenerator.php';

SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("Location: ../Login.php");
}

$output = '';
$query = "SELECT * FROM items ORDER BY itemName ASC";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $output .= '<option value="' . $row["I_ID"] . '">' . $row["itemName"] . '</option>';
}


$outp = '';
$query = "SELECT * FROM vendor ORDER BY vName ASC";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $outp .= '<option value="' . $row["vendorID"] . '">' . $row["vName"] . '</option>';
}


$out = "";
$out .= '<option value="YES">YES</option>
          <option value="NO">NO</option>
          ';



if (isset($_POST['create_invoice'])) {
  $vendorid = mysqli_real_escape_string($con, $_POST['VendorName']);
  $invoiceid = mysqli_real_escape_string($con, $_POST['invoiceno']);
  $invoicedate = mysqli_real_escape_string($con, $_POST['invoice_date']);
  $finalAmount = mysqli_real_escape_string($con, $_POST['finalTotalAmount']);

  $sql = "INSERT INTO buyinginvoicelist(BInvoiceID,orderDate,vendorid,finalAmount) VALUES ('$invoiceid','$invoicedate','$vendorid','$finalAmount')";
  mysqli_query($con, $sql);
  $invlistTableid = mysqli_insert_id($con);

  for ($a = 0; $a < count($_POST["itemName"]); $a++) {
    $sql = "INSERT INTO buyinginvoiceitem(inlistTableId,BInvoiceID,itemName,itemQuantity,itemPrice,actualAmount,discount,humidity,total) VALUES('$invlistTableid','$invoiceid','" . $_POST["itemName"][$a] . "','" . $_POST["itemQuantity"][$a] . "','" . $_POST["itemPrice"][$a] . "','" . $_POST["itemActualAmount"][$a] . "','" . $_POST["itemDiscount"][$a] . "','" . $_POST["humidity"][$a] . "','" . $_POST["itemTotal"][$a] . "')";
    mysqli_query($con, $sql);
  }

  header("Location: BuyingInvoiceList.php?error=Success");
  exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buying Invoice</title>
  <!--Custom CSS-->
  <link rel="stylesheet" href="../dist/css/customCSS.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../form-validator/theme-default.min.css">
  <link rel="stylesheet" href="../sweetalert/sweetalert2.min.css">
  <script type='text/javascript' src="../Auto-Calc/example.js"></script>
  <link rel="stylesheet" href="../date-picker/bootstrap-datepicker.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="../inc/Logout.inc.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;LogOut
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../dist/img/RICE.jpg" alt="Company Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Nuwan Rice Mill</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/4.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="../index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../Order/OrderTable.php" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Order Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../Customer/CustomerTable.php" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>Customer Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../Vendor/VendorTable.php" class="nav-link">
                <i class="nav-icon fas fa-handshake"></i>
                <p>Vendor Management</p>
              </a>
            </li>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>Billing
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Billing/BuyingInvoiceList.php" class="nav-link active">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Buying Invoice</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Billing/SellingInvoiceList.php" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Selling Invoice</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-boxes"></i>
                <p>Stock Management
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="../Item/ItemTable.php" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Item Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../Item/Stock/RicePriceTable.php" class="nav-link">
                    <i class="nav-icon fas fa-money-bill-wave"></i>
                    <p>Rice Price Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../Item/Stock/addRiceStockTable.php" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Rice Stock Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../Item/Stock/addPaddyStockTable.php" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Paddy Stock Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../Item/Stock/addConvertPaddyStockTable.php" class="nav-link">
                    <i class="nav-icon fab fa-pagelines"></i>
                    <p>Paddy Process Management</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck-loading"></i>
                <p>Transport Handling</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Transport/TransportActionTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Transport Action</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Transport/TransportHandlingTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Transport Handling</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>Expenses Tracking</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Expenses/ExpensesGroupTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Expense Group</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Expenses/ExpensesTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Expense Type</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Expenses/ExpenseTable.php" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Expenses Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-truck-moving"></i>
                <p>Vehicle Management
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Vehicle/VehicleTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>Vehicle Types</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Vehicle/VehicleTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>Vehicles</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Employee Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Employee/EmployeeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>Employee Details</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Employee/Leave/LeaveManagementTable.php" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>Employee Leave Details</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Employee/Leave/LeaveTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>Leave Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-angle-double-down"></i>
                <p>
                  Options
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Change-password.php" class="nav-link">
                    <i class="nav-icon fas fa-key"></i>
                    <p>Change Password</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Register.php" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Add User</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Invoice</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">


          <!--your conetent here-->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" id="cus">
                  <h5 class="card-title">Paddy Buying Invoice</h5>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" data-placement="top" title="Minimize">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">

                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "emptyFields") : ?>
                    <div class="fieldsempty" data-fields="<?= $_GET['emptyFields']; ?>"></div>
                  <?php endif;  ?>

                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "invalidmobile") : ?>
                    <div class="invalidmobilenum" data-mobilenumberror="<?= $_GET['invalidmobile']; ?>"></div>
                  <?php endif;  ?>



                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "invalidland") : ?>
                    <div class="invalidlandnum" data-landnumberror="<?= $_GET['invalidland']; ?>"></div>
                  <?php endif;  ?>


                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "invalidEmail") : ?>
                    <div class="invalidmail" data-mailerror="<?= $_GET['invalidEmail']; ?>"></div>
                  <?php endif;  ?>


                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "SQLError") : ?>
                    <div class="sqlerror" data-sql="<?= $_GET['SQLError']; ?>"></div>
                  <?php endif;  ?>


                  <?php if (isset($_GET['error']))
                    if ($_GET['error'] == "CustomerTaken") : ?>
                    <div class="taken" data-customername="<?= $_GET['CustomerTaken']; ?>"></div>
                  <?php endif;  ?>


                  <?php if (isset($_GET['Register']))
                    if ($_GET['Register'] == "Success") :  ?>
                    <div class="flash-data" data-flashdata="<?= $_GET['Success']; ?>"></div>
                  <?php endif;  ?>

                  <form action="buypaddy.php" method="POST" id="invoice_form">
                    <div class="table-responsive">
                      <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <td colspan="2" align="center">
                                <h2 style="margin-top:8.5px">Create Invoice</h2>
                              </td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="2">
                                <div class="form-row mb-3">
                                  <div class="col-md-5">
                                    To, <br>
                                    <b>RECEIVER (BILL TO)</b>
                                    <select class="form-control mb-2" name="VendorName" id="VendorName">
                                      <option selected disabled>--Select--</option>
                                      <?php echo $outp; ?>
                                    </select>
                                    <div id="Vendoraddress"> <input type="text" class="form-control" name="Vendoraddress" readonly> </div>
                                  </div>
                                  <div class="col-md-3"></div>
                                  <div class="col-md-4"><br>
                                    <label>Invoice ID</label>
                                    <input type="text" name="invoiceno" id="invoiceno" class="form-control input-sm mb-2" placeholder="Enter Invoice Number" value="<?php echo $binvoiceid ?>" readonly>
                                    <div class="form-group">
                                      <div class="input-group date" data-provide="datepicker">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                          </span>
                                        </div>
                                        <input type="text" name="invoice_date" id="date" class="form-control input-sm" data-validation="required" data-validation-error-msg="Please Select Date">
                                        <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="table-responsive">
                                  <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <table id="buypaddyTable" class="table table-bordered table-hover table-responsive-sm" overflow="auto" name="cart">
                                      <thead>
                                        <tr name="line_items">
                                          <th style="width: 15%">Item Name</th>
                                          <th>Quantity</th>
                                          <th>Price</th>
                                          <th>Actual Amount</th>
                                          <th>Discount</th>
                                          <th style="width: 13%">Humidity</th>
                                          <th>Total</th>
                                          <th>
                                            <div align="center">
                                              <button type="button" id="addrow" name="addrow" class="addrow btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span>+</button>
                                            </div>
                                          </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><select class="form-control " name="itemName[]" id="itemName1">
                                              <option selected disabled>--Select--</option>
                                              <?php echo $output; ?>
                                            </select>
                                          </td>
                                          <td>
                                            <input type="text" class="form-control" name="itemQuantity[]" id="itemQuantity1" data-srno="1">
                                          </td>
                                          <td>
                                            <input type="text" class="item_Price form-control" name="itemPrice[]" id="itemPrice1" data-srno="1">
                                          </td>
                                          <td>
                                            <input type="text" class="form-control" name="itemActualAmount[]" id="itemActualAmount1" data-srno="1" readonly>
                                          </td>
                                          <td>
                                            <input type="text" class="item_Discount form-control" name="itemDiscount[]" id="itemDiscount1" data-srno="1">
                                          </td>
                                          <td><select class="form-control" name="humidity[]" id="humidity1">
                                              <option selected disabled>--Select--</option>
                                              <?php echo $out; ?>
                                            </select></td>
                                          <td>
                                            <input type="text" class="form-control" name="itemTotal[]" id="itemTotal1" data-srno="1" readonly>
                                          </td>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>


                              </td>
                            </tr>
                            <tr>
                              <td align="right" class="col-md-9"><b>Total</b></td>
                              <td align="right" class="col-md-2"><b><span id="final_total_amt"><input type="text" name="finalTotalAmount" id="finalTotalAmount" class="form-control" readonly></span></b></td>
                            </tr>
                            <tr>
                              <td align="center">
                                <input type="hidden" name="total_item" id="total_item" value="1">
                                <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create">
                              </td>
                            </tr>
                          </tbody>

                        </table>
                        <a href="BuyingInvoiceList.php"><button type="button" class="btn btn-warning float-right" value="Back" style="margin-right: 5px;"><i class=" fas fa-arrow-left"></i> Back To Table</button></a>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 Nuwan Rice Mill.</strong> All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Powered By</b> <img src="../dist/img/3.png" alt="User Image">
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->


  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="../dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="../dist/js/pages/dashboard2.js"></script>
  <script src="../form-validator/jquery.form-validator.min.js"></script>
  <script src="../form-validator/jquery.form-validator.js"></script>
  <script src="../sweetalert/sweetalert2.all.min.js"></script>
  <script src="../Auto-Calc/jautocalc.js"></script>
  <script src="../date-picker/bootstrap-datepicker.js"></script>

  <script>
    $(document).ready(function() {
      $("#VendorName").change(function() {
        var vid = $(this).val();
        $.ajax({
          url: "../inc/BuyingInvoiceVendorAddress.php",
          method: "POST",
          data: {
            VendorID: vid
          },
          dataType: "text",
          success: function(data) {
            $("#Vendoraddress").html(data);
          }
        })
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      var final_total_amt = $('#finalTotalAmount').text();
      var count = 1;
      $('#addrow').on('click', function() {
        count = count + 1;
        $('#total_item').val(count);
        var markup = `<tr id="row_id_` + count + `" name="line_items">`;
        markup += `<td><select class ='form-control' name ='itemName[]' id='itemName` + count + `'><option selected disabled > --Select-- </option> <?php echo $output; ?> </select> </td>`;
        markup += "<td><input type = 'text' class = 'form-control' name = 'itemQuantity[]' id='itemQuantity" + count + "' data-srno='" + count + "'></td>";
        markup += "<td><input type='text' class='item_Price form-control' name='itemPrice[]' id='itemPrice" + count + "' data-srno='" + count + "'></td>";
        markup += `<td><input type = "text" class ="form-control" name="itemActualAmount[]" id="itemActualAmount` + count + `" data-srno="` + count + `" readonly></td>`;
        markup += "<td><input type ='text' class ='item_Discount form-control' name ='itemDiscount[]' id ='itemDiscount" + count + "' data-srno='" + count + "' ></td>";
        markup += `<td><select class ='form-control' name ='humidity[]' id ='humidity` + count + `'><option selected disabled > --Select-- </option> <?php echo $out; ?> </select></td>`;
        markup += "<td><input type ='text' class ='form-control' name ='itemTotal[]' id ='itemTotal" + count + "' data-srno='" + count + "' readonly ></td>";
        markup += "<td><button type ='button' name='remove_row' id='" + count + "' data-row='" + count + "' class ='remove_row  btn btn-danger btn-sm' > X </button> </td>";
        markup += "</tr>";

        $("#buypaddyTable tbody").append(markup);

      });
      $(document).on('click', '.remove_row', function() {
        var row_id = $(this).attr("id");
        var total_item_amount = $('#itemTotal' + row_id).val();
        var final_amount = $('#finalTotalAmount').value;
        var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
        $('#finalTotalAmount').val(result_amount);
        $('#row_id_' + row_id).remove();
        // var delete_row = $(this).data('row');
        // $("#" + delete_row).remove();
        count = count - 1;
        $('#total_item').val(count);
      });

      function calc_final_total(count) {
        var final_item_total = 0;
        for (j = 1; j <= count; j++) {
          var quantity = 0;
          var price = 0;
          var actual_amount = 0;
          var discount = 0;
          var item_total = 0;

          quantity = $('#itemQuantity' + j).val();
          if (quantity > 0) {
            price = $('#itemPrice' + j).val();
            if (price > 0) {
              actual_amount = parseFloat(quantity) * parseFloat(price);
              $('#itemActualAmount' + j).val(actual_amount);
              console.log(actual_amount);
              discount = $('#itemDiscount' + j).val();
              if (discount > 0) {
                item_total = parseFloat(actual_amount) - parseFloat(discount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#itemTotal' + j).val(item_total);
              } else {
                item_total = parseFloat(actual_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#itemTotal' + j).val(item_total);
              }

            }
          }
        }
        $('#finalTotalAmount').val(final_item_total);
      }


      $(document).on('blur', '.item_Price', function() {
        calc_final_total(count);
      });

      $(document).on('blur', '.item_Discount', function() {
        calc_final_total(count);
      });

      $(document).on('blur', '#finalTotalAmount', function() {
        calc_final_total(count);
      });

      $('#create_invoice').click(function() {
        if ($.trim($('#VendorName').val()).length == 0) {
          swal.fire({
            icon: 'error',
            title: 'Oops...',
            confirmButtonColor: 'green',
            text: 'Vendor Name is Empty!',
            closeOnEsc: false,
            closeOnClickOutside: false,
          })
          return false;
        }

        for (var no = 1; no <= count; no++) {
          if ($.trim($('#itemName' + no).val()).length == 0) {
            swal.fire({
              icon: 'error',
              title: 'Oops...',
              confirmButtonColor: 'green',
              text: 'Item Name is Empty!',
              closeOnEsc: false,
              closeOnClickOutside: false,
            })
            $('#itemName' + no).focus();
            return false;
          }
          if ($.trim($('#itemQuantity' + no).val()).length == 0) {
            swal.fire({
              icon: 'error',
              title: 'Oops...',
              confirmButtonColor: 'green',
              text: 'Item Quantity is Empty!',
              closeOnEsc: false,
              closeOnClickOutside: false,
            })
            $('#itemQuantity' + no).focus();
            return false;
          }
          if ($.trim($('#itemPrice' + no).val()).length == 0) {
            swal.fire({
              icon: 'error',
              title: 'Oops...',
              confirmButtonColor: 'green',
              text: 'Item Price is Empty!',
              closeOnEsc: false,
              closeOnClickOutside: false,
            })
            $('#itemPrice' + no).focus();
            return false;
          }

          if ($.trim($('#humidity' + no).val()).length == 0) {
            swal.fire({
              icon: 'error',
              title: 'Oops...',
              confirmButtonColor: 'green',
              text: 'Humidity Not Chosen!',
              closeOnEsc: false,
              closeOnClickOutside: false,
            })
            $('#itemPrice' + no).focus();
            return false;
          }
        }

      });

    });
  </script>

  <script>
    $.validate();
  </script>

  <script>
    //SweetAlert
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
      swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Customer Details are Submited Successfully.',
        confirmButtonColor: 'green',
        closeOnEsc: false,
        closeOnClickOutside: false,

      })
    }

    customername = $('.taken').data('customername')
    if (customername) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Customer Name Already Taken!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    sql = $('.sqlerror').data('sql')
    if (sql) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'SQL Error!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    mailerror = $('.invalidmail').data('mailerror')
    if (mailerror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Invalid Email!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    landnumberror = $('.invalidlandnum').data('land')
    if (land) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Invalid Land Number!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
    mobilenumberror = $('.invalidmobilenum').data('mobile')
    if (mobile) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Invalid Mobile Number!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
    fields = $('.fieldsempty').data('fields')
    if (fields) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Fields are Empty!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
  </script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });
  </script>
</body>

</html>