<?php
  if (!isset($_GET['otptoken'])) {
    header('Location: https://tamisemim.go.tz/otpError/');
    exit();
  } else{
    include('../Controller/connect.php');
    $myOtp = $_GET['otptoken'];
    $userid = '';

    $json = file_get_contents($pubIP.'selectStaffbyOtp?otp='.$myOtp);

    // $arr = json_decode($json, true); //covert json data into array format

    $arr = json_decode($json, true); //covert json data into array format
    foreach ($arr as $key => $value) {
      $userid = $value['userid'];
    }

    if ($userid == '' || $userid == null) {
      header('Location: https://tamisemim.go.tz/otpError/');
      exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MUTM | OTP</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" oncontextmenu="return false">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" style="border-radius: 10px; border-bottom: solid 1px blue;">
    <div class="card-header text-center" style="background-color: #009688;">
      <div class="row">
        <div class="col-sm-12 text-center">
          <img src="../dist/img/smz_logo.png" alt="SMZ-LOGO" style="max-width: 100%; height: 100px;" class="img-rounded">
        </div>
      </div>
      <a href="https://tamisemim.go.tz/" target="_blank" class="h3"><b>OR-TMSMIM</b></a>
    </div>
    <div class="card-body">
      <h4 class="login-box-msg text-primary">
        Unda neno la siri jipya
      </h4>
      <span class="text-danger" id="logErr">&nbsp;</span>

      <form id="otpForm" method="POST">
        <div class="input-group mb-3">
          <input type="email" id="username" name="username" class="form-control input-sm" placeholder="Baruapepe/Jina la mtumiaji" style="border: solid 1px green;" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-tag"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" id="otp" name="otp" class="form-control input-sm" placeholder="OTP" style="border: solid 1px green;" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fab fa-accessible-icon"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="uPwd" name="uPwd" class="form-control input-sm" placeholder="Neno la Siri Jipya" style="border: solid 1px green;" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="uPwdc" name="uPwdc" class="form-control input-sm" placeholder="Hakiki Neno la Siri" style="border: solid 1px green;" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <input type="hidden" name="pubIPc" id="pubIPc" value="<?php echo $jsIPConnect; ?>">
        <input type="hidden" name="locIPc" id="locIPc" value="<?php echo $locIP; ?>">

        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button class="btn btn-danger btn-block">Unda Neno la Siri</button>
            <!-- <a href="../dashboard/" class="btn btn-primary btn-block">login</a> -->
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div id="result"></div>
      <hr/>
      <p class="mb-0 text-center">
        <a href="https://tamisemim.go.tz" class="text-center" target="_blank">
          &copy;&nbsp;<?php echo date('Y') ?> &nbsp;Haki zote zimehifadhiwa.
        </a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script type="text/javascript" src="create_password.js"></script>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>

