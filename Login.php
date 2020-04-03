<!DOCTYPE html>
<html>

<head>
    <title>Log in</title>
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

<body class="bg-gradient-dark login-page">

    <div class="login-box">
        <div class="login-logo">
            <b>Nuwan</b> Rice Mill
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
              <div class="text-center ">
                <p style="color:black;"><b>LOGIN</b></p>
              </div>
              <div class="text-center">
                <img src="dist/img/avatar5.png" alt="Avatar" class="avatar img-fluid">
              </div>
                <br><br>
                <div class="text-center text-danger text-lg">
                    <?php
                        if(isset($_GET['error'])){
                            if($_GET['error'] == "emptyfields"){
                              echo '<p> Fill All The Fields!</p>';
                            }
                            else if($_GET['error']== "SQLError"){
                                echo '<p> SQL ERROR!</p>';
                            }
                            else if($_GET['error']== "WrongPassword"){
                                echo '<p> Invalid Password!</p>';
                            }
                            else if($_GET['error']=="NoUser"){
                                echo '<p> Invalid User!</p>';
                            }
                        }
                        else if(isset($_GET['newpwd'])){
                            if($_GET['newpwd'] == "passwordupdated"){
                                echo '<p>Your Password Has Been Reset!</p>';
                            }
                        }
                    ?>
                </div>
                
                <form action="inc/Login.inc.php" method="post">
                  <div class="input-group mb-3">
                        <?php
                            if (isset($_GET['usname'])) {
                                  $uname = $_GET['usname'];
                                    echo '<input type="text" class="form-control" placeholder="User Name" name="uname" id="user"  value="' . $uname . '" required="required" data-toggle="tooltip" data-placement="top" title="Please Fill User Name">';
                            } else {
                                    echo '<input type="text" class="form-control" placeholder="User Name" name="uname" id="user" required="required" data-toggle="tooltip" data-placement="top" title="Please Fill User Name">';
                                    }
                        ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="pass" required="required" data-toggle="tooltip" data-placement="top" title="Please Fill Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember" style="color:black;">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="signin">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
        
   

    
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
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
          });
    </script>
</body>


</html>