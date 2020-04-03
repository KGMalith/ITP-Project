<?php
  SESSION_START();

  if(!isset($_SESSION['userid']) && !isset($_SESSION['username'])){
    header("Location: Login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
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
    <b>Nuwan</b>Rice Mill</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg" style="color:black;">You are only one step a way from your new password, Change your password now.</p>

          <?php if(isset($_GET['error']))
            if($_GET['error'] == "emptyFields"): ?>
                <div class="fieldsempty" data-fields="<?= $_GET['emptyFields']; ?>"></div>
          <?php endif;  ?>

          <?php if(isset($_GET['error']))
            if($_GET['error'] == "SQLError"): ?>
              <div class="sqlerror" data-sql="<?= $_GET['SQLError']; ?>"></div>
          <?php endif;  ?>

          <?php if(isset($_GET['error']))
            if($_GET['error'] == "passwordcheck"):?>
              <div class="checkpass" data-passcheck="<?= $_GET['passwordcheck']; ?>"></div>
          <?php endif;  ?> 

          <?php if(isset($_GET['ChangePassword']))
            if($_GET['ChangePassword'] == "Success"):  ?>
              <div class="flash-data" data-flashdata="<?= $_GET['Success']; ?>"></div>
          <?php endif;  ?> 

      <form action="inc/changepassword.inc.php?id=<?php echo $_SESSION['userid']; ?>" method="post">
      <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input name="pass_confirmation" type="password" class="form-control" placeholder="Password" data-validation="strength" data-validation-strength="2"> 
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
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="change">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="Index.php">Home</a>
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
    //SweetAlert
      const flashdata = $('.flash-data').data('flashdata')
      if(flashdata){
        swal.fire({
          icon:'success',
          title :'Success!',
          text:'User has been Registered Successfully.',
          confirmButtonColor:'green',
          closeOnEsc: false,
          closeOnClickOutside: false,
          
        })
      }

      sql =$('.sqlerror').data('sql')
      if(sql){
        swal.fire({
          icon: 'error',
          title: 'Oops...',
          confirmButtonColor:'green',
          text: 'SQL Error!',
          closeOnEsc: false,
          closeOnClickOutside: false,
        })
      }


      passcheck =$('.checkpass').data('passcheck')
      if(passcheck){
        swal.fire({
          icon: 'error',
          title: 'Oops...',
          confirmButtonColor:'green',
          text: 'Password Miss Match!',
          closeOnEsc: false,
          closeOnClickOutside: false,
        })
      }

      fields =$('.fieldsempty').data('fields')
      if(fields){
        swal.fire({
          icon: 'error',
          title: 'Oops...',
          confirmButtonColor:'green',
          text: 'Fields are Empty!',
          closeOnEsc: false,
          closeOnClickOutside: false,
        })
      }
    </script>
    <script>
$.validate({
  modules : 'security',
  onModulesLoaded : function() {
    var optionalConfig = {
      fontSize: '12pt',
      padding: '4px',
      bad : 'Very bad',
      weak : 'Weak',
      good : 'Good',
      strong : 'Strong'
    };

    $('input[name="pass_confirmation"]').displayPasswordStrength(optionalConfig);
  }
});
</script>

</body>
</html>
