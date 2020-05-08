<?php
SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("Location: ../Login.php");
}
?>
<?php
require '../inc/dbconnect.php';



//getting the list of users
$query = "SELECT * FROM item";
$items = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reoprts</title>
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
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Item/ItemTable.php" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Item Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Stock Management</p>
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
              <h1 class="m-0 text-dark">Reports</h1>
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
          <div class="card mb-5">
            <div class="card-header">
              <h3 class="card-title">Item Details</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body mt-auto">
              <ul class="nav nav-tabs mt-3 mb-5" role="tablist">
                <li class="nav-item">
                  <a href="ItemReport.php" class="nav-link active">Item</a>
                </li>
                <li class="nav-item">
                  <a href="../Customer/CustomerReport.php" class="nav-link">Customer</a>
                </li>
                <li class="nav-item">
                  <a href="../Vendor/VendorReport.php" class="nav-link">Vendor</a>
                </li>
              </ul>
              <div style="overflow:auto;">
                <table id="example1" class="table table-bordered table-hover table-responsive-sm" overflow="auto">
                  <thead>
                    <tr>
                      <th scope="col">Item Name</th>
                      <th scope="col">Stock (Units) <br>5KG</th>
                      <th scope="col">Unit Price(Rs)<br> 5KG </th>
                      <th scope="col">Stock (Units) <br>10KG</th>
                      <th scope="col">Unit Price(Rs) <br>10KG</th>
                      <th scope="col">Stock (Units) <br>25KG</th>
                      <th scope="col">Unit Price(Rs) <br>25KG</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($items)) {
                      $Item_ID = $row['itemID'];
                      $ItemName = $row['iName'];
                      $Quan5kg = $row['5KGQuantity'];
                      $Price5kg = $row['5KGPrice'];
                      $Quan10kg = $row['10KGQuantity'];
                      $Price10kg = $row['10KGPrice'];
                      $Quan25kg = $row['25KGQuantity'];
                      $Price25kg = $row['25KGPrice'];
                      $des = $row['description'];

                    ?>

                      <tr>
                        <td><?php echo $ItemName ?></td>
                        <td><?php echo $Quan5kg ?></td>
                        <td><?php echo $Price5kg ?></td>
                        <td><?php echo $Quan10kg ?></td>
                        <td><?php echo $Price10kg ?></td>
                        <td><?php echo $Quan25kg ?></td>
                        <td><?php echo $Price25kg ?></td>
                        <td><?php echo $des ?></td>

                      </tr>

                    <?php

                    }

                    ?>
                  </tbody>
                </table>
                <br>
              </div>


              <div class="row mt-4">
                <div class="col-3">
                  <button type="button" class="btn btn-warning" onclick="history.go(-1);" value="Back"><i class="fas fa-arrow-left"></i> Back</button>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <br>


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
  <script src="../Loader/script.js"></script>
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
  <script src="../sweetalert/sweetalert2.all.min.js"></script>
  <script src="../Data-Table-Outputs/dataTables.buttons.min.js"></script>
  <script src="../Data-Table-Outputs/jszip.min.js"></script>
  <script src="../Data-Table-Outputs/pdfmake.min.js"></script>
  <script src="../Data-Table-Outputs/vfs_fonts.js"></script>
  <script src="../Data-Table-Outputs/buttons.html5.min.js"></script>
  <script src="../Data-Table-Outputs/buttons.print.min.js"></script>
  <!-- page script -->
  <script>
    $(document).ready(function() {
      $('#example1').DataTable({

        dom: 'Bfrtip',
        buttons: [{
            extend: 'copy',
            className: 'btn btn-info'
          },
          {
            extend: 'csv',
            className: 'btn btn-info'
          },
          {
            extend: 'excel',
            className: 'btn btn-info'
          },
          {
            extend: 'pdf',
            className: 'btn btn-info'
          },
          {
            extend: 'print',
            className: 'btn btn-info'
          },
        ],
        overflow: scroll,

      });

    });

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });
  </script>
</body>

</html>