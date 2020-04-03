<?php
include '../../inc/dbconnect.php';
$Emp_ID = "";

if (isset($_GET['eid'])) {
    $Emp_ID = mysqli_real_escape_string($con, $_GET['eid']);
    $query = "SELECT * FROM employee WHERE id = {$Emp_ID}";

    $resultset = mysqli_query($con, $query);

    if ($resultset) {
        if (mysqli_num_rows($resultset) == 1) {
            $result = mysqli_fetch_assoc($resultset);
            $eid = $result['empid'];
            $fname = $result['fullname'];
            $name = $result['name'];
            $dob = $result['dob'];
            $gender = $result['gender'];
            $nic = $result['nicnum'];
            $mobile = $result['mnumber'];
            $address = $result['empaddress'];
            $joindate = $result['jondate'];
            $type = $result['emptype'];
            $designation = $result['designation'];
            $imglocation = $result['Imglocation'];
            $imgstatus = $result['Imgstatus'];
        } else {
            header('Location: EmployeeTable.php?error=UserNotFound');
        }
    } else {
        header('Location: EmployeeTable.php?error=SQLError');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Employee Leave Details</title>
    <!--Custom CSS-->
    <link rel="stylesheet" href="../../dist/css/customCSS.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../form-validator/theme-default.min.css">
    <link rel="stylesheet" href="../../sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="../../date-picker/bootstrap-datepicker.css">
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
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                            <a href="../../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../Order/OrderTable.php" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>Order Management</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../Customer/CustomerTable.php" class="nav-link">
                                <i class="nav-icon fas fa-hand-holding-usd"></i>
                                <p>Customer Management</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../Vendor/VendorTable.php" class="nav-link">
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
                                    <a href="../../Transport/TransportActionTable.php" class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Transport Action</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Transport/TransportHandlingTable.php" class="nav-link">
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
                                    <a href="../../Expenses/ExpensesGroupTable.php" class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Expense Group</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Expenses/ExpensesTypeTable.php" class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Expense Type</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Expenses/ExpenseTable.php" class="nav-link">
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
                                    <a href="../../Vehicle/VehicleTypeTable.php" class="nav-link">
                                        <i class="nav-icon fas fa-truck-pickup"></i>
                                        <p>Vehicle Types</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Vehicle/VehicleTable.php" class="nav-link">
                                        <i class="nav-icon fas fa-truck-pickup"></i>
                                        <p>Vehicles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview menu-open">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Employee Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../Employee/EmployeeTable.php" class="nav-link">
                                        <i class="nav-icon fas fa-user-friends"></i>
                                        <p>Employee Details</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Employee/Leave/LeaveManagementTable.php" class="nav-link active">
                                        <i class="nav-icon fas fa-bed"></i>
                                        <p>Employee Leave Details</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Employee/Leave/LeaveTypeTable.php" class="nav-link">
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
                                    <a href="../../Change-password.php" class="nav-link">
                                        <i class="nav-icon fas fa-key"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../../Register.php" class="nav-link">
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
                            <h1 class="m-0 text-dark">Leave Details</h1>
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
                            <h5 class="card-title">View Employee Leave Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <?php

                                    if ($imgstatus == 1) {
                                    ?>
                                        <div class="card col-md-9 card-info shadow-lg bg-white rounded" class="box shadow">

                                            <div class="card-img-top">
                                                <img src="<?php echo '../' . $imglocation ?>" alt="Image Preview" class="img-fluid p-2" style="border-radius: 25px;">
                                            </div>

                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="card col-md-9 card-info shadow-lg bg-white rounded" class="box shadow">

                                            <div class="card-img-top">
                                                <img src="../../Uploads/default.jpg" alt="Image Preview" class="img-fluid p-2" style="border-radius: 25px;">
                                            </div>

                                        </div>


                                    <?php
                                    }

                                    ?>

                                </div>

                                <div class="col-md-8">
                                    <div class="d-flex align-items-center">
                                        <h2 class="font-weight-bold m-0"><?php echo $name ?></h2>
                                        <address class="m-0 pt-2 pl-0 pl-md-4 font-weight-light text-secondary"><i class="fa fa-map-marker">&nbsp;<?php echo $address ?></i></address>
                                    </div>
                                    <p class="h5 text-primary mt-2 d-block font-weight-light"><?php echo $designation ?></p>
                                    <section class="mt-5">
                                        <h3 class="h6 font-weight-light text-secondary text-uppercase">Employee ID</h3>
                                        <div class="d-flex align-items-center">
                                            <strong class="h1 font-weight-bold m-0 mr-3"><?php echo $eid ?></strong>
                                        </div>
                                    </section>
                                    <section class="mt-4">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a href="#home" class="nav-link active" data-toggle="tab" id="home-tab" aria-controls="home" aria-selected="true">About</a>
                                            </li>
                                        </ul>
                                        <div class="tab-pane py-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h6 class="text-uppercase font-weight-light text-secondary">Contact Information</h6>
                                            <dl class="row mt-4 mb-4 pb-3">
                                                <dt class="col-sm-3">Phone</dt>
                                                <dd class="col-sm-9"><?php echo $mobile ?></dd>
                                                <dt class="col-sm-3">Home Address</dt>
                                                <dd class="col-sm-9">
                                                    <address class="mb-0"><?php echo $address  ?></address>
                                                </dd>
                                            </dl>
                                            <h6 class="text-uppercase font-weight-light text-secondary">Other Informations</h6>
                                            <dl class="row mt-4 mb-4 pb-3">
                                                <dt class="col-sm-3">Full Name</dt>
                                                <dd class="col-sm-9"><?php echo $fname ?></dd>
                                                <dt class="col-sm-3">Birthday</dt>
                                                <dd class="col-sm-9"><?php echo $dob ?></dd>
                                                <dt class="col-sm-3">Gender</dt>
                                                <dd class="col-sm-9"><?php echo $gender ?></dd>
                                                <dt class="col-sm-3">NIC Number</dt>
                                                <dd class="col-sm-9"><?php echo $nic ?></dd>
                                                <dt class="col-sm-3">Join Date</dt>
                                                <dd class="col-sm-9"><?php echo $joindate ?></dd>
                                            </dl>
                                        </div>
                                    </section>
                                    <div class="row">
                                        <div class="mb-5">
                                            <a href="ApplyLeave.php?empid=<?php echo $Emp_ID  ?>"> <button class="btn btn-success"><i class="fas fa-plus-circle"></i> Apply Leave</button></a>
                                        </div>
                                        <div class="mb-5 ml-5">
                                            <a href="RemoveLeave.php?empid=<?php echo $Emp_ID  ?>"> <button class="btn btn-danger"><i class="fas fa-minus-circle"></i> Remove Leave</button></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h3 class="card-title">Leave Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                    <table id="example1" class="table table-bordered table-hover">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Leave Type Name</th>
                                                                <th>Eligible Days</th>
                                                                <th>Days Taken</th>
                                                                <th>Remaining Days</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql = "SELECT l.LeaveName, l.NoofDays, el.DaysTaken,e.id FROM employee e,leavetype l,empleave el WHERE e.id = el.empid AND e.emptype = l.EmpType AND el.Lid =l.Lid AND e.id ='" . $Emp_ID . "'";
                                                            $resultset = mysqli_query($con, $sql);
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($resultset)) {
                                                                    $leavename = $row['LeaveName'];
                                                                    $elidays = $row['NoofDays'];
                                                                    $daystaken = $row['DaysTaken'];




                                                            ?>

                                                                    <tr>
                                                                        <td><?php echo $leavename ?></td>
                                                                        <td><?php echo $elidays ?></td>
                                                                        <td><?php echo $daystaken ?></td>
                                                                        <td><?php echo ($elidays - $daystaken) ?></td>
                                                                    </tr>

                                                            <?php

                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h3 class="card-title">Leave Types</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                    <table id="example1" class="table table-bordered table-hover">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Leave Type Name</th>
                                                                <th>Eligible Days</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql = "SELECT l.LeaveName,l.NoofDays FROM employee e, leavetype l WHERE l.EmpType = e.emptype AND e.id = '" . $Emp_ID . "'";
                                                            $resultset = mysqli_query($con, $sql);
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($resultset)) {
                                                                    $leavename = $row['LeaveName'];
                                                                    $elidays = $row['NoofDays'];



                                                            ?>

                                                                    <tr>
                                                                        <td><?php echo $leavename ?></td>
                                                                        <td><?php echo $elidays ?></td>
                                                                    </tr>

                                                            <?php

                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class=" text-right mt-4">
                                <a href="LeaveManagementTable.php"><button type="button" class="btn btn-warning ml-1" value="Back"><i class="fas fa-arrow-left"></i> Back To Table</button></a>
                            </div>

                        </div>

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
                    <b>Powered By</b> <img src="../../dist/img/3.png" alt="User Image">
                </div>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="../../dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../plugins/raphael/raphael.min.js"></script>
    <script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- PAGE SCRIPTS -->
    <script src="../../dist/js/pages/dashboard2.js"></script>
    <script src="../../form-validator/jquery.form-validator.min.js"></script>
    <script src="../../form-validator/jquery.form-validator.js"></script>
    <script src="../../sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../date-picker/bootstrap-datepicker.js"></script>

    <script>
        $.validate();
    </script>

    <script>
        $('.datepicker').datepicker();
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