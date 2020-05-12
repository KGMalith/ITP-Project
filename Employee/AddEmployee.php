<?php
SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("Location: ../Login.php");
}
?>
<?php
include '../inc/empidgenerator.php';
include '../inc/Dashboardcalculations.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Employee</title>
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
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Transport/TransportActionTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>Transport Action</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../Transport/TransportHandlingTable.php" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
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


            <li class="nav-item has-treeview menu-open">
              <a href="" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>Employee Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../Employee/EmployeeTable.php" class="nav-link active">
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
              <h1 class="m-0 text-dark">Add Employee</h1>
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
              <h5 class="card-title">Add Employee Details</h5>
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
                if ($_GET['error'] == "nogender") : ?>
                <div class="invalidgender" data-gendererror="<?= $_GET['nogender']; ?>"></div>
              <?php endif;  ?>


              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "noetype") : ?>
                <div class="invalidetype" data-typeerror="<?= $_GET['noetype']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "noedesig") : ?>
                <div class="invaliddesig" data-designationerror="<?= $_GET['noedesig']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "filesize") : ?>
                <div class="invalidfilesize" data-filesizeerror="<?= $_GET['filesize']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "uploaderror") : ?>
                <div class="invalidupload" data-uploaderror="<?= $_GET['uploaderror']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "formatnotallowed") : ?>
                <div class="invalidformat" data-formaterror="<?= $_GET['formatnotallowed']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "SQLError") : ?>
                <div class="sqlerror" data-sql="<?= $_GET['SQLError']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "emptyLicen") : ?>
                <div class="licenerror" data-licennum="<?= $_GET['emptyLicen']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "cannotenterLicen") : ?>
                <div class="errorlicen" data-licencannot="<?= $_GET['cannotenterLicen']; ?>"></div>
              <?php endif;  ?>

              <?php if (isset($_GET['error']))
                if ($_GET['error'] == "FnameTaken") : ?>
                <div class="taken" data-employeefname="<?= $_GET['FnameTaken']; ?>"></div>
              <?php endif;  ?>


              <?php if (isset($_GET['Register']))
                if ($_GET['Register'] == "Success") :  ?>
                <div class="flash-data" data-flashdata="<?= $_GET['Success']; ?>"></div>
              <?php endif;  ?>

              <form action="../inc/addemployee.php" method="POST" enctype="multipart/form-data">

                <div class="form-row">
                  <div class="form-group col-md-4">

                    <div class="card col-md-9 image-preview" id="imagePreview">
                      <div class="card-img-top">
                        <img src="" alt="Image Preview" class="img-fluid image-preview__image">

                      </div>
                      <div class="card-body">
                        <div class="card-text mt-2">
                          <span class="image-preview__default-text">Image Preview <br> (300 x 300)</span>
                        </div>
                        <span class="btn btn-primary btn-file mt-5">
                          Upload <input type="file" name="inpFile" id="inpFileup" />
                        </span>
                      </div>
                    </div>



                  </div>

                  <div class="form-group col-md-8">
                    <div class="form-group ml-5">
                      <label>Employee ID<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                        </div>
                        <input type="text" name="empid" id="empid" class="form-control" value="<?php echo $empid; ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group ml-5">
                      <label>Employee Full Name<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <?php
                        if (isset($_GET['fullname'])) {
                          $fullname = $_GET['fullname'];
                          echo '<input type="text" name="empfullname" id="empfullname" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Name of Employee" value="' . $fullname . '">';
                        } else {
                          echo '<input type="text" name="empfullname" id="empfullname" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Name of Employee">';
                        }
                        ?>
                      </div>
                    </div>

                    <div class="form-group ml-5">
                      <label>Employee Name With Initials<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>

                        <?php
                        if (isset($_GET['name'])) {
                          $ename = $_GET['name'];
                          echo '<input type="text" name="empname" id="empname" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Name of Employee" value="' . $ename . '">';
                        } else {
                          echo '<input type="text" name="empname" id="empname" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Name of Employee">';
                        }
                        ?>
                      </div>
                    </div>

                    <div class="form-row ">
                      <div class="form-group col-md-4 ml-5">
                        <label>Date Of Birth<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group date" data-provide="datepicker">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <?php
                          if (isset($_GET['birthday'])) {
                            $birthd = $_GET['birthday'];
                            echo '<input type="text" name="birthday" class="form-control" data-validation="required" data-validation-error-msg="Please Select Date" value="' . $birthd . '">';
                          } else {
                            echo '<input type="text" name="birthday" class="form-control" data-validation="required" data-validation-error-msg="Please Select Date">';
                          }
                          ?>

                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group ml-5">
                        <label> Gender<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">

                          <div class="form-group">
                            <select class="form-control" name="gender">
                              <?php
                              if (isset($_GET['gender'])) {
                                $gender = $_GET['gender'];
                                echo '<option value="' . $gender . '">' . $gender . ' </option> >
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>';
                              } else {
                                echo '<option value="select" selected>--SELECT--</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>';
                              }
                              ?>


                            </select>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="form-group ml-5">
                      <label>NIC Number<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        </div>
                        <?php
                        if (isset($_GET['nic'])) {
                          $nicnum = $_GET['nic'];
                          echo '<input type="text" name="nicnum" id="nicnum" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the NIC Number of Employee" value="' . $nicnum . '">';
                        } else {
                          echo '<input type="text" name="nicnum" id="nicnum" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the NIC Number of Employee">';
                        }
                        ?>

                      </div>
                    </div>

                    <div class="form-group ml-5">
                      <label>Mobile Number<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>

                        <?php
                        if (isset($_GET['mnum'])) {
                          $mobile = $_GET['mnum'];
                          echo '<input type="text" name="mobilenum" id="mobilenum" class="form-control" data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits" value="' . $mobile . '">';
                        } else {
                          echo '<input type="text" name="mobilenum" id="mobilenum" class="form-control" data-validation="number length required" data-validation-length="10-10" data-validation-error-msg="The Mobile Number Must Be 10 Digits">';
                        }
                        ?>

                      </div>
                    </div>



                    <div class="form-group ml-5">
                      <label>Employee Address<span class="requiredIcon" style="color:red;">*</span></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                        </div>
                        <?php
                        if (isset($_GET['addres'])) {
                          $address = $_GET['addres'];
                          echo '<input type="text" name="empadd" id="empadd" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Address of Employee" value="' . $address . '">';
                        } else {
                          echo '<input type="text" name="empadd" id="empadd" class="form-control" data-validation="required" data-validation-error-msg="Please Fill the Address of Employee">';
                        }
                        ?>

                      </div>
                    </div>

                    <div class="form-row ">
                      <div class="form-group col-md-4 ml-5">
                        <label>Join Date<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group date" data-provide="datepicker">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <?php
                          if (isset($_GET['jdate'])) {
                            $joindate = $_GET['jdate'];
                            echo '<input type="text" name="joindate" class="form-control" data-validation="required" data-validation-error-msg="Please Select Date" value="' . $joindate . '">';
                          } else {
                            echo '<input type="text" name="joindate" class="form-control" data-validation="required" data-validation-error-msg="Please Select Date">';
                          }
                          ?>

                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group ml-5">
                        <label> Employee Type<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">

                          <div class="form-group">
                            <select class="form-control" name="emptype">

                              <?php
                              if (isset($_GET['emptype'])) {
                                $type = $_GET['emptype'];
                                echo '<option value="' . $type . '">' . $type . ' </option> >
                                      <option value="Contract">Contract</option>
                                      <option value="Permanent">Permanent</option>';
                              } else {
                                echo '<option value="select" selected>--SELECT--</option>
                                      <option value="Contract">Contract</option>
                                      <option value="Permanent">Permanent</option>';
                              }
                              ?>

                            </select>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group ml-5">
                        <label> Designation<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">

                          <div class="form-group">
                            <select class="form-control" name="designation" id="designation" onchange="EnableDisableTextBox(this)">

                              <?php
                              if (isset($_GET['desig'])) {
                                $designation = $_GET['desig'];
                                echo '<option value="' . $designation . '">' . $designation . ' </option> >
                                      <option value="Manager">Manager</option>
                                      <option value="Supervisor">Supervisor</option>
                                      <option value="Driver">Driver</option>
                                      <option value="Vehicle Mechanic">Vehicle Mechanic</option>
                                      <option value="Machine Mechanic">Machine Mechanic</option>
                                      <option value="Worker">Worker</option>';
                              } else {
                                echo '<option value="select" selected>--SELECT--</option>
                                      <option value="Manager">Manager</option>
                                      <option value="Supervisor">Supervisor</option>
                                      <option value="Driver">Driver</option>
                                      <option value="Vehicle Mechanic">Vehicle Mechanic</option>
                                      <option value="Machine Mechanic">Machine Mechanic</option>
                                      <option value="Worker">Worker</option>';
                              }
                              ?>

                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group ml-5">
                        <label>Driving License Number<span class="requiredIcon" style="color:red;">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                          </div>

                          <?php
                          if (isset($_GET['licence'])) {
                            $licen = $_GET['licence'];
                            echo '<input type="text" name="licencenum" id="licencenum" class="form-control" value="' . $licen . '">';
                          } else {
                            echo '<input type="text" name="licencenum" id="licencenum" class="form-control">';
                          }
                          ?>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>


                <button type="submit" id="addemployee" name="addemployee" class="btn btn-success">Add Employee</button>
                <button type="reset" class="btn btn-secondary ml-1">Clear</button>
                <a href="EmployeeTable.php"><button type="button" class="btn btn-warning ml-1" value="Back"><i class="fas fa-arrow-left"></i> Back To Table</button></a>





              </form>

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
    $('.date').datepicker({
      format: 'dd/mm/yyyy',
    });
  </script>

  <script>
    function EnableDisableTextBox(designation) {
      var selectedValue = designation.options[designation.selectedIndex].value;
      var licencenum = document.getElementById("licencenum");
      licencenum.disabled = selectedValue == 'Driver' ? false : true;
      if (!licencenum.disabled) {
        licencenum.focus();
      }
    }
  </script>

  <script>
    const inpFile = document.getElementById("inpFileup");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();

        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";

        reader.addEventListener("load", function() {
          previewImage.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
      } else {
        previewDefaultText.style.display = "block";
        previewImage.style.display = "none";
        previewImage.setAttribute("src", "");
      }
    });
  </script>

  <script>
    //SweetAlert
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
      swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Employee Details are Submited Successfully.',
        confirmButtonColor: 'green',
        closeOnEsc: false,
        closeOnClickOutside: false,

      })
    }

    employeefname = $('.taken').data('employeefname')
    if (employeefname) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Employee Full Name Already Taken!',
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

    licennum = $('.licenerror').data('licennum')
    if (licennum) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Fill Driving License Number!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    licencannot = $('.errorlicen').data('licencannot')
    if (licencannot) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Driving License Can Be add Only To Driver!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    gendererror = $('.invalidgender').data('gendererror')
    if (gendererror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Please Choose Gender!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    typeerror = $('.invalidetype').data('typeerror')
    if (typeerror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Please Choose Employee Type!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
    designationerror = $('.invaliddesig').data('designationerror')
    if (designationerror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Please Choose Employee Designation!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }
    filesizeerror = $('.invalidfilesize').data('filesizeerror')
    if (filesizeerror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'File is Too Large!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    uploaderror = $('.invalidupload').data('uploaderror')
    if (uploaderror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Image Upload Error!',
        closeOnEsc: false,
        closeOnClickOutside: false,
      })
    }

    formaterror = $('.invalidformat').data('formaterror')
    if (formaterror) {
      swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: 'green',
        text: 'Image Format Is Invalid!',
        footer: 'Only (JPG/JPEG/PNG) Image Types are allowed',
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
  </script>
</body>

</html>