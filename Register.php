<?php
SESSION_START();

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add New User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

</head>

<body class="bg-gradient-dark register-page">

  <div class="register-box mt-5">
    <div class="register-logo">
      <img src="dist/img/RICE.jpg" alt="Avatar" class="avatar img-fluid"><br />
      <b>Nuwan Rice Mill </b>
    </div>

    <div class="card">
      <div class="card-body ">
        <div class="text-center">
          <p style="color:black;"><b>Add New User</b></p>
        </div>
        <div class="text-center">
          <img src="dist/img/avatar5.png" alt="Avatar" class="avatar img-fluid">
        </div>
        <br><br>
        <div class="text-center text-lg">
          <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyFields") {
              echo '<p style="color:red;"> Fill All The Fields!</p>';
            } else if ($_GET['error'] == "invalidEmailUsername") {
              echo '<p style="color:red;"> Invalid User Name And Email!</p>';
            } else if ($_GET['error'] == "invalidEmail") {
              echo '<p style="color:red;"> Invalid Email!</p>';
            } else if ($_GET['error'] == "invalidusername") {
              echo '<p style="color:red;"> Invalid User Name!</p>';
            } else if ($_GET['error'] == "passwordcheck") {
              echo '<p style="color:red;"> Password Miss Match!</p>';
            } else if ($_GET['error'] == "SQLError") {
              echo '<p style="color:red;"> SQL Error!</p>';
            } else if ($_GET['error'] == "UserTaken") {
              echo '<p style="color:red;"> User Name Already Taken!</p>';
            }
          } else if (isset($_GET['Register'])) {
            if ($_GET['Register'] == "Success") {
              echo '<p style="color:green;"> Successfully Registred!</p>';
            }
          }

          ?>
        </div>
        <form action="inc/Register.inc.php" method="POST">
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <?php
              if (isset($_GET['uname'])) {
                $usern = $_GET['uname'];
                echo '<input type="text" class="form-control" placeholder="User Name" name="username" value="' . $usern . '" required="required">';
              } else {
                echo '<input type="text" class="form-control" placeholder="User Name" name="username" required="required">';
              }
              ?>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <?php
              if (isset($_GET['mail'])) {
                $mail = $_GET['mail'];
                echo '<input type="email" class="form-control" placeholder="Email" name="email" value="' . $mail . '" required="required">';
              } else {
                echo '<input type="email" class="form-control" placeholder="Email" name="email" required="required">';
              }
              ?>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input name="pass_confirmation" type="password" class="form-control" placeholder="Password" data-validation="strength" data-validation-strength="2" data-toggle="tooltip" data-placement="top" title="Password Should Contain At Least One Capital Letter Simple Letter One Number And Special Characters(#,@,$,%)">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Confirm password" name="pass" data-validation="confirmation" data-validation-error-msg="Password Miss Match">
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="Register">Register</button>
            </div>
            <!-- /.col -->
          </div>
          <br>
          <a href="index.php">Home</a>
        </form>


      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

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
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <script src="form-validator/jquery.form-validator.min.js"></script>
  <script src="form-validator/jquery.form-validator.js"></script>
  <script src="sweetalert/sweetalert2.all.min.js"></script>
  <script>
    $.validate();
  </script>
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });
  </script>
  <script>
    $.validate({
      modules: 'security',
      onModulesLoaded: function() {
        var optionalConfig = {
          fontSize: '12pt',
          padding: '4px',
          bad: 'Very bad',
          weak: 'Weak',
          good: 'Good',
          strong: 'Strong'
        };

        $('input[name="pass_confirmation"]').displayPasswordStrength(optionalConfig);
      }
    });
  </script>
</body>

</html>