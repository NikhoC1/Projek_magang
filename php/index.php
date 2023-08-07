<?php 

session_start();
include "../function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <p>Login to Account</p>
  </div>


  <?php 
      if(isset($_SESSION['error'])){
        echo "
            <div class='alert alert-danger text-center'>
              <i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
                </div>
                  ";
  
                  unset($_SESSION['error']);
      }
  
      if(isset($_SESSION['success'])){
        echo "
          <div class='alert alert-success text-center'>
            <i class='fas fa-check-circle'></i> ".$_SESSION['success']."
              </div>
              ";
  
              unset($_SESSION['success']);
      }
            ?>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="test.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo(isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?>">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" id="pass" value="<?php echo(isset($_SESSION['pass'])) ? $_SESSION['pass'] : ''; unset($_SESSION['pass']) ?>">
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>


      <p class="mb-1">
        <a href="new.php">Create New Account</a>
      </p>
    </div>
  </div>

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
