<?php
SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
    header("Location: ../Login.php");
}
?>
<?php
include '../inc/dbconnect.php';
$VID = "";
if (isset($_GET['vid'])) {
    $VID = mysqli_real_escape_string($con, $_GET['vid']);
    $query = "SELECT v.VRegistrationNo,v.VehID,v.ModelNo,v.EngineNo,v.ChassisNo,v.Status,v.VOwner,vt.V_typeName,e.name,v.V_typeId,v.id FROM employee e, vehicletype vt,vehicle v WHERE e.id = v.id AND vt.V_typeId = v.V_typeId AND VehicleID='" . $VID . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $vehiclid = $row['VehID'];
    $RegisterNo = $row['VRegistrationNo'];
    $ChassyNo = $row['ChassisNo'];
    $ModelNo = $row['ModelNo'];
    $EngineNo = $row['EngineNo'];
    $VehicleType = $row['V_typeName'];
    $VehicleID = $row['V_typeId'];
    $DriverName = $row['name'];
    $DriverID = $row['id'];
    $Owner = $row['VOwner'];
    $status = $row['Status'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle Details</title>
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

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-invoice"></i>
                                <p>Billing
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Billing/BuyingInvoiceList.php" class="nav-link">
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
                                <p>Transport Handling
                                    <i class="right fas fa-angle-left"></i>
                                </p>
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
                                <p>Expenses Tracking
                                    <i class="right fas fa-angle-left"></i>
                                </p>
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

                        <li class="nav-item has-treeview menu-open">
                            <a href="" class="nav-link active">
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
                                    <a href="../Vehicle/VehicleTable.php" class="nav-link active">
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
                            <h1 class="m-0 text-dark">Vehicle Details</h1>
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
                    <div class="card mb-5 col-12">

                        <div class="card-header" id="cus">
                            <h5 class="card-title">Vehicle Details</h5>
                            <div class="card-tools">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-success btn-sm" onclick="window.print()" data-toggle="tooltip" data-placement="left" title="Print"><i class="fas fa-print"></i></button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <?php if (isset($_GET['error']))
                                if ($_GET['error'] == "SQLError") : ?>
                                <div class="sqlerror" data-sql="<?= $_GET['SQLError']; ?>"></div>
                            <?php endif;  ?>



                            <form action="../inc/updatevehicle.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group col-md-3">
                                    <label>Vehicle ID<span class="requiredIcon" style="color:red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="vehiID" value="<?php echo $vehiclid ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row ml-1">

                                    <div class="form-group col-md-4">
                                        <label>Vehicle Registration No<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck-pickup"></i></span>
                                            </div>
                                            <?php

                                            echo '<input type="text" name="registerno" id="registerno" class="form-control" data-validation="required" data-validation-error-msg="Please Fill Vehicle Registration Number" value="' . $RegisterNo . '" disabled>';

                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3"></div>

                                    <div class="form-group col-md-4">
                                        <label>Model No<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck-pickup"></i></span>
                                            </div>
                                            <?php

                                            echo '<input type="text" name="modelno" id="modelno" class="form-control" data-validation="required" data-validation-error-msg="Please Fill Vehicle Model Number" value="' . $ModelNo . '" disabled>';

                                            ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row ml-1">

                                    <div class="form-group col-md-4">
                                        <label>Chassis No<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck-pickup"></i></span>
                                            </div>

                                            <?php

                                            echo '<input type="text" name="chasisno" id="chasisno" class="form-control" data-validation="required" data-validation-error-msg="Please Fill Vehicle Chassis Number" value="' . $ChassyNo . '" disabled>';

                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3"></div>

                                    <div class="form-group col-md-4">
                                        <label>Engine No<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck-pickup"></i></span>
                                            </div>
                                            <?php

                                            echo '<input type="text" name="engineno" class="form-control" data-validation="required" data-validation-error-msg="Please Fill Vehicle Engine Number" value="' . $EngineNo . '" disabled>';

                                            ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row ml-2">

                                    <div class="form-group ">
                                        <label> Vehicle Type<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">

                                            <div class="form-group">
                                                <select class="form-control" name="vehicletype" disabled>
                                                    <option value="<?php echo $VehicleID ?>"><?php echo $VehicleType ?></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3"></div>

                                    <div class="form-group">
                                        <label> Driver Name<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">

                                            <div class="form-group">
                                                <select class="form-control" name="DriverName" disabled>

                                                    <option value="<?php echo $DriverID ?>"><?php echo $DriverName ?></option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3"></div>

                                    <div class="form-group ">
                                        <label> Owner<span class="requiredIcon" style="color:red;">*</span></label>
                                        <div class="input-group">

                                            <div class="form-group">
                                                <select class="form-control" name="vehicleowner" disabled>
                                                    <?php

                                                    echo '
                                                                            <option value="' . $Owner . '">' . $Owner . '</option>'

                                                    ?>


                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="form-group ml-2">
                                    <label> Status<span class="requiredIcon" style="color:red;">*</span></label>
                                    <div class="input-group">

                                        <div class="form-group">
                                            <select class="form-control" name="vehiclestatus" disabled>
                                                <?php

                                                echo '
                                                                        <option value="' . $status . '">' . $status . '</option>';


                                                ?>


                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="flex">
                                    <a href="VehicleTable.php"><button type="button" class="btn btn-warning btn-md" value="Back"><i class="fas fa-arrow-left"></i> Back To Table</button></a>
                                </div>


                            </form>

                        </div>
                        <br>

                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <div id="foot">
                    <strong>Copyright &copy; 2019 Nuwan Rice Mill.</strong> All rights reserved.
                    <div class="float-right d-none d-sm-inline-block img_div">
                        <b>Powered By</b> <img src="../dist/img/3.png" alt="User Image">
                    </div>
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
        <script src="../date-picker/bootstrap-datepicker.js"></script>

        <script>
            $.validate();
        </script>

        <script>
            $('.datepicker').datepicker();
        </script>

        <script>
            //SweetAlert

            const sql = $('.sqlerror').data('sql')
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
        </script>
</body>

</html>