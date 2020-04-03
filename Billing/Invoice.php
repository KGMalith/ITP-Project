<?php
require '../inc/dbconnect.php';

$sql = "SELECT * FROM buyinginvoice";
$state = mysqli_stmt_init($con);
mysqli_stmt_prepare($state, $sql);
mysqli_stmt_execute($state);
$results = mysqli_stmt_get_result($state);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
                        <img src="../../dist/img/4.jpg" class="img-circle elevation-2" alt="User Image">
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
                            <a href="#" class="nav-link">
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
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>Stock Management</p>
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
                                <i class="nav-icon fas fa-coins"></i>
                                <p>Expenses Tracking</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>Financial Handling</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Sales Forecasting</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Employee Management</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-angle-double-down"></i>
                                <p>
                                    Options
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
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
                            <h1 class="m-0 text-dark">Starter Page</h1>
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
                    <div class="row">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['add'])) {
                                ?>
                                    <form method="POST" id="invoice_form">
                                        <div class="table-responsive">
                                            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td colspan="2" align="center">
                                                                <h2 style="margin-top:10.5px">Create Invoice</h2>
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
                                                                        <input type="text" name="order_receiver_name" id="order_receiver_name" class="form-control input-sm mb-2" placeholder="Enter Receiver Name">
                                                                        <textarea name="order_receiver_address" id="order_receiver_address" class="form-control" placeholder="Billing Address"></textarea>
                                                                    </div>
                                                                    <div class="col-md-3"></div>
                                                                    <div class="col-md-4">
                                                                        Reverse Charge<br>
                                                                        <input type="text" name="order_no" id="order_no" class="form-control input-sm mb-3" placeholder="Enter Invoice Number" readonly>
                                                                        <input type="text" name="order_date" id="order_date" class="form-control input-sm" placeholder="Select Invoice Date">
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                                        <table id="invoice-item-table" class="table table-bordered table-hover table-responsive-sm" overflow="auto">
                                                                            <tr>
                                                                                <th>Sr No.</th>
                                                                                <th>Item Name</th>
                                                                                <th>Quantity</th>
                                                                                <th>Price</th>
                                                                                <th>Actual Amount</th>
                                                                                <th>Discount</th>
                                                                                <th>Humidity</th>
                                                                                <th>Total</th>
                                                                                <th>
                                                                                    <div align="center">
                                                                                        <button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm">+</button>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><span id="sr_no">1</span></td>
                                                                                <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm"></td>
                                                                                <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity"></td>
                                                                                <td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price"></td>
                                                                                <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1" data-srno="1" class="form-control input-sm order_item_actual_amount" readonly></td>
                                                                                <td><input type="text" name="order_item_discount[]" id="order_item_discount1" data-srno="1" class="form-control input-sm order_item_discount"></td>
                                                                                <td><input type="text" name="order_item_humidity[]" id="order_item_humidity1" data-srno="1" class="form-control input-sm order_item_humidity"></td>
                                                                                <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" class="form-control input-sm order_item_final_amount" readonly></td>
                                                                                <td>
                                                                                    <button type="button" name="remove_row" id="remove_row" class="remove_row btn btn-danger btn-sm ">X</button>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>


                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="col-md-9"><b>Total</b></td>
                                                            <td align="right" class="col-md-2"><b><span id="final_total_amt"><input type="text" name="" id="" class="form-control" readonly></span></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <input type="hidden" name="total_item" id="total_item" value="1" />
                                                                <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Create">
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2019 Nuwan Rice Mill.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Powered By</b> <img src="dist/img/3.png" alt="User Image">
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="Loader/script.js"></script>
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
    </script>

    <script>
        $(document).ready(function() {
            var final_total_amount = $('#final_total_amt').text();
            var count = 1;
            $(document).on('click', '#add_row', function() {
                console.log('clicked');
                count = count + 1;
                $('#total_item').val(count);

                var html_code = `<tr id="row_id_ ` + count + `">`;
                html_code += `<td><span id="sr_no">` + count + `</span></td>`;
                html_code += `<td><input type="text" name="item_name[]" id="item_name` + count + `" class="form-control input-sm"/></td>`;
                html_code += `<td><input type="text" name="order_item_quantity[]" id="order_item_quantity` + count + `" data-srno="` + count + `" class="form-control input-sm number_only order_item_quantity" /></td>`;
                html_code += `<td><input type="text" name="order_item_price[]" id="order_item_price` + count + `" data-srno="` + count + `" class="form-control input-sm number_only order_item_price" /></td>`;
                html_code += `<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount` + count + `" data-srno="` + count + `" class="form-control input-sm order_item_actual_amount" readonly></td>`;
                html_code += `<td><input type="text" name="order_item_discount[]" id="order_item_discount` + count + `" data-srno="` + count + `" class="form-control input-sm order_item_discount"></td>`;
                html_code += `<td><input type="text" name="order_item_humidity[]" id="order_item_humidity` + count + `" data-srno="` + count + `" class="form-control input-sm order_item_humidity"></td>`;
                html_code += `<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount` + count + `" data-srno="` + count + `" class="form-control input-sm order_item_final_amount" readonly></td>`;
                html_code += `<td><button type="button" name="remove_row" id="remove_row" class="remove_row btn btn-danger btn-sm ">X</button></td>`;
                html_code += `</tr>`;

                $('#invoice-item-table').append(html_code);
            });

            $(document).on('click', '.remove_row', function() {
                console.log('clicked');
                var row_id = $(this).attr("id");
                var total_item_amount = $("#order_item_final_amount" + row_id).val();
                var final_amount = ("#final_total_amt").text("");
                var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
                $("#final_total_amt").text(result_amount);
                $("#row_id_" + row_id).remove();
                count = count - 1;
                $('#total_item').val(count);
            });

        });
    </script>
</body>

</html>