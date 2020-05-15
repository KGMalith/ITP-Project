<?php
include '../inc/Customeridgenerator.php';
include '../inc/Dashboardcalculations.php';
SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("Location: ../Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Customer Details</title>
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
              <a href="../Customer/CustomerTable.php" class="nav-link active">
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
                  <span class="badge badge-danger right"><?php num_of_new_orders(); ?></span>
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
                  <span class="badge badge-warning right"><?php num_of_transportAction(); ?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Transport/TransportActionTable.php" class="nav-link">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>Transport Action</p>
                    <span class="badge badge-warning right"><?php num_of_transportAction(); ?></span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Transport/TransportHandlingTable.php" class="nav-link">
                    <i class="nav-icon fas fa-shipping-fast"></i>
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
            <li class="nav-item">
              <a href="../Reports/EmployeeReport.php" class="nav-link">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p>Reports</p>
              </a>
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
              <h1 class="m-0 text-dark">Add Customer Details</h1>
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
                  <h5 class="card-title">Add Customer Details</h5>
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

                  <form action="../inc/addcustomer.php" method="POST">
                    <div class="form-group col-md-3">
                      <label>Customer ID<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="customerID" value="<?php echo $cutomerid ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group ml-2">
                      <label>Name<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" class="form-control" data-validation=" length required" data-validation-length="4-60" data-validation-error-msg="Please Enter Minimum 4 & Maximum 60 Characters" name="cname">
                      </div>
                    </div>

                    <div class="form-row ml-1">
                      <div class="form-group col-md-3">
                        <label>Phone (Mobile)<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['mobile'])) {
                            $mobile = $_GET['mobile'];
                            echo '<input type="text" class="form-control"  data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits" name="mnumber" value="' . $mobile . '">';
                          } else {
                            echo '<input type="text" class="form-control"  data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits" name="mnumber">';
                          }
                          ?>

                        </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Phone (Land)</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['land'])) {
                            $land = $_GET['land'];
                            echo '<input type="text" class="form-control" data-validation-optional="true" data-validation="number length" data-validation-length="10-10" data-validation-error-msg="The Land Number Must Be 10 Digits" name="lnumber" value="' . $land . '">';
                          } else {
                            echo '<input type="text" class="form-control" data-validation-optional="true" data-validation="number length" data-validation-length="10-10" data-validation-error-msg="The Land Number Must Be 10 Digits" name="lnumber">';
                          }
                          ?>

                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['email'])) {
                            $mail = $_GET['email'];
                            echo '<input type="email" class="form-control" data-validation-optional="true" data-validation="email" name="email" value="' . $mail . '">';
                          } else {
                            echo '<input type="email" class="form-control" data-validation-optional="true" data-validation="email" name="email">';
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="form-group ml-2">
                      <label>Address<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                        </div>
                        <?php
                        if (isset($_GET['address'])) {
                          $address = $_GET['address'];
                          echo '<input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Address of Customer" name="address" value="' . $address . '">';
                        } else {
                          echo '<input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Address of Customer" name="address">';
                        }
                        ?>

                      </div>
                    </div>
                    <div class="form-row ml-1">
                      <div class="form-group col-md-6">
                        <label>City<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                          </div>
                          <?php
                          if (isset($_GET['city'])) {
                            $city = $_GET['city'];
                            echo '<input type="text" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the City of Customer" name="city" value="' . $city . '">';
                          } else {
                            echo '<input type="text" class="form-control" data-validation="required custom" data-validation-regexp="^([a-zA-Z]+)$" data-validation-error-msg="Please Fill the City of Customer" name="city">';
                          }
                          ?>

                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label>District<span class="requiredIcon" style="color:red;">*</span></label>
                        <select id="customerDetailsCustomerDistrict" name="District" class="form-control select2bs4" data-validation="required" data-validation-error-msg="Please Select District of Customer">
                          <?php
                          if (isset($_GET['district'])) {
                            $district = ($_GET['district']); ?>
                            <option value="<?php echo $district; ?>" selected><?php echo $district; ?></option>
                          <?php } ?>
                          <option value="Ampara">Ampara</option>
                          <option value="Anuradhapura">Anuradhapura</option>
                          <option value="Badulla">Badulla</option>
                          <option value="Batticaloa">Batticaloa</option>
                          <option value="Colombo">Colombo</option>
                          <option value="Galle">Galle</option>
                          <option value="Gampaha">Gampaha</option>
                          <option value="Hambantota">Hambantota</option>
                          <option value="Jaffna">Jaffna</option>
                          <option value="Kalutara">Kalutara</option>
                          <option value="Kandy">Kandy</option>
                          <option value="Kegalle">Kegalle</option>
                          <option value="Kilinochchi">Kilinochchi</option>
                          <option value="Kurunegala">Kurunegala</option>
                          <option value="Mannar">Mannar</option>
                          <option value="Matale">Matale</option>
                          <option value="Matara">Matara</option>
                          <option value="Monaragala">Monaragala</option>
                          <option value="Mullaitivu">Mullaitivu</option>
                          <option value="Nuwara Eliya">Nuwara Eliya</option>
                          <option value="Polonnaruwa">Polonnaruwa</option>
                          <option value="Puttalam">Puttalam</option>
                          <option value="Ratnapura">Ratnapura</option>
                          <option value="Trincomalee">Trincomalee</option>
                          <option value="Vavuniya">Vavuniya</option>

                        </select>
                      </div>
                    </div>
                    <button type="submit" id="addCustomer" name="addCustomer" class="btn btn-success">Add Customer</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                    <a href="CustomerTable.php"><button type="button" class="btn btn-warning" value="Back"><i class="fas fa-arrow-left"></i> Back To Table</button></a>
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