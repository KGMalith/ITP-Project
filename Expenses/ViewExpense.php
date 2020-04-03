<?php
include '../inc/dbconnect.php';
if (isset($_GET['EXid'])) {
    $ID = mysqli_real_escape_string($con, $_GET['EXid']);
    $sql = "SELECT expensetype.ExpTName,expense.ExpTID,expense.ExpGID,expensegroup.ExpGName,expense.Date,expense.Amount,expense.PMethod FROM expense,expensetype,expensegroup WHERE expense.ExpGID = expensegroup.ExpGID AND expense.ExpTID = expensetype.ExpTID AND expense.EXPID='$ID'";
    $result = mysqli_query($con, $sql);


    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $date = $row['Date'];
            $exgroupname = $row['ExpGName'];
            $exgroupid = $row['ExpGID'];
            $expensetypename = $row['ExpTName'];
            $expensetypeid = $row['ExpTID'];
            $amount = $row['Amount'];
            $pmenthod = $row['PMethod'];
        } else {
            header("Location: ExpenseTable.php?error=notfound");
            exit();
        }
    } else {
        header("Location: ExpenseTable.php?error=SQLError");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Expenses</title>
    <!--Custom CSS-->
    <link rel="stylesheet" href="../dist/css/customCSS.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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

                        <li class="nav-item has-treeview menu-open">
                            <a href="" class="nav-link active">
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
                                    <a href="../Expenses/ExpenseTable.php" class="nav-link active">
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
                            <h1 class="m-0 text-dark">Add Expenses</h1>
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
                                    <h5 class="card-title">Edit Expenses Details</h5>
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

                                    <form action="../inc/updateexpense.php" method="POST">
                                        <div class="form-group col-md-3 ">
                                            <label>Date<span class="requiredIcon" style="color:red;">*</span></label>
                                            <div class="input-group date" data-provide="datepicker">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="date" class="form-control" data-validation="required" data-validation-error-msg="Please Select Date" autocomplete="off" value="<?php echo $date ?>">
                                            </div>

                                        </div>

                                        <div class="form-row ml-1">
                                            <div class="form-group col-md-4">
                                                <label>Expense Group Name<span class="requiredIcon" style="color:red;">*</span></label>
                                                <select name="expensegroup" id="expensegroup" class="form-control">
                                                    <option selected value="<?php echo $exgroupid ?>"> <?php echo $exgroupname ?></option>
                                                    <?php
                                                    $query = "SELECT ExpGID,ExpGName FROM expensegroup";
                                                    $results = mysqli_query($con, $query);
                                                    while ($group = mysqli_fetch_assoc($results)) {
                                                        echo '
                                                            <option value="' . $group["ExpGID"] . '">' . $group["ExpGName"] . '</option>
                                                            ';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="form-group col-md-4">
                                                <label>Expense Name<span class="requiredIcon" style="color:red;">*</span></label>
                                                <select name="expensetype" id="expensetype" class="form-control">
                                                    <option selected value="<?php echo $expensetypeid  ?>"><?php echo $expensetypename ?></option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group col-md-3 ">
                                            <label>Amount<span class="requiredIcon" style="color:red;">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="amount" data-validation="number required" data-validation-allowing="float" data-validation-error-msg="Please Enter Amount" autocomplete="off" value="<?php echo $amount ?>">
                                            </div>
                                        </div>
                                        <div class="form-row ml-1">
                                            <div class="form-group col-md-3">
                                                <label>Payment Method<span class="requiredIcon" style="color:red;">*</span></label>
                                                <div class="form-group clearfix">
                                                    <div class="icheck-primary d-inline">
                                                        <?php
                                                        if ($pmenthod == 'Cash') {
                                                            echo '
                                                                <input type="radio" id="radioPrimary1" name="check1" value="Cash" checked>
                                                                ';
                                                        } else {
                                                            echo '
                                                                <input type="radio" id="radioPrimary1" name="check1" value="Cash">
                                                                ';
                                                        }
                                                        ?>
                                                        <label for="radioPrimary1">
                                                            Cash
                                                        </label>
                                                    </div>

                                                    <div class="icheck-primary d-inline ml-3">
                                                        <?php
                                                        if ($pmenthod == 'Cheque') {
                                                            echo '
                                                            <input type="radio" id="radioPrimary2" name="check1" value="Cheque" checked>
                                                            ';
                                                        } else {
                                                            echo '
                                                            <input type="radio" id="radioPrimary2" name="check1" value="Cheque">
                                                            ';
                                                        }

                                                        ?>
                                                        <label for="radioPrimary2">
                                                            Cheque
                                                        </label>
                                                    </div>

                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                        echo '
                                                            <input type="hidden" name="id" value="' . $_GET['id'] . '">
                                                            ';
                                                    } else {
                                                        echo '
                                                            <input type="hidden" name="id" value="' . $ID . '">
                                                            ';
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" id="updateexpense" name="updateexpense" class="btn btn-success">Update Expense</button>
                                        <a href="ExpenseTable.php"><button type="button" class="btn btn-warning" value="Back"><i class="fas fa-arrow-left"></i> Back To Table</button></a>
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
    <script src="../date-picker/bootstrap-datepicker.js"></script>
    <script src="../plugins/icheck-bootstrap/icheck.js"></script>
    <script>
        $(document).ready(function() {
            $("#expensegroup").change(function() {
                var gid = $(this).val();
                $.ajax({
                    url: "../inc/expense.php",
                    method: "POST",
                    data: {
                        GroupID: gid
                    },
                    success: function(data) {
                        $("#expensetype").html(data);
                    }
                })
            });
        });
    </script>
    <script>
        $.validate();
    </script>
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        });
    </script>
    <script>
        //SweetAlert
        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Expense Submited Successfully.',
                confirmButtonColor: 'green',
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
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>

</html>