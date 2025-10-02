

<!-- Google Font: Source Sans Pro -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
<!-- <link rel="stylesheet" type="text/css" href="../dist/css/googleFont.css"> -->
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- IonIcons -->
<!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
<link rel="stylesheet" type="text/css" href="../dist/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <!-- Toastr -->
  <!-- <link rel="stylesheet" href="../plugins/toastr/toastr.min.css"> -->
  
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css">

<!-- daterange picker -->
<!-- <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css"> -->
<!-- iCheck for checkboxes and radio inputs -->
<!-- <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> MABORESHO -->
<!-- Bootstrap Color Picker -->
<!-- <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> -->
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<!-- <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css"> -->
<!-- BS Stepper -->
<!-- <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css"> -->
<!-- dropzonejs -->
<!-- <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css"> -->

<!-- MUTM CSS -->
<link rel="stylesheet" href="../MySections/mutmCss.css">

<!-- Growing Spinners -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->



<?php

	session_start();//start session

	if (!isset($_SESSION['log'])) {
		header('Location: ../?msg=sessionErr');
		//exit;
	}else{
		if ($_SESSION['log'] != 'in') {
			header('Location: ../?msg=sessionErr');
			//exit;
		}
	}

  	//set time zone to africa
  	date_default_timezone_set('Africa/Nairobi');
	include('../Controller/connect.php');
?>

