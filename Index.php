<?php
include 'inc/dbconnect.php';
SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("Location: Login.php");
}
include 'inc/Dashboardcalculations.php';
if (isset($_POST['generate'])) {

  $start = mysqli_real_escape_string($con, $_POST['joindate']);
  $end = mysqli_real_escape_string($con, $_POST['joindate2']);
  $item1 = 'ITEM1';
  $item2 = 'ITEM2';
  $item3 = 'ITEM3';

  $item1Quan = get_total_buyed_paddy($start, $end, $item1);
  $item2Quan = get_total_buyed_paddy($start, $end, $item2);
  $item3Quan = get_total_buyed_paddy($start, $end, $item3);

  $result = "$item1Quan,$item2Quan,$item3Quan";

  $name1 = get_Item_name_chart($item1);
  $name2 = get_Item_name_chart($item2);
  $name3 = get_Item_name_chart($item3);

  $result2 = "'$name1','$name2','$name3'";


  $item1RiceQuan = get_total_sold_rice_dateRange($start, $end, $item1);
  $item15kg = $item1RiceQuan[0];
  $item110kg = $item1RiceQuan[1];
  $item125kg = $item1RiceQuan[2];

  $item2RiceQuan = get_total_sold_rice_dateRange($start, $end, $item2);
  $item25kg = $item2RiceQuan[0];
  $item210kg = $item2RiceQuan[1];
  $item225kg = $item2RiceQuan[2];


  $item3RiceQuan = get_total_sold_rice_dateRange($start, $end, $item3);
  $item35kg = $item3RiceQuan[0];
  $item310kg = $item3RiceQuan[1];
  $item325kg = $item3RiceQuan[2];

  $chart2quan = "$item15kg,$item110kg,$item125kg,$item25kg,$item210kg,$item225kg,$item35kg,$item310kg,$item325kg";
  $chart2name = "'$name1(5KG)','$name1(10KG)','$name1(25KG)','$name2(5KG)','$name2(10KG)','$name2(25KG)','$name3(5KG)','$name3(10KG)','$name3(25KG)'";
}



$ricebagquan = get_current_rice_stock_bag_size('ITEM1');
$itemOne5kgquan = $ricebagquan[0];
$itemOne10kgquan = $ricebagquan[1];
$itemOne25kgquan = $ricebagquan[2];

$ricebagquan2 = get_current_rice_stock_bag_size('ITEM2');
$itemTwo5kgquan = $ricebagquan2[0];
$itemTwo10kgquan = $ricebagquan2[1];
$itemTwo25kgquan = $ricebagquan2[2];

$ricebagquan3 = get_current_rice_stock_bag_size('ITEM3');
$itemThree5kgquan = $ricebagquan3[0];
$itemThree10kgquan = $ricebagquan3[1];
$itemThree25kgquan = $ricebagquan3[2];



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <!--Custom CSS-->
  <link rel="stylesheet" href="dist/css/customCSS.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="form-validator/theme-default.min.css">
  <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="plugins/chart.js/Chart.min.css">
  <link rel="stylesheet" href="date-picker/bootstrap-datepicker.css">
  <link rel="stylesheet" href="form-validator/theme-default.min.css">
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
            <a href="inc/Logout.inc.php" class="dropdown-item">
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
      <a href="" class="brand-link">
        <img src="dist/img/RICE.jpg" alt="Company Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Nuwan Rice Mill</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/4.jpg" class="img-circle elevation-2" alt="User Image">
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
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Order/OrderTable.php" class="nav-link">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>Order Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Customer/CustomerTable.php" class="nav-link">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>Customer Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Vendor/VendorTable.php" class="nav-link">
                <i class="nav-icon fas fa-handshake"></i>
                <p>Vendor Management</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>Billing
                  <i class="right fas fa-angle-left"></i>
                  <span class="badge badge-danger right"><?php num_of_new_orders(); ?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Billing/BuyingInvoiceList.php" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Buying Invoice</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Billing/SellingInvoiceList.php" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Selling Invoice</p>
                    <span class="badge badge-danger right"><?php num_of_new_orders(); ?></span>
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
                  <a href="Item/ItemTable.php" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Item Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Item/Stock/RicePriceTable.php" class="nav-link">
                    <i class="nav-icon fas fa-money-bill-wave"></i>
                    <p>Rice Price Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Item/Stock/addRiceStockTable.php" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Rice Stock Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Item/Stock/addPaddyStockTable.php" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Paddy Stock Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Item/Stock/addConvertPaddyStockTable.php" class="nav-link">
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
                  <span class="badge badge-warning right"><?php num_of_transportAction(); ?></span>
                </p>

              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Transport/TransportActionTable.php" class="nav-link">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>Transport Action</p>
                    <span class="badge badge-warning right"><?php num_of_transportAction(); ?></span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Transport/TransportHandlingTable.php" class="nav-link">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>Transport Handling</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>Expenses Tracking
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Expenses/ExpensesGroupTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Expense Group</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Expenses/ExpensesTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Expense Type</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Expenses/ExpenseTable.php" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>Expenses Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-truck-moving"></i>
                <p>Vehicle Management
                  <i class="right fas fa-angle-left"></i>
                </p>

              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Vehicle/VehicleTypeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>Vehicle Types</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Vehicle/VehicleTable.php" class="nav-link">
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
                  <a href="Employee/EmployeeTable.php" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>Employee Details</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Employee/Leave/LeaveManagementTable.php" class="nav-link">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>Employee Leave Details</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Employee/Leave/LeaveTypeTable.php" class="nav-link">
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
                  <a href="Change-password.php" class="nav-link">
                    <i class="nav-icon fas fa-key"></i>
                    <p>Change Password</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="Register.php" class="nav-link">
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
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shipping-fast"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">No Of Delivery Pending Orders</span>
                  <span class="info-box-number">
                    <?php num_of_delivery_pending_orders(); ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-friends"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">No Of Registered Customers</span>
                  <span class="info-box-number"><?php total_num_of_customers(); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">New Orders</span>
                  <span class="info-box-number"><?php num_of_new_orders(); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">No Of Employees</span>
                  <span class="info-box-number"><?php num_of_employees(); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <div class="form-group">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Date Range</h3>
              </div>
              <div class="card-body">
                <form action="index.php" method="POST">
                  <div class="row">
                    <div class="form-group col-4">
                      <label>Start Date<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group date" data-provide="datepicker">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="joindate" class="form-control" autocomplete="off" data-validation="required" data-validation-error-msg="Please Select Date">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="form-group col-4">
                      <label>End Date<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group date" data-provide="datepicker">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="joindate2" class="form-control" autocomplete="off" data-validation="required" data-validation-error-msg="Please Select Date">
                        <div class="input-group-addon">
                          <span class="glyphicon glyphicon-th"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-5"></div>
                    <div><button type="submit" name="generate" class="btn btn-info btn-md">Generate</button></div>
                  </div>

                </form>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="card col-7">
              <div class="card-header">
                <h3 class="card-title">Total Buyed Paddy Stock</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="row mt-4">
                  <div class="col-md-4"></div>
                  <?php
                  if (isset($start)) {
                    echo '
                    <div>
                      <p><b>Stock: ' . $start . ' - ' . $end . '</p></b>
                    </div>
                    ';
                  }

                  ?>
                </div>


                <div class="chart-responsive mt-5">
                  <canvas id="pieChart"></canvas>
                </div>
                <!-- ./chart-responsive -->
                <!-- /.col -->


                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <div class="col-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Stock Details</h3>
                </div>
                <div class="card-body">
                  <div>

                    <div class="progress-group">
                      Current Total Paddy Stock
                      <span class="float-right"><b><?php echo get_total_paddy_stock(); ?></b>/10,000 KG</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width:<?php echo get_total_paddy_stock_precentage();?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Current Total Rice Stock
                      <span class="float-right"><b><?php echo get_current_total_rice_stock('ITEM1', 'ITEM2', 'ITEM3'); ?></b>/100,000 Bags</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: <?php echo get_current_total_rice_stock_presentage(get_current_total_rice_stock('ITEM1', 'ITEM2', 'ITEM3')); ?>%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Current Total Paddy Process Stock</span>
                      <span class="float-right"><b><?php echo paddy_process_stock(); ?></b>/10,000 KG</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: <?php echo paddy_Converting_process_precentage(paddy_process_stock()); ?>%"></div>
                      </div>
                    </div>


                    <!-- /.progress-group -->
                  </div>
                </div>
              </div>
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-box"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Current Paddy Stock <?php echo get_Item_name('ITEM1'); ?></span>
                  <span class="info-box-number"><?php echo calculate_current_paddy_Item('ITEM1'); ?>&nbsp;KG</span>
                </div>

              </div>

              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-box"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Current Paddy Stock <?php echo get_Item_name('ITEM2'); ?></span>
                  <span class="info-box-number"><?php echo calculate_current_paddy_Item('ITEM2'); ?>&nbsp;KG</span>
                </div>

              </div>

              <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fas fa-box"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Current Paddy Stock <?php echo get_Item_name('ITEM3'); ?></span>
                  <span class="info-box-number"><?php echo calculate_current_paddy_Item('ITEM3'); ?>&nbsp;KG</span>
                </div>

              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-5">
              <div class="row">
                <div class=" col-sm-6 ">
                  <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM1'); ?><br>5KG</span>
                      <span class="info-box-number"><?php echo $itemOne5kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
                <div class=" col-sm-6 ">
                  <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM1'); ?><br>10KG</span>
                      <span class="info-box-number"><?php echo $itemOne10kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-sm-6 ">
                  <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM1'); ?><br>25KG</span>
                      <span class="info-box-number"><?php echo $itemOne25kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
                <div class=" col-sm-6 ">
                  <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM2'); ?><br>5KG</span>
                      <span class="info-box-number"><?php echo $itemTwo5kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-sm-6 ">
                  <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM2'); ?><br>10KG</span>
                      <span class="info-box-number"><?php echo $itemTwo10kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
                <div class=" col-sm-6 ">
                  <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM2'); ?><br>25KG</span>
                      <span class="info-box-number"><?php echo $itemTwo25kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-sm-6 ">
                  <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM3'); ?><br>5KG</span>
                      <span class="info-box-number"><?php echo $itemThree5kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
                <div class=" col-sm-6 ">
                  <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM3'); ?><br>10KG</span>
                      <span class="info-box-number"><?php echo $itemThree10kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" col-sm-6 ">
                  <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="nav-icon fab fa-pagelines"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Current Rice Stock <?php echo get_Item_name('ITEM3'); ?><br>25KG</span>
                      <span class="info-box-number"><?php echo $itemThree25kgquan ?>&nbsp;Bags</span>
                    </div>
                  </div>
                </div>
              </div>

            </div>



            <div class="card col-7 ">
              <div class="card-header">
                <h3 class="card-title">Total Sold Rice Stock</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="row mt-4">
                  <div class="col-md-4"></div>
                  <?php
                  if (isset($start)) {
                    echo '
                    <div>
                      <p><b>Stock: ' . $start . ' - ' . $end . '</p></b>
                    </div>
                    ';
                  }

                  ?>
                </div>
                <div class="chart-responsive mt-5">
                  <canvas id="pieChart2"></canvas>
                </div>
                <!-- ./chart-responsive -->
                <!-- /.col -->


                <!-- /.row -->
              </div>
              <!-- /.card-body -->
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
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="node_modules/chart.js/dist/chart.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <script src="form-validator/jquery.form-validator.min.js"></script>
  <script src="form-validator/jquery.form-validator.js"></script>
  <script src="date-picker/bootstrap-datepicker.js"></script>
  <!-- page script -->
  <script>
    $.validate();
    $('.date').datepicker({
      format: 'dd/mm/yyyy',
    });
  </script>
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
    var ctx = document.getElementById('pieChart');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [<?php echo $result2 ?>],
        datasets: [{
          label: '# of Votes',
          data: [<?php echo $result ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },

    });
  </script>
  <script>
    var ctx = document.getElementById('pieChart2');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: [<?php echo $chart2name ?>],
        datasets: [{
          label: 'Rice Bags',
          data: [<?php echo $chart2quan ?>],
          backgroundColor: [
            'rgb(102, 255, 102)',
            'rgb(51, 255, 51)',
            'rgb(0, 204, 0)',
            'rgb(255, 170, 128)',
            'rgb(255, 136, 77)',
            'rgb(204, 68, 0)',
            'rgb(102, 179, 255)',
            'rgb(51, 153, 255)',
            'rgb(0, 102, 204)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },

    });
  </script>
</body>

</html>