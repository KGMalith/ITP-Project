<?php
include '../inc/dbconnect.php';


$output = '';
$query = "SELECT * FROM item ORDER BY iName ASC";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $output .= '<option value="' . $row["itemID"] . '">' . $row["iName"] . '</option>';
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
            <a href="Includes/Logout.inc.php" class="dropdown-item">
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
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="#" class="d-block">Alexander Pierce</a>
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
              <a href="#" class="nav-link">
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

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>Billing</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>Stock Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck-loading"></i>
                <p>Transport Handling</p>
              </a>
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

                  <form action="../inc/addcustomer.php" method="POST" name="cart">
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
                                  <div class="col-md-4">
                                    Reverse Charge<br>
                                    <input type="text" name="order_no" id="order_no" class="form-control input-sm mb-3" placeholder="Enter Invoice Number" readonly>
                                    <input type="text" name="order_date" id="date" class="form-control input-sm" placeholder="Select Invoice Date" value="<?php echo date("d-m-Y"); ?>" readonly>
                                  </div>
                                </div>
                                <div class="table-responsive">
                                  <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <table id="buypaddyTable" class="table table-bordered table-hover table-responsive-sm" overflow="auto" name="cart">
                                      <thead>
                                        <tr>

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
                                        <tr id="test">

                                          <td><select class="form-control " name="itemName">
                                              <option selected disabled>--Select--</option>
                                              <?php echo $output; ?>
                                            </select>
                                          </td>
                                          <td>
                                            <input type="text" class="form-control" name="itemQuantity" id="itemQuantity">
                                          </td>
                                          <td>
                                            <input type="text" class="form-control" name="itemPrice" id="itemPrice">
                                          </td>
                                          <td>
                                            <input type="text" class="form-control" name="itemActualAmount" id="itemActualAmount" readonly>
                                          </td>
                                          <td>
                                            <input type="text" class="form-control" name="itemDiscount" id="itemDiscount">
                                          </td>
                                          <td><select class="form-control" name="humidity" id="humidity">
                                              <option selected disabled>--Select--</option>
                                              <?php echo $out; ?>
                                            </select></td>
                                          <td>
                                            <input type="text" class="form-control" name="itemTotal" id="itemTotal" readonly>
                                          </td>
                                          <td>
                                            <button type="button" name="remove_row" id="remove_row" class="remove_row btn btn-danger btn-sm ">X</button>
                                          </td>
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
                                <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create">
                              </td>
                            </tr>
                          </tbody>

                        </table>
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

  <script>
    $(document).ready(function() {
      $("#VendorName").change(function() {
        var vid = $(this).val();
        $.ajax({
          url: "../inc/bpvendoraddress.php",
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
      $('form[name=cart] tr[name=line_items]').jAutoCalc({
        keyEventsFire: true,
        decimalPlaces: 2
      });
      $('form[name=cart]').jAutoCalc({
        decimalPlaces: 2
      });

    });
  </script>
  <script>
    $(document).ready(function() {
      var count = 1;
      $('#addrow').on('click', function() {
        count = count + 1;

        var markup = `<tr id="` + count + `">`;
        markup += `<td><select class ='form-control' name = 'itemName'><option selected disabled > --Select-- </option> <?php echo $output; ?> </select> </td>`;
        markup += "<td><input type = 'text' class = 'form-control' name = 'itemQuantity' id='itemQuantity" + count + "' data-qty='" + count + "'></td>";
        markup += "<td><input type='text' class='form-control' name='itemPrice' id='itemPrice" + count + "' ></td>";
        markup += "<td><input type = 'text' class ='form-control' name='itemActualAmount' id='itemActualAmount' readonly></td>";
        markup += "<td><input type = 'text' class = 'form-control' name = 'itemDiscount' id = 'itemDiscount' ></td>";
        markup += `<td><select class = 'form-control' name = 'humidity' id = 'humidity'><option selected disabled > --Select-- </option> <?php echo $out; ?> </select></td>`;
        markup += "<td><input type ='text' class ='form-control' name ='itemTotal' id ='itemTotal' readonly ></td>";
        markup += "<td><button type ='button' name='remove_row' id='remove_row' data-row='" + count + "' class ='remove_row btn btn-danger btn-sm' > X </button> </td>";
        markup += "</tr>";

        $("#buypaddyTable tbody").append(markup);

      });
      $(document).on('click', '#remove_row', function() {
        var delete_row = $(this).data('row');
        $("#" + delete_row).remove();
      });

      $(document).on('change', '#itemQuantity', function() {
        var itemquantity = $(this).data('row').val();
        var itemprice = $('#itemPrice').data('row').val();
        var actualamount;

        actualamount = itemprice * itemquantity;
        $('#itemActualAmount').html("<td><input type = 'text' class ='form-control' name='itemActualAmount' id='itemActualAmount' value='actualamount' readonly></td>");
      })

    });
  </script>

  <script>
    $.validate();
  </script>

  <script>

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